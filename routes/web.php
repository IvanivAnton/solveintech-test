<?php

use App\Http\Controllers\UserPage;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserPage\RegisterUserController::class, '__invoke'])->name('register');
Route::post('/login', UserPage\LoginUserController::class)->name('login');
Route::post('/logout', UserPage\LogoutUserController::class)->name('logout');
Route::post('/regenerate-token', UserPage\GenerateApiTokenController::class)->name('regenerateToken');
Route::get('/', UserPage\IndexController::class)->name('index');
