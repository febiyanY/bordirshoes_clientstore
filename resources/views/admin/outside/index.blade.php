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
    <h4>Konfirmasi Customer</h4>
    @if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
    @endif
    <table class="table table-hover ">
        <thead class="thead-light">
            <tr class="table-danger">
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Kota Distribusi</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rs as $od)
            <tr>
                <td>{{$od->customerId}}</td>
                <td>{{$od->customerName}}</td>
                <td>{{$od->kotaDistribusi}}</td>
                <td>{{$od->alamatEmail}}</td>
                <td><a href="{{route('outside.detail',['id'=>$od->customerId])}}" type="button"
                        class="btn btn-light">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>




</div>

@endsection