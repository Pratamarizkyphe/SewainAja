<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CarSelection;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentDataController;

Route::get('/', function () {
    return view('home');
});


// Rent
// Route::resource('/rent', \App\Http\Controllers\RentController::class);




Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'owner'])->group(function(){
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/data-mobil', \App\Http\Controllers\MobilController::class)->names('mobils');
    Route::get('/admin/data-penyewaan', [RentDataController::class, 'index'])->name('admin.data-penyewaan');
    Route::post('/admin/verify-payment/{id}', [RentDataController::class, 'verifyPayment'])->name('admin.verifyPayment');
    Route::get('/admin/detail-penyewaan/{id}', [RentDataController::class, 'detailShow'])->name('admin.detailShow');
    Route::delete('/admin/delete-penyewaan/{id}', [RentDataController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/log', [AdminController::class, 'totalIncome'])->name('admin.log');
});

Route::middleware(['auth', 'user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/rent/fillForm', [RentController::class, 'fillForm'])->name('fillForm');
    Route::get('/rent/selectDate', [RentController::class, 'selectDate'])->name('selectDate');
    Route::post('/rent/store', [RentController::class, 'store'])->name('store');
    Route::get('/rent/payment', [RentController::class, 'showPaymentForm'])->name('showPaymentForm');
    Route::post('/rent/payment/process', [RentController::class, 'processPayment'])->name('processPayment');
    Route::get('/rent/payment/success', function () {
        return view('rent.payment-success');
    })->name('paymentSuccess');
    Route::get('/user/riwayat-penyewaan', [UserController::class, 'historyRent'])->name('user.riwayat-penyewaan');
    Route::get('/user/riwayat-penyewaan/{id}', [UserController::class, 'historyRentDetail'])->name('user.detail-riwayat');
});
