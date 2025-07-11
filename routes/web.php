<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services/{slug}', [HomeController::class, 'show'])->name('services.show');
Route::get('/contact', function () {
    return view('pages/contact');
})->name('contact');

Route::get('/about', function () {
    return view('pages/about');
})->name('about');

Route::get('/about-us', function () {
    return view('pages/about-us');
})->name('about');

Route::get('/services', function () {
    return view('pages/services');
})->name('services');

Route::get('industries', function () {
    return view('pages/industries');
})->name('industries');


Route::get('/solutions', function () {
    return view('pages/solutions');
});
Route::get('/consult', function () {
    return view('pages/schedule-consultation');
})->name('consult');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/manager', function () {
    return view('pages/managerial');
})->name('managerial');

Route::get('/out', function () {
    return view('pages/outsourcing');
})->name('outsourcing');

Route::get('/privacy-policy', function () {
    return view('pages/privacy');
})->name('privacy-policy');

Route::get('/breach', function () {
    return view('pages/breach');
})->name('Data Breach Policy & Procedures');

Route::get('/retention', function () {
    return view('pages/retention');
})->name('Data Retention & Deletion Policy');

Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', function () {
    return view('auth/signup');
})->name('signup');

Route::post('/signup/store',[SignupController::class, 'store'])->name('signup.store');
Route::post('/consultation/send', [ConsultationController::class, 'send'])->name('consultation.send');

// Blog routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// Admin blog routes - these should ideally be protected by auth middleware
Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
Route::post('/admin/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');


