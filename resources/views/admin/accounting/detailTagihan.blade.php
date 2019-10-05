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
        <div class="container mb-4">
                <form action="{{url('accounting/kirimtagihan')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                    {{csrf_field()}}
                <div class="col-12">
                    <div class="table-responsive">
                        <h5 style="text-align:center">ID ({{$rs[0]->orderId}})</h5>
                       
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> Angsuran Ke </th>
                                    
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Sisa</th>
                                    <th scope="col" >Tanggal</th>
                                    <th scope="col" >Bukti</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=0; @endphp
                                @foreach($rs as $r)
                                @php $no++; @endphp
                               <tr>
                                   <td>{{$no}}</td>
                                   <td>Rp.{{number_format($r->jumlah, 2, '.', ',')}}</td>
                                   <td>Rp.{{number_format($r->sisa, 2, '.', ',')}}</td>
                                   <td>{{$r->tanggal}}</td>
                                   <td>
                                       <img src="{{asset($r->bukti)}}" style="height:50px;height:50px" alt="">
                                   </td>
                               </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            
                           
                            
                        </div>
                        
                        <div class="col-sm-12 col-md-6 text-right">
                        
                        <label for=""> <br></label>
                            <!-- <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit" value="Tagih"> -->
                         
                        </div>
                       
                    </div>
                </div>
            
            </div>
        </form>
        </div>



</div>

@endsection