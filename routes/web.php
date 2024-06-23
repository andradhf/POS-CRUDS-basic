<?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SellingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/count', [KasirController::class,'index'])->name('index');
    
});

Route::controller(KasirController::class)->group(function(){
    Route::get('/count/delete/all','destroy')->name('count.delete.all');
    //Route::get('/count/delete', 'delete')->name('count.delete');
    
    });

Route::post('/count-store', [KasirController::class, 'store'])->name('count-store');
Route::get('/count/delete/{id}',[KasirController::class,'delete'])->name('delete')->middleware('auth');

//Route::delete('/count/delete', [KasirController::class,'delete'])->name('count.delete');

Route::get('/cetak',[KasirController::class, 'cetak'])->name('cetak');

Route::post('/selling',[SellingController::class, 'selling'])->name('selling');


