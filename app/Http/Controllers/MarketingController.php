<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class MarketingController extends Controller
{
    //
    public function index()
    {

        $rs = DB::table('kotadistribusi')
        ->select('*',DB::raw("(select COUNT(DISTINCT idPemesanan) from orders where namaCustomer in (select customerName from customer where kotaDistribusi = kotadistribusi.id) and status = 'Terkonfirmasi') as counter"))
        ->get();
        return view('admin.marketing.index', ['city' => $rs]);
        // return response()->json($rs);
    }

    public function showByCity($city)
    {

        $kota = $city;
        $rs = DB::table('orders')
            ->where('status', 'Terkonfirmasi')
            ->whereIn('namaCustomer', function ($query) use ($city) {
                $query->select('customerName')
                    ->from('customer')
                    ->where('kotaDistribusi', $city);
            })
            ->groupBy('idPemesanan')
            ->orderBy('idPemesanan', 'desc')
            ->get();

        return view('admin.marketing.orderPerKota', ['orders' => $rs, 'kota' => $city]);

    }

    public function detailOrder($city, $id)
    {
        // $rs = DB::table('orders')->where('idPemesanan', $id)
        //     ->get();
            $rs = DB::table('orders')
            ->join('products','orders.productId','=','products.productId')
            ->join('pengiriman','pengiriman.idPemesanan','=','orders.idPemesanan')
            ->join('pembayaran','pembayaran.idPemesanan','=','orders.idPemesanan')
            ->where('orders.idPemesanan',$id)
            ->select('orders.*','products.productName','products.price','pengiriman.address','pengiriman.buktiPengiriman','pembayaran.totalPembayaran','pembayaran.jenisPembayaran as jenis','pembayaran.buktiPembayaran')
            // ->groupBy('orders.idPemesanan')
            ->get();
        return view('admin.marketing.detailOrder', ['detail' => $rs, 'city' => $city]);
    }

    public function sendOrder(Request $req)
    {
        $id = $req->idPemesanan;
        DB::table('orders')->where('idPemesanan', $id)->update(['status' => 'Menunggu di produksi']);
        return redirect("/marketing/pengadaan/$req->kota");

    }

    public function listStatusPemesanan()
    {
        // $rs = DB::table('orders')->select('tanggal', function($query) {
        //     $query->select('kotaDistribusi')->from('customer')->whereRaw('customer.customerName=orders.namaCustomer');
        // })
        // ->groupBy('idPemesanan')
        // ->orderBy('idPemesanan','desc')
        // ->get();

        $rs = DB::table('orders')->select('tanggal', DB::raw("(select kotaDistribusi from customer where customerName=namaCustomer) as Kota "), 'status')
            ->groupBy('idPemesanan')
            ->orderBy('idPemesanan', 'desc')
            ->get();

        return view('admin.marketing.statusPemesanan', ['orders' => $rs]);

    }

    public function listPengiriman()
    {
        $rs = DB::table('orders')->select('idPemesanan', 'tanggal', DB::raw("(select kotaDistribusi from customer where customerName=namaCustomer) as Kota "), 'status')
            ->where('status', 'Proses pengiriman')
            ->groupBy('idPemesanan')
            ->orderBy('idPemesanan', 'desc')
            ->get();

        return view('admin.marketing.pengiriman', ['orders' => $rs]);
    }

    public function detailPengiriman($id)
    {
        $rs = DB::table('orders')->select('idPemesanan', 'namaCustomer', 'tanggal', 'productName', 'size', 'quantity', 'totalPrice', 'promo', 'jenis', 'buktiPembayaran',
            DB::raw("(select kotaDistribusi from customer where customerName=namaCustomer) as Kota "),
            DB::raw("(select address from customer where customerName=namaCustomer) as Alamat "))
            ->where('idPemesanan', $id)
            ->get();
        // return response()->json($rs);
        return view('admin.marketing.detailPengiriman', ['detail' => $rs]);
    }

    public function kirimPengiriman(Request $req)
    {
        $path = $req->file('buktiPengiriman')->store('public/image/bukti/pengiriman');
        $path = str_replace('public','storage',$path);
        $data = [
            'idPemesanan' => $req['idPemesanan'],
            'address' => $req['alamat'],
            'ongkirPengiriman' => $req['ongkir'],
            'buktiPengiriman' => $path,

        ];

        DB::table('pengiriman')->insert($data);
        DB::table('orders')->where('idPemesanan',$req['idPemesanan'])->update(['status'=>'Dalam pengiriman']);
        return redirect('marketing/pengiriman');
        // echo json_encode($data);
    }

}
