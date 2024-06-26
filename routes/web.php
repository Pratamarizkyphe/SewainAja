<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CarSelection;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentController;

Route::get('/', function () {
    return view('home');
});


// Rent
// Route::resource('/rent', \App\Http\Controllers\RentController::class);
Route::get('/rent/fillForm', [RentController::class, 'fillForm'])->name('fillForm');
Route::get('/rent/selectDate', [RentController::class, 'selectDate'])->name('selectDate');



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
   
});

Route::middleware(['auth', 'user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

});
