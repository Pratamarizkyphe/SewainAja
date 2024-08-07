<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentController;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


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

// Route::post('/contact-send', function (Request $request) {
//     // dd($request);
//     Mail::to('pratamarizky249b@gmail.com')->send(new TestEmail());
//     return redirect('/contact');
// });

Route::post('/contact-send', [UserController::class, 'getMailText'])->name('getMailText');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'owner'])->group(function(){
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
});

Route::post('/admin/verify-payment/{id}', [AdminController::class, 'verifyPayment'])->name('admin.verifyPayment');

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/data-mobil', \App\Http\Controllers\MobilController::class)->names('mobils');
    Route::get('/admin/data-penyewaan', [AdminController::class, 'dataPenyewaan'])->name('admin.data-penyewaan');
    Route::post('/admin/verify-payment/{id}', [AdminController::class, 'verifyPayment'])->name('admin.verifyPayment');
    Route::get('/admin/detail-penyewaan/{id}', [AdminController::class, 'detailShow'])->name('admin.detailShow');
    Route::delete('/admin/delete-penyewaan/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin/approve-cancel-penyewaan/{id}', [AdminController::class, 'approveCancel'])->name('admin.approveCancel');
    Route::post('/admin/reject-cancel-penyewaan/{id}', [AdminController::class, 'rejectCancel'])->name('admin.rejectCancel');
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
    Route::get('/cancel-rental/{id}', [UserController::class, 'cancelRental'])->name('user.cancel');
});
