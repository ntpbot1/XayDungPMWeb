<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Nhasanxuat;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService=$menuService;
    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            Redirect::to('admin.main');
        }else{
            Redirect::to('admin/users/login')->send();
        }
    }
    public function create(){
        $this->AuthLogin();
        return view('admin.menu.add',[
            'title'=>'Thêm Nhà Sản Xuất',
        ]);
    }
    public function store(CreateFormRequest $request){
        $this->AuthLogin();
        $result = $this->menuService->create($request);
        return redirect()->back();
    }
    public function index(){
        $this->AuthLogin();
        $result['info']=DB::table('nhasanxuats')->get()->toArray();
        return view('admin.menu.list',[
            'title'=>'Danh Sách Nhà Sản Xuất',
            'result'=>$result
        ],);
    }
    public function destroy(Request $request){
        $this->AuthLogin();
        $request = $this->menuService->destroy($request);
        if($request){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công',
            ]);
        }
        return response()->json([
            'error'=>true,
        ]);
    }
    public function show(Nhasanxuat $nsx){
        $this->AuthLogin();
        return view('admin.menu.edit',[
            'title'=>'Chỉnh Sửa Nhà Sản Xuất',
            'result'=>$nsx
        ],);
    }
    public function update(Nhasanxuat $nsx,CreateFormRequest $request){
        $this->AuthLogin();
        $this->menuService->update($request,$nsx);
        return redirect('/admin/menus/list');
    }
}
