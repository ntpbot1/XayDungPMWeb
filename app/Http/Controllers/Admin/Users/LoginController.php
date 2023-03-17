<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login');
    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            Redirect::to('admin.main');
        }else{
            Redirect::to('admin/users/login')->send();
        }
    }
    public function show(){
        $this->AuthLogin();
        return view('admin.main',[
            'title'=>'Trang Admin'
        ]);
    }
    public function store(Request $request){
        // dd($request->input());
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        $admin_email =$request->email;
        $admin_password =md5($request->password);
        $result = DB::table('taikhoans')->where('email',$admin_email)->where('password',$admin_password)->first();
        // return redirect()-> route('admin');

        // else{
        //     Session::flash('error','Email hoặc Password không đúng');
        //     return redirect()-> back();
        // }
        if($result){
            Session::put('admin_email',$result->email);
            Session::put('admin_name',$result->ho_ten);
            Session::put('admin_id',$result->id);
            return view('admin.home',[
                'title'=>'Trang quản trị Admin',
            ]);
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản không chính xác');
            return Redirect::to('/admin/users/login');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_id',null);
        Session::put('admin_email',null);
        return Redirect::to('/admin/users/login');
    }
}
