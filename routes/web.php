<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use CKSource\CKFinderBridge\Controller\CKFinderController;


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
Route::group(['prefix' => 'admin'],function () {
    Route::get('/', function () {
    return view('admin.page.dash');
    
    Route::get('/login', [LoginController::class, 'index'])->name('admin.loginPage');
    
});

});

Route::resource('product', ProductsController::class,['names' => 'product']);
Route::resource('category', CategoryController::class,['names' => 'category']);
Route::post('admin/login', [LoginController::class, 'login'])->name('login');

//-----------------------------------------------------------
Route::get('/test', function () {
    return view('test');
});
Route::any('/ckfinder/connector',[CKFinderController::class, 'requestAction'])
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', [CKFinderController::class, 'browserAction'])
    ->name('ckfinder_browser');


