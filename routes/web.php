<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProDuctController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    //Danh Muc
    Route::prefix('danhmuc')->controller(CategoryController::class)->name('danhmuc.')->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');

        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    //San Pham

    Route::prefix('sanpham')->controller(ProDuctController::class)->name('sanpham.')->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');

        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });


});

// Giao Dien Nguoi Dung

Route::get('/',[UserHomeController::class, 'index'])->name('index');

Route::get('/san-pham/{id}',[UserHomeController::class, 'productDetail'])->name('productDetail');

Route::get('/san-pham',[UserHomeController::class, 'showAll'])->name('showAll');

Route::get('/san-pham/danh-muc/{id}',[UserHomeController::class, 'spDanhMuc'])->name('spDanhMuc');

Route::get('/ket-qua', function () {
    $sanphams = SanPham::orderBy('created_at', 'desc')->where('ten_sp', 'like', '%' . request('query') . '%')
    ->paginate(10);
    $danhmucs = DanhMuc::all();
    return view('client.product.result', compact('sanphams','danhmucs'))->with('query', request('query'));
});

// Gio hang 
 
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
