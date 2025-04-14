<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StoppageController;


Route::middleware(['auth', 'verified', 'locale'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    Route::resource('types', TypeController::class);
    Route::resource('rates', RateController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('photos', ImageController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('bookings', BookingController::class)->except('store');
    Route::resource('payments', PaymentController::class);
    Route::resource('stoppages', StoppageController::class);
    Route::resource('checkouts', CheckoutController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('categories', CategoryController::class);

    Route::get('/list/rooms/card', [RoomController::class, 'selectAll'])->name('rooms.card');
    Route::get('/search/rooms/card', [RoomController::class, 'search'])->name('rooms.search');

    Route::get('/list/partners/card', [PartnerController::class, 'selectAll'])->name('partners.card');
    Route::get('/search/partners/card', [PartnerController::class, 'search'])->name('partners.search');

    Route::get('/list/employees/card', [EmployeeController::class, 'selectAll'])->name('employees.card');
    Route::get('/search/employees/card', [EmployeeController::class, 'search'])->name('employees.search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/list/rooms/pdf', [RoomController::class, 'getRoomsPdf'])->name('rooms.pdf');
    Route::get('/list/partners/pdf', [PartnerController::class, 'getPartnersPdf'])->name('partners.pdf');
    Route::get('/contracts/{id}/pdf', [ContractController::class, 'getContractPdf'])->name('contracts.pdf');
    Route::get('/list/employees/pdf', [EmployeeController::class, 'getEmployeesPdf'])->name('employees.pdf');
});

require __DIR__.'/auth.php';