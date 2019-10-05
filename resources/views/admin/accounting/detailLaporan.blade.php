@extends('layouts.admin')

@section('pagetitle')
Sepatu Bordir.id | Accounting
@endsection

@section('header')
<div style="width:100%;padding:2%;height: 10%;background-color: #e873dd;text-align: center;z-index: 2">
    <h1 style="color:white">Enjoy Manage Your Business</h1>
    <b>
        <h1 style="color:white;font-weight: 700">SEPATU BORDIR.ID</h1>
    </b>
</div>
@endsection

@section('menubar')
<div class="sidenav">
    <div class="upper">
        <h4>{{session('user')->username}}</h4>
    </div>
    <a href="{{url('accounting/konfirmasi')}}">Konfirmasi Pembayaran</a>
    <a href="{{url('accounting/tagihan')}}">Tagihan</a>
    <a href="{{url('accounting/laporan')}}">Laporan Keuangan</a>
    <a href="{{url('/logout')}}">Log Out</a>
</div>
@endsection

@section('content')
<div class="main">
    <h4>Laporan Pembelian Kode ({{$data->kode}})</h4>
    <table class="table table-hover ">
        <thead class="thead-light">
            <tr class="table-danger">
                <th scope="col">No</th>
                <th scope="col">Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Vendor</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Bukti Pembelian</th>
            </tr>
        </thead>
        <tbody>
        @php $in = 1 @endphp
            @foreach($data->bahan as $d)
            <tr>
                    <td>{{$in++}}</td>
                    <td>{{$d->kode_bahan}}</td>
                    <td>{{$d->jumlah}}</td>
                    <td>{{$d->vendor}}</td>
                    <td>{{"Rp. " . number_format($d->harga,0,',','.')}}</td>
                    <td><a target="_blank" href="http://{{$url}}{{str_replace('public','storage',$d->bukti)}}" type="button" class="btn btn-light">Lihat</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>




</div>

@endsection