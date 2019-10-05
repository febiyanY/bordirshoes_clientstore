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
    <h4>Laporan Pembelian</h4>
    <table class="table table-hover ">
        <thead class="thead-light">
            <tr class="table-danger">
                <th scope="col">ID Pembelian</th>
                <th scope="col">Tanggal Request</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Status</th>
                <th scope="col">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                    <td>{{$d->kode}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>
                    <td>{{$d->status}}</td>
                    <td><a href="{{url('accounting/laporan')}}/{{$d->kode}}" type="button" class="btn btn-light">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>




</div>

@endsection