<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagemenController;
use App\Http\Controllers\GalleryController;


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


Route::controller(AuthController::class)->group(function(){
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');   
});

Route::prefix('home')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/about', [DashboardController::class, 'about'])->name('about');
    Route::get('/portfolio', [DashboardController::class, 'portfolio'])->name('portfolio');
});

Route::prefix('managemen')->group(function () {
    Route::get('/', [UserManagemenController::class, 'index'])->name('managemenUser');
    Route::get('/edit/{id}', [UserManagemenController::class, 'edit'])->name('managemenUser.edit');
    Route::post('/update/{id}', [UserManagemenController::class, 'update'])->name('managemenUser.update');
    Route::post('/delete/{id}', [UserManagemenController::class, 'destroy'])->name('managemenUser.destroy');
});

Route::resource('gallery', GalleryController::class);

