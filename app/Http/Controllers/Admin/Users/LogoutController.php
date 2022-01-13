<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Location;

class LogoutController extends Controller{
    public function logout(Request $request){
        $request->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return view('admin.users.logout',[
            'title' => 'Đăng Nhập'
        ]);
    }

}