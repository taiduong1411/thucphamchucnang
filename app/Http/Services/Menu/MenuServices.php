<?php
namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

class MenuServices{
    public function getParent()
    {
        return Menu::where('parent_id',0)->get();
    }
    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request){
        try{
            Menu::create([
                'name' => (string) $request-> input('name'),
                'giasanpham'=>(int) $request->input('giasanpham'),
                'parent_id' => (int) $request-> input('parent_id'),
                'description' => (string) $request-> input('description'),
                'content' => (string) $request-> input('content'),
                'image' => (string) $request-> input('image'),
                'active' => (string) $request-> input('active')


            ]);
            Session::flash('success','Them san pham Thành Công');
        }catch(\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
            
        }
        return true;
    }

    public function update($request,$menu) :bool
    {
            $menu -> fill($request->input());
            $menu -> save();



            Session::flash('success', 'Cập Nhật Thành Công');
            return true;
        
    }





    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ( $menu ){
            return Menu::where('id', $id)->orWhere('parent_id',$id)->delete();
        }else{

        }
    }


}