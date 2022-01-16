<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        return view('admin.home_admin',[
            'title'=> 'Trang Admin'
        ]);
    }
    public function home(){
        return view('user.main_user',[
            'title'=> 'Trang User'
        ]);
    }
    public function shop(){
        return view('user.shop',[
            'title'=> 'Shop'
        ]);
    }
}
