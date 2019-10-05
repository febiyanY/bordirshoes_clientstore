@extends('layouts.admin')

@section('pagetitle')
Sepatu Bordir.id | Marketing
@endsection

@section('styles')
<style>
    .cityBox {
        background-color: #e873dd;
        width: 100%;
        border-radius: 5px;
        text-align: center;
        height: 12vh;
        padding: 2%;
        margin-top: 20%;
        transition: 0.2s;
    }

    .cityBox p {
        color: white;
        font-size: 1.3em;
    }
    .cityBox:hover{
        background-color: #ef8e9c;
    }
</style>
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
    <a href="{{url('marketing/pengadaan')}}">Pengadaan Barang</a>
    <a href="{{url('marketing/status-pemesanan')}}">Status Pemesanan</a>
    <a href="{{url('marketing/pengiriman')}}">Pengiriman</a>
    <a href="{{url('/logout')}}">Log Out</a>
</div>
@endsection

@section('content')
<div class="main">
    <h4>Pengajuan Pengadaan Barang</h4>

    <div class="row">

        @foreach($city as $row)
        <div class="col-sm-3">
            <a href="{{url('marketing/pengadaan')}}/{{$row->id}}">
                <div class="cityBox">
                    <p>{{ucfirst($row->namaKota)}}</p> <p>({{$row->counter}})</p>
                </div>
            </a>
        </div>
        @endforeach
        

    </div>


    <!-- <div class="card" >
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div> -->




</div>

@endsection