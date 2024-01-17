<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::prefix('auth')->group(function(){
    Route::name('auth.')->group(function(){
        Route::get('/login',[AuthController::class, 'login'])->name('login');
        Route::get('/register',[AuthController::class, 'register'])->name('register');
        Route::post('/register',[AuthController::class, 'registration'])->name('userRegistration');
    });
});


Route::prefix('dashboard')->group(function(){
    Route::name('dashboard.')->group(function(){
        Route::get('/',[DashboardController::class, 'dashboard'])->name('panel');
    });
});

Route::prefix('category')->group(function(){
    Route::name('category.')->group(function(){
        Route::get('/',[CategoryController::class, 'all'])->name('all');
        Route::get('/add',[CategoryController::class, 'add'])->name('add');
    });
});