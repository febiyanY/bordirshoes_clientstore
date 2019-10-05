@extends('layouts.admin')

@section('pagetitle')
Sepatu Bordir.id | Outside Sale
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
    <a href="{{url('/outside')}}">Konfirmasi Akun Customer</a>
    <a href="{{url('/logout')}}">Log Out</a>

</div>
@endsection

@section('content')
<div class="main">
    <h4>Detail Customer</h4>
    <table class="table table-hover ">
        <thead class="thead-light">
            <!-- <tr class="table-danger">
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Kota Distribusi</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr> -->
        </thead>
        <tbody>
            <tr>
                <td>Customer ID</td>
                <td>:</td>
                <td>{{$rs->customerId}}</td>
            </tr>
            <tr>
                <td>Customer Name</td>
                <td>:</td>
                <td>{{$rs->customerName}}</td>
            </tr>
            <tr>
                <td>Kota Distribusi</td>
                <td>:</td>
                <td>{{$rs->kotaDistribusi}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$rs->address}}</td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>:</td>
                <td>{{$rs->phone}}</td>
            </tr>
            <tr>
                <td>Alamat Email</td>
                <td>:</td>
                <td>{{$rs->alamatEmail}}</td>
            </tr>
        </tbody>
    </table>
    <form action="{{route('outside.konfirmasi')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="customerId" value="{{$rs->customerId}}">
        <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit" value="Konfirmasi">

    </form>




</div>

@endsection