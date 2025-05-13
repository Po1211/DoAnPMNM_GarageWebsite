<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/thong-tin', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::get('/dang-nhap', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'login'])->name('login.submit');
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/lien-he', [AppointmentController::class, 'create'])->name('lienhe');
Route::get('/dang-ky', [SignUpController::class, 'showForm'])->name('register');
Route::post('/dang-ky', [SignUpController::class, 'register'])->name('register.submit');

Route::view('/', 'TrangChu02')->name('home');
Route::view('/gioi-thieu', 'GioiThieu01')->name('gioithieu');
Route::view('/bao-tri', 'BaoTri')->name('baotri');
Route::view('/gam-may', 'GamMay01')->name('gammay');
Route::view('/phuc-hoi', 'PhucHoi')->name('phuchoi');
Route::view('/tin-tuc', 'TinTucMain')->name('tintuc');
Route::view('/tim-kiem-tin-tuc', 'TinTucSearch')->name('tintucsearch');
Route::view('/tin-tuc-chi-tiet', 'TrangTinTuc')->name('trangtintuc');
Route::view('/sign-in', 'SignIn')->name('signin');
Route::view('/sign-up', 'SignUp')->name('signup');

