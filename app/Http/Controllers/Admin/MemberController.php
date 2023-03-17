<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
class MemberController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            Redirect::to('admin.main');
        }else{
            Redirect::to('admin/users/login')->send();
        }
    }
    public function show(){
        $lcs=DB::table('khachhangs')->orderby('id_khach_hang','desc')->get();
        return view('admin.customer.list',[
            'title'=>'Danh Sách Khách Hàng'
        ])->with('data',$lcs);
    }
}
