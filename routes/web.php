<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\SitemapController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services/{slug}', [HomeController::class, 'show'])->name('services.show');
Route::get('/contact', function () {
    return view('pages/contact');
})->name('contact');

Route::get('/about-us', function () {
    return view('pages/about-us');
})->name('about');

Route::get('/team-members', function () {
    return view('pages/team-members');
})->name('about-us');

Route::get('/team-members/public', [TeamMemberController::class, 'show'])->name('team-members.show');

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

// Sitemap routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/sitemap/validate', [SitemapController::class, 'validate'])->name('sitemap.validate');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup')->middleware('guest');
Route::post('/signup/store',[SignupController::class, 'store'])->name('signup.store')->middleware('guest');

// Dashboard route for authenticated users
Route::get('/dashboard', function () {
    return redirect()->route('blogs.index');
})->middleware('auth')->name('dashboard');
Route::post('/consultation/send', [ConsultationController::class, 'send'])->name('consultation.send');

// Blog routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// Newsletter subscription
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Admin blog routes - protected by auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/admin/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/admin/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/admin/blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/admin/blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
    
    // AJAX routes for blog management
    Route::get('/admin/blogs/{blog}/', [BlogController::class, 'getForEdit'])->name('admin.blogs.get-for-edit');
    Route::delete('/blogs/{blog}/ajax-delete', [BlogController::class, 'ajaxDestroy'])->name('blogs.ajax-destroy');
    Route::post('/admin/blogs/upload-image', [BlogController::class, 'uploadImage'])->name('admin.blogs.upload-image');
    
    // Team Members admin routes
    Route::get('/admin/team-members', [TeamMemberController::class, 'index'])->name('admin.team-members.index');
    Route::get('/admin/team-members/create', [TeamMemberController::class, 'create'])->name('admin.team-members.create');
    Route::post('/admin/team-members', [TeamMemberController::class, 'store'])->name('admin.team-members.store');
    Route::get('/admin/team-members/{teamMember}/edit', [TeamMemberController::class, 'edit'])->name('admin.team-members.edit');
    Route::put('/admin/team-members/{teamMember}', [TeamMemberController::class, 'update'])->name('admin.team-members.update');
    Route::delete('/admin/team-members/{teamMember}', [TeamMemberController::class, 'destroy'])->name('admin.team-members.destroy');
    
    // AJAX routes for team member management
    Route::get('/admin/team-members/{teamMember}/edit-data', [TeamMemberController::class, 'getForEdit'])->name('admin.team-members.get-for-edit');
    Route::delete('/admin/team-members/{teamMember}/ajax-delete', [TeamMemberController::class, 'ajaxDestroy'])->name('admin.team-members.ajax-destroy');
    
    // Newsletter admin routes
    Route::get('/admin/newsletter', [NewsletterController::class, 'adminIndex'])->name('admin.newsletter.index');
    Route::post('/admin/newsletter/test', [NewsletterController::class, 'sendTestNewsletter'])->name('admin.newsletter.test');
});


