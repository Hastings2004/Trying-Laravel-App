<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::redirect('/', 'posts');


Route::middleware('auth') -> group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::resource('posts',PostController::class);
    Route::get('/{user}/posts', [DashboardController::class,'usersPosts'])->name('posts.users');

});



Route::middleware('guest') -> group(function (){
    Route::view('/register','auth.register')->name('register');
    Route::post('/register',[AuthController::class,'register']);

    Route::view('/login','auth.login')->name('login');
    Route::post('/login',[AuthController::class,'login']);

});