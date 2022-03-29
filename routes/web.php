<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\anasayfaController;
use \App\Http\Controllers\adminController;
use \App\Http\Controllers\biyografiController;
use \App\Http\Controllers\fotoController;


Route::get('/',[anasayfaController::class, 'anasayfa']);

Route::prefix('admin')->middleware('auth')->group(function (){
Route::get('/', [adminController::class, 'admin'])->name('admin');
Route::get('/biyografiEkle', [biyografiController::class, 'biyografiEkle'])->name('biyografiEkle');
Route::post('/biyografiEklendi', [biyografiController::class, 'biyografiEklendi'])->name('biyografiEklendi');
Route::get('/foto', [fotoController::class, 'foto'])->name('foto');
Route::get('/fotoEkle/{id?}', [fotoController::class, 'fotoEkle'])->name('fotoEkle');
Route::post('/fotoEklendi', [fotoController::class, 'fotoEklendi'])->name('fotoEklendi');
Route::post('/fotoSil', [fotoController::class, 'fotoSil'])->name("fotoSil");

});
Route::get("/getFoto/{offset?}/{limit?}", [fotoController::class, "listele"])->name("getFoto");

