<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\HomeController;

 
Route::get( '/', [HomeController::class, 'index'])->name('home');
 
Route::resource('users',  UserController::class);
Route::resource( 'products',  ProductController::class);
Route::resource( 'fishes',  FishController::class);
 