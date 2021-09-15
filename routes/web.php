<?php

use App\Http\Controllers\Album\AlbumController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/albums',AlbumController::class)->middleware('auth');
Route::post('albums/{album}/upload',[AlbumController::class,'upload'])->name('albums.upload')->middleware('auth');
Route::get('/albums/{album}/image/{image}',[AlbumController::class,'showImage'])->name('album.image.show');
Route::delete('/albums/{album}/image/{image}',[AlbumController::class,'deleteImageFromAlbum'])->name('album.delete.image');
