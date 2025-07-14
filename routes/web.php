<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
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





Route::group(['middleware' => ['role:Admin|Petugas','auth']],function(){
    Route::get('/dashboard',[DashboardController::class, 'index' ]);
    Route::get('/search_kategori', [DashboardController::class, 'kategori'])->name('filter_kategori');
    Route::resource('/laporan', LaporanController::class);
    Route::get('/setting',[DashboardController::class, 'setting' ]);
    Route::put('/setting/{petuga}/edit',[DashboardController::class, 'update' ])->name('update');
    Route::get('/setting/{petuga}',[DashboardController::class, 'destroy' ])->name('destroy');
    Route::get('/logout',[LoginController::class, 'logout' ]);
});

Route::group(['middleware' => ['role:Admin','auth']],function(){

    Route::resource('/wilayah', \App\Http\Controllers\WilayahController::class);
    Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
    Route::resource('/kanal', \App\Http\Controllers\KanalController::class);
    Route::resource('/polsek', \App\Http\Controllers\PolsekController::class);
    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::resource('/petugas', \App\Http\Controllers\PolisiController::class);

});




Route::get('/login',[LoginController::class, 'index' ])->name('login');
Route::post('/login',[LoginController::class, 'login' ]);



// Route::get('/forgot',[LoginController::class, 'forgot' ]);


// Route::get('/petugas-login',[DashboardController::class, 'login' ]);
// Route::post('/login-petugas',[DashboardController::class, 'loginproses' ]);



// Route::get('/register',[LoginController::class, 'register' ]);
// Route::post('/register',[LoginController::class, 'store' ]);



