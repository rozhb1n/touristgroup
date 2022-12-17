<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\adminController;
use App\Http\Controllers\groupController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});


Route::resource('admin', adminController::class);


Route::resource('group', groupController::class);



Route::resource('register', registerController::class);



Route::resource('history', historyController::class);


Route::resource('contact', contactController::class);

