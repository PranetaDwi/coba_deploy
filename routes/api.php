<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryAPIController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getgallery', [GalleryAPIController::class, 'getGallery'])->name('apiGetgallery');
Route::get('/gallery', [GalleryAPIController::class, 'index'])->name('apiListgallery');
Route::get('/creategallery', [GalleryAPIController::class, 'create'])->name('apiCreateGallery');
Route::post('/postGallery', [GalleryAPIController::class, 'postGallery'])->name('apiPostgallery');
// coba duluuuu
// Route::post('/deleteGallery', [GalleryAPIController::class, 'deleteGallery'])->name('apiDeletegallery');


