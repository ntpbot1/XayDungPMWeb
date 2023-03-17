<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
class OrderController extends Controller
{
    public function show(){
        $ldh=DB::table('dondathangs')->orderby('id_dat_hang','desc')->get();
        $ltt=DB::table('trangthais')->get();
        $lcs=DB::table('khachhangs')->get();
        $lcs1=array();
        foreach($lcs as $k => $v){
            $lcs1[$v->id_khach_hang]['name']=$v->ho_ten;
            $lcs1[$v->id_khach_hang]['phone']=$v->sdt;
            $lcs1[$v->id_khach_hang]['address']=$v->dia_chi;
        }
        return view('admin.order.list',[
            'title'=>'Danh Sách Đơn Hàng'
        ])->with('data',$ldh)->with('ltt',$ltt)->with('lcs',$lcs1);
    }
    public function update(Request $request,$id){
        DB::table('dondathangs')->where('id_dat_hang',$id)->update(['id_trang_thai'=>$request->tinhtrang]);
        $ldh=DB::table('dondathangs')->orderby('id_dat_hang','desc')->get();
        $ltt=DB::table('trangthais')->get();
        $lcs=DB::table('khachhangs')->get();
        $lcs1=array();
        foreach($lcs as $k => $v){
            $lcs1[$v->id_khach_hang]['name']=$v->ho_ten;
            $lcs1[$v->id_khach_hang]['phone']=$v->sdt;
            $lcs1[$v->id_khach_hang]['address']=$v->dia_chi;
        }
        return view('admin.order.list',[
            'title'=>'Danh Sách Đơn Hàng'
        ])->with('data',$ldh)->with('ltt',$ltt)->with('lcs',$lcs1);
    }
}
