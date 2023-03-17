<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class MainController extends Controller
{
    public function index(){
        $sp=DB::table('sanphams')->orderby('id_sp','desc')->limit(8)->get();
        $nsx=DB::table('nhasanxuats')->orderby('id')->get();
        return view('page.home',[
            'title'=>'Chí Duy Mobile',
        ])->with('nsx',$nsx)->with('sp',$sp);
    }
    public function show($id){
        $nsx=DB::table('nhasanxuats')->orderby('id')->get();
        $sp=DB::table('sanphams')->where('ma_nsx',$id)->orderby('id_sp','desc')->get();
        return view('page.home',[
            'title'=>'Chí Duy Mobile',
        ])->with('sp',$sp)->with('nsx',$nsx)->with('id',$id);
    }
    public function detail($id){
        $sp=DB::table('sanphams')->where('id_sp',$id)->get();
        return view('page.product.detail',[
            'title'=>'Chí Duy Mobile',
        ])->with('sp',$sp);
    }
    
}
