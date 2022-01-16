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
            'level' => '1'
        
        ]);

        if (Auth::attempt(['email'=> $request->input('email'),
        'password' => $request->input('password'),'level'=>'1'], $request->input('remember'))){
            return redirect()->route('admin');
        }
        else if (Auth::attempt(['email'=> $request->input('email'),
        'password' => $request->input('password'),'level'=>'2'], $request->input('remember'))){
            return redirect()->route('user');
        }
        Session::flash('error','Email hoặc password không đúng');
        return redirect()->back();
    }





    // public function index_home(){
    //     return view('user.user_log.login_user',[
    //         'title' => 'Đăng Nhập'
    //     ]);
    // }
    // public function home(Request $request){
    //     $this ->validate($request,[
    //         'email' => 'required|email:filter',
    //         'password' => 'required',
    //         'level' => '2'
        
    //     ]);

    //     if (Auth::attempt(['email'=> $request->input('email'),
    //     'password' => $request->input('password'),'level'=>'2'], $request->input('remember'))){
    //         return redirect()->route('user');
    //     }
    //     Session::flash('error','Email hoặc password không đúng');
    //     return redirect()->back();
    // }
}

