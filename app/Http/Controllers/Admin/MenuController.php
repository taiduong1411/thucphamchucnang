<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuServices;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuServices;

    public function __construct(MenuServices $menuServices)
    {
        $this->menuServices = $menuServices;
    }
    public function create(){
        return view('admin.menu.add',[
           'title' => 'Thêm danh mục mới',
           'menus'=> $this->menuServices->getParent()
        ]);
    }
    public function store(CreateFormRequest $request)
    {
        $this->menuServices->create($request);

        return redirect()->back();
    }
    public function index()
    {
        return view('admin.menu.list',[
            'title' => 'Danh Sách Sản Phẩm',
            'menus' => $this->menuServices->getAll()
        ]);
    }
    public function show(Menu $menu){
        return view('admin.menu.edit',[
            'title' => 'Chỉnh Sửa: ' . $menu->name,
            'menu' => $menu,
            'menus'=> $this->menuServices->getParent()
        ]);
    }
    public function update(Menu $menu, CreateFormRequest $request){
        $this->menuServices->update($request,$menu);
        return redirect('/admin/menus/list');

    }






    public function destroy(Request $request){
        $result = $this->menuServices->destroy($request);
        if ($result){
            return response()->json([
                'error'=>false,
                'message'=>'Đã Xoá Thành Công'
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'message'=>'Xoá Thất Bại !!!'
            ]);
        }
    }
}
