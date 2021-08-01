<?php

use Aws\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AccountController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/', [LoginController::class, 'logged'])->name('admin');
    Route::resource('/product', ProductsController::class, ['names' => 'product']);
    Route::resource('/category', CategoryController::class, ['names' => 'category']);
    Route::resource('/users', UsersController::class, ['names' => 'users']);
    Route::resource('/account', AccountController::class, ['names' => 'account']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::get('admin/login', [LoginController::class, 'index']);
Route::post('admin/login', [LoginController::class, 'login'])->name('login');


//-----------------------------------------------------------

Route::any('/ckfinder/connector',[CKFinderController::class, 'requestAction'])
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', [CKFinderController::class, 'browserAction'])
    ->name('ckfinder_browser');

