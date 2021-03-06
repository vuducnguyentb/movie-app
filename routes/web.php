<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;



Route::get('/',[IndexController::class,'index'])->name('home-page');
Route::get('/danh-muc/{slug}',[IndexController::class,'category'])->name('category');
Route::get('/the-loai/{slug}',[IndexController::class,'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[IndexController::class,'country'])->name('country');
Route::get('/xem-phim',[IndexController::class,'watch'])->name('watch');
Route::get('/phim/{slug}',[IndexController::class,'movie'])->name('movie');
Route::get('/episode',[IndexController::class,'episode'])->name('episode');

Route::post('resorting',[CategoryController::class,'resorting'])->name('resorting-category');

Auth::routes();
Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

//route admin
Route::resource('category',CategoryController::class);
Route::resource('genre',GenreController::class);
Route::resource('country',CountryController::class);
Route::resource('movie',MovieController::class);
Route::resource('episode',EpisodeController::class);

