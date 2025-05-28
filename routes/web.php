<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

Route::post('/customer/appointment/update/{id}', [CustomerController::class, 'updateAppointment'])->name('customer.appointment.update');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/weekly', [AdminController::class, 'weeklyAppointments'])->name('admin.weekly');
});
Route::get('/customer/appointment/{id}', [CustomerController::class, 'showAppointmentDetails'])
    ->name('customer.appointment.details')
    ->middleware(['auth']);
Route::get('/admin/search-appointments', [AdminController::class, 'searchAppointments'])->name('admin.searchAppointments')->middleware(['auth', 'admin']);

Route::get('/admin/appointment/{id}', [AdminController::class, 'showAppointment'])
    ->name('admin.appointment.show')
    ->middleware(['auth', 'admin']);

Route::post('/admin/appointment/{id}/update', [AdminController::class, 'updateAppointment'])
    ->name('admin.appointment.update')
    ->middleware(['auth', 'admin']);

Route::get('/customer/cars', [CustomerController::class, 'showCustomerCars'])->middleware('auth')->name('customer.cars');
Route::post('/lich-huy/{appointment_id}', [CustomerController::class, 'cancelAppointment'])->name('appointment.cancel')->middleware('auth');
Route::get('/customer/vehicle/{vehicle_id}/history', [CustomerController::class, 'history'])
    ->middleware('auth')
    ->name('customer.vehicle.history');

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
Route::view('/lich-su-xe', 'CustomerCarsView')->name('cview');
Route::view('/lich-su-cuoc-hen', 'CustomerHistory   View')->name('hview');

