<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProDuctController;
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


