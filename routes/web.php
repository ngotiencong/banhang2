<?php

use Aws\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use CKSource\CKFinderBridge\Controller\CKFinderController;
use Illuminate\Support\Facades\Route;

;
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
Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('home.show');
//-----------------------------------------------------------------------------
Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
//==============================================================================
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [LoginController::class, 'logged'])->name('admin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/product', ProductsController::class, ['names' => 'product']);
    Route::resource('/category', CategoryController::class, ['names' => 'category']);
    Route::resource('/users', UsersController::class, ['names' => 'users']);
    Route::resource('/account', AccountController::class, ['names' => 'account']);
    Route::resource('/banner', BannerController::class, ['names' => 'banner']);
    
});
Route::get('admin/login', [LoginController::class, 'index']);
Route::post('admin/login', [LoginController::class, 'login'])->name('login');

///
Route::group(['prefix' => 'cart'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('remove', [CartController::class, 'remove'])->name('cart.remove');
});





//-----------------------------------------------------------

Route::any('/ckfinder/connector', [CKFinderController::class, 'requestAction'])
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', [CKFinderController::class, 'browserAction'])
    ->name('ckfinder_browser');
