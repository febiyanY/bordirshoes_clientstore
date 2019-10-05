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
    <h4>Tagihan</h4>
    <table class="table table-hover ">
        <thead class="thead-light">
            <tr class="table-danger">
                <th scope="col">ID Order</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rs as $od)
            <tr>
                    <td>{{$od->orderId}}</td>
                    <td>{{$od->tanggal}}</td>
                    <td><a href="{{url('accounting/tagihan')}}/{{$od->orderId}}" type="button" class="btn btn-light">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>




</div>

@endsection