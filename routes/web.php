<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services/{slug}', [HomeController::class, 'show'])->name('services.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/services/accounting-finance', [HomeController::class, 'finance'])->name('services.finance');

