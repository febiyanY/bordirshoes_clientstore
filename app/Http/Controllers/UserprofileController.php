<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserprofileController extends Controller
{
    public function show(Request $request)
    {
        if ($request->session()->has('user')) {
            if (session('user')->type == 'user') {
                $orders = DB::table('orders')
                    ->where('namaCustomer', session('user')->username)
                    ->groupBy('idPemesanan')
                    ->orderBy('idPemesanan', 'desc')
                    ->get();
                    $username = session('user')->username;
        $cusId = session('user')->id;
        $tagihanCount = DB::select(DB::raw("SELECT * FROM tagihan WHERE customerId = '$cusId' and orderId in (select idPemesanan from orders where namaCustomer = '$username' and status != 'Menunggu Konfirmasi' and status !='Kirim bukti pembayaran' group by idPemesanan) 
        and orderId NOT IN (select orderId from tagihan where status='lunas' and customerId='$cusId' ) group by orderId order by idTagihan desc"));

                return view('userprofile.index', ['orders' => $orders, 'tagihanCount' => $tagihanCount]);
            } else {
                return redirect('/admin');
            }

        } else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('userprofile.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $u = User::find($id);
        $u->username = $request->username;
        $u->email = $request->email;
        $u->save();
        return redirect('/logout');
    }

    public function listTagihan()
    {
        // $data = DB::table('tagihan')
        //     ->where('status', 'belum')
        //     ->where('customerId', session('user')->id)
        //     ->whereIn('orderId', function ($q) {
        //         $q->select('idPemesanan')->from('orders')
        //             ->where('namaCustomer', session('user')->username)->where('jenis', 'kredit')
        //             ->where('status', '!=', 'Menunggu Konfirmasi')->where('status', '!=', '	Kirim bukti pembayaran')
        //             ->groupBy('idPemesanan');

        //     })
        //     ->whereNotIn('orderId', function($q){
        //         $q->select('orderId')->from('tagihan')->where('status','lunas');
        //     })
        //     ->groupBy('orderId')->get();
        $username = session('user')->username;
        $cusId = session('user')->id;
        $data = DB::select(DB::raw("SELECT * FROM tagihan WHERE customerId = '$cusId' and orderId in (select idPemesanan from orders where namaCustomer = '$username' and status != 'Menunggu Konfirmasi' and status !='Kirim bukti pembayaran' group by idPemesanan) 
        and orderId NOT IN (select orderId from tagihan where status='lunas' and customerId='$cusId' ) group by orderId order by idTagihan desc"));

        return view('userprofile.tagihan', compact('data'));
        // return response()->json($data);
    }
    public function detailTagihan($orderId, $customerId)
    {
        // $rs = DB::table('orders')
        //     ->selectRaw(" *, (select buktiPengiriman from pengiriman where orders.idPemesanan=pengiriman.idPemesanan) as buktiPengiriman")
        //     ->where('idPemesanan', $orderId)->get();
        $rs = DB::table('orders')
                ->join('products','orders.productId','=','products.productId')
                ->join('pengiriman','pengiriman.idPemesanan','=','orders.idPemesanan')
                ->join('pembayaran','pembayaran.idPemesanan','=','orders.idPemesanan')
                ->where('orders.idPemesanan',$orderId)
                ->select('orders.*','products.productName','products.price','pengiriman.address','pengiriman.buktiPengiriman','pembayaran.totalPembayaran','pembayaran.jenisPembayaran as jenis','pembayaran.buktiPembayaran')
                ->get();
        $tagih = DB::table('tagihan')->select('sisa', 'kali')->where('orderId', $orderId)->orderBy('idTagihan','desc');
        return view('userprofile.detailTagihan', ['detail' => $rs, 'tagih' => $tagih->first(),'kali'=>$tagih->count()]);

    }

    public function angsur(Request $req)
    {
        $jmlAngsur = $req->jmlAngsuran;
        $sisa = $req->sisa;
        $selisih = $sisa - $jmlAngsur;
        if ($selisih >= 0) {
            // $currentImg = DB::table('tagihan')->select('bukti')->where('idTagihan', $req->idTagihan)->first()->bukti;
            // $deletePath = str_replace('storage', 'public', $currentImg);
            // Storage::delete($deletePath);
            if ($selisih == 0) {
                $path = $req->file('buktiAngsuran')->store('public/image/bukti/tagihan');
                $path = str_replace('public', 'storage', $path);
                $data = [
                    'customerId'=>session('user')->id,
                    'orderId'=> $req->orderId,
                    'sisa'=>$selisih,
                    'bukti'=>$path,
                    'tanggal'=>date("Y-m-d"),
                    'jumlah'=>$jmlAngsur,
                    'status'=>'lunas'
                ];
                DB::table('tagihan')->insert($data);
            } else if ($selisih > 0) {
                $path = $req->file('buktiAngsuran')->store('public/image/bukti/tagihan');
                $path = str_replace('public', 'storage', $path);
                $data = [
                    'customerId'=>session('user')->id,
                    'orderId'=> $req->orderId,
                    'sisa'=>$selisih,
                    'bukti'=>$path,
                    'tanggal'=>date("Y-m-d"),
                    'jumlah'=>$jmlAngsur,
                    'status'=>'belum'
                ];
                DB::table('tagihan')->insert($data);
            }
            return view('userprofile.thanksAngsur');
        }else{
            return redirect()->back()->with('status', 'Maaf Angsuran anda melebihi tagihan');
        }

    }
}
