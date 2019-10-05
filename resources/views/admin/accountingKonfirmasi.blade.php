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
                <form action="{{url('accounting/konfirmasi')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                    {{csrf_field()}}
                <div class="col-12">
                    <div class="table-responsive">
                        <h5 style="text-align:center">ID ({{$detail[0]->idPemesanan}})</h5>
                        <input type="hidden" name="idPemesanan" value="{{$detail[0]->idPemesanan}}">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    
                                    <th scope="col">Produk</th>
                                    <th scope="col">Ukuran</th>
                                    <th scope="col" class="text-center">Jumlah</th>
                                    <th scope="col" class="text-right">Harga</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                           
                            $total=0;
                         ?>
                                @foreach($detail as $cp)
                                <tr>
                                    <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                                    
                                    <td>{{$cp->productName}}</td>
                                    <td>{{$cp->size}}</td>
                                    <td>{{$cp->quantity}}</td>
                                    <td class="text-right">Rp. {{$cp->totalPrice}}</td>
                                    <!-- <td class="text-right"><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td> -->
                                </tr>
                                <?php 
                                    $total=$total+($cp->totalPrice);
                                 ?>
                                 @endforeach 
                                
                                <tr>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong>Rp. {{$total}}</strong></td>
                                </tr>
                                <tr>
                                    <td></td>
                                
                                    <td></td>
                                    <td></td>
                                    <td><strong>Voucher</strong></td>
                                    <td class="text-right"><strong>{{$detail[0]->promo}}%</strong></td>
                                </tr>
                                <tr>
                                    <td></td>
                                
                                    <td></td>
                                    <td></td>
                                    <td><strong>Jenis</strong></td>
                                    <td class="text-right"><strong>{{$detail[0]->jenis}}</strong></td>
                                </tr>
                                <tr>
                                    <td></td>
                                
                                    <td></td>
                                    <td></td>
                                    <td><strong>Yang harus dibayar</strong></td>
                                    <td class="text-right"><strong>Rp. {{$total-($total*($detail[0]->promo/100))}}</strong></td>
                                    <input type="hidden" name="pay" value="{{$total-($total*($detail[0]->promo/100))}}">
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            
                            <label for=""> Bukti pembayaran</label><br>
                            <a target="_blank" href="{{asset($detail[0]->buktiPembayaran)}}">
                            <img style="height:100px; width:100px" src="{{asset($detail[0]->buktiPembayaran)}}" />
                            </a>
                            
                        </div>
                        
                        <div class="col-sm-12 col-md-6 text-right">
                        
                        <label for=""> <br></label>
                            <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit" value="Konfirmasi">
                         
                        </div>
                       
                    </div>
                </div>
            
            </div>
        </form>
        </div>



</div>

@endsection