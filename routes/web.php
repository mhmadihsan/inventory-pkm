<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ArciveController;

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

Route::get('login2',function (){
    return view('auth.login2');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('try',function (){
    return view('layouts_stisla.app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'master','auth'],function ($route){

    $route->group(['prefix'=>'sector'],function ($route){
        $route->get('/',[MasterController::class,'index_sector'])->name('index.sector');
        $route->get('add',[MasterController::class,'add_sector'])->name('sector.add');
        $route->get('edit/{id}',[MasterController::class,'edit_sector'])->name('sector.edit');

        $route->post('store',[MasterController::class,'store_sector']);
        $route->delete('delete/{id}',[MasterController::class,'delete_sector']);
    });

    $route->group(['prefix'=>'category'],function ($route){
        $route->get('/',[MasterController::class,'index_category'])->name('category.index');
        $route->get('add',[MasterController::class,'add_category'])->name('.category.add');
        $route->get('edit/{id}',[MasterController::class,'edit_category']);

        $route->post('store',[MasterController::class,'store_category']);
        $route->delete('delete/{id}',[MasterController::class,'delete_category']);
    });

    $route->group(['prefix'=>'users'],function ($route){
        $route->get('/',[MasterController::class,'index_user'])->name('index.users');
        $route->get('add',[MasterController::class,'add_user'])->name('add.users');
        $route->get('edit/{id}',[MasterController::class,'edit_user']);

        $route->post('store',[MasterController::class,'store_user']);
        $route->put('update/{id}',[MasterController::class,'update_user']);
        $route->delete('delete/{id}',[MasterController::class,'delete_user']);
    });


    $route->group(['prefix'=>'employess'],function ($route){
        $route->get('/',[MasterController::class,'index_employess'])->name('index.employess');
        $route->get('add',[MasterController::class,'add_employess']);
        $route->get('edit/{id}',[MasterController::class,'edit_employess']);

        $route->post('store',[MasterController::class,'store_employess']);
        $route->delete('delete/{id}',[MasterController::class,'delete_employess']);
    });

});

Route::group(['prefix'=>'arcive','auth'],function ($route){
    $route->get('/',[ArciveController::class,'index'])->name('arcive.index');

    $route->get('data',[ArciveController::class,'data'])->name('arcive.data');

    $route->get('getdata/{id}',[ArciveController::class,'getdata']);

    $route->post('store',[ArciveController::class,'store']);

    $route->post('update',[ArciveController::class,'update']);

    $route->delete('delete/{id}',[ArciveController::class,'delete']);
});
