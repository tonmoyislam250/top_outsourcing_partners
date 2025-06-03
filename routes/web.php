<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ConsultationController;

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

Route::post('/consultation/send', [ConsultationController::class, 'send'])->name('consultation.send');