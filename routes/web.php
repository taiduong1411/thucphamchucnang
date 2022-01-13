<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\LogoutController;
use App\Http\Requests\CreateFormRequest;
use App\Http\Controllers\Admin\UploadController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/users/login', [LoginController::class, 'index'])->name('login');
Route::get('/admin/users/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){

        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('main',[MainController::class,'index'])->name('admin');
    
    
        #tao menu
        Route::prefix('menus')->group(function(){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::DELETE('destroy',[MenuController::class,'destroy']);



        });
        #route san pham
        Route::prefix('products')->group(function(){
            Route::get('add',[ProductController::class,'create']);
        });

        ##upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class,'store']);
    });

});