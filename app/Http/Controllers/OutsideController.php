<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OutsideController extends Controller
{
    
    public function index(){
        $rs = DB::table('customer')
        ->where('terkonfirmasi','belum')->get();
        return view('admin.outside.index',compact('rs'));
   
    }
    public function detail($id){
        $rs = DB::table('customer')
        ->where('customerId',$id)->first();
        return view('admin.outside.detail',compact('rs'));
    }

    public function konfirmasi(Request $req){
        $id = $req->customerId;
        DB::table('customer')->where('customerId',$id)->update(['terkonfirmasi'=>'sudah']);
        return redirect()->route('outside.index')->with('msg','Konfirmasi Berhasil');
    }



    

    
}
