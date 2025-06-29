<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;

// Login & Register (manual)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.manual');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.manual');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google Login (Socialite)
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route setelah login
Route::middleware(['auth'])->group(function () {

    // Halaman untuk ADMIN, berdasarkan permission
    Route::get('/admin/page1', fn() => view('pages.admin_page1'))->middleware('permission:view_admin_page1');
    Route::get('/admin/page2', fn() => view('pages.admin_page2'))->middleware('permission:view_admin_page2');
    Route::get('/admin/page3', fn() => view('pages.admin_page3'))->middleware('permission:view_admin_page3');

    // Halaman untuk CUSTOMER, berdasarkan permission
    Route::get('/customer/page1', fn() => view('pages.customer_page1'))->middleware('permission:view_customer_page1');
    Route::get('/customer/page2', fn() => view('pages.customer_page2'))->middleware('permission:view_customer_page2');
    Route::get('/customer/page3', fn() => view('pages.customer_page3'))->middleware('permission:view_customer_page3');
});
