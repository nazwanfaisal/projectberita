<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Artikelcontroller;
use App\Http\controllers\JudulController;

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

Route::group(
     ['prefix'=>'admin','middleware'=>['auth','role:member']], function () {
         Route::get('/home',[App\Http\controllers\ArtikelController::class, 'index'])->name('home');
        });

        Route::resource('artikel',ArtikelController::class );
        Route::resource('judul',JudulController::class );