<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => 'Đăng Nhập'
        ]);
    }
    public function store(Request $request){
        $this ->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required',
            'level' => 1
        
        ]);

        if (Auth::attempt(['email'=> $request->input('email'),'password' => $request->input('password'),'level' => $request(1)], $request->input('remember'))){
            return redirect()->route('admin');
        }
        Session::flash('error','Email hoặc password không đúng');
        return redirect()->back();
    }
//     public function store(Request $request)
//    {
//        $this->validate($request,[
//            'email' =>'required|email',
//            'password' => 'required'
//        ]);
//        $credentials = $request->only('email', 'password');
//        if (Auth::attempt($credentials, $request->input('remember'))) {
//             return redirect()->route('admin');
//        }
//        return redirect()->back();
//    }
}

