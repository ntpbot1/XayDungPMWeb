<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productService;
    // public function __construct(ProductAdminService $productAdminService)
    // {
    //     $this->productService = $productService;
    // }
    /**
     * Display a listing of the resource.
     *
     */
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            Redirect::to('admin.main');
        }else{
            Redirect::to('admin/users/login')->send();
        }
    }
    public function index()
    {
        $this->AuthLogin();
        $sp=DB::table('sanphams')->orderby('id_sp','desc')->get();
        $result['info']=DB::table('sanphams')->join('nhasanxuats','sanphams.ma_nsx','=','nhasanxuats.id')->orderby('sanphams.id_sp','desc')->get();
        // $['info']=DB::table('sanphams')->orderby('id','desc')->get()->toArray();
        return view('admin.product.list',[
            'title'=>'Danh Sách Nhà Sản Xuất',
            'result'=>$result,
            'sp'=>$sp
        ],);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $nsx=DB::table('nhasanxuats')->orderby('id')->get();
        return view('admin.product.add',[
            'title'=>'Thêm Sản Phẩm',
        ])->with('nsx',$nsx);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['ten_sp']=$request->ten;
        $data['gia_sp']=$request->gia;
        $data['ma_nsx']=$request->nsx;
        $get_img=$request->file('anh');
        if($get_img){
            $get_name_img=$get_img->getClientOriginalName();
            $name_img=current(explode('.',$get_name_img));
            $new_img=$name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('uploads/product',$new_img);
            $data['hinh_anh']=$new_img;
            DB::table('sanphams')->insert($data);
            Session::put('msg','Thêm sản phẩm thành công');
            return Redirect::to('admin/product/list');
        }
        else{
            $data['hinh_anh']='';
        DB::table('sanphams')->insert($data);
        Session::put('msg','Thêm sản phẩm thành công');
        return Redirect::to('admin/product/list');

        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->AuthLogin();
        $sp=DB::table('sanphams')->where('id',$id)->get();
        $nsx=DB::table('nhasanxuats')->orderby('id')->get();
        return view('admin.product.edit',[
            'title'=>'Chỉnh Sửa Sản Phẩm',
        ],)->with('sp',$sp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->AuthLogin();

        $sp=DB::table('sanphams')->where('id_sp',$id)->get();
        $nsx=DB::table('nhasanxuats')->orderby('id')->get();

        // $product = DB::table('sanphams')->join('nhasanxuats','sanphams.ma_nsx','=','nhasanxuats.id')->get();
        return view('admin.product.edit',['title'=>'Chỉnh sửa sản phẩm'])->with('sp',$sp)->with('nsx',$nsx);
        // return view('admin.product.edit',$manage_product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->AuthLogin();

        $data = array();
        $data['ten_sp']=$request->ten;
        $data['gia_sp']=$request->gia;
        $data['ma_nsx']=$request->nsx;
        $get_img=$request->file('anh');
        if($get_img){
            $get_name_img=$get_img->getClientOriginalName();
            $name_img=current(explode('.',$get_name_img));
            $new_img=$name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('uploads/product',$new_img);
            $data['hinh_anh']=$new_img;
            DB::table('sanphams')->where('id_sp',$id)->update($data);
            Session::put('msg','Cập nhật sản phẩm thành công');
            return Redirect::to('admin/product/list');

        }else{
            DB::table('sanphams')->where('id_sp',$id)->update($data);
            Session::put('msg','Cập nhật sản phẩm thành công');
        return Redirect::to('admin/product/list');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AuthLogin();

        DB::table('sanphams')->where('id_sp',$id)->delete();
        Session::put('msg','Xóa sản phẩm thành công');
        return Redirect::to('admin/product/list');
    }
}
