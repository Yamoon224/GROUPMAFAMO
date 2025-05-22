<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DotationController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StoppageController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CashflowController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\CorrespondenceController;

Route::get('/{locale}/locale', [Controller::class, 'setLocaleSwitch'])->name('locales.switch');

Route::middleware(['auth', 'verified', 'locale'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/databoard', [Controller::class, 'databoard'])->name('databoard');
    Route::get('/groups', [Controller::class, 'groups'])->name('groups.index');

    Route::resource('users', UserController::class);
    Route::resource('establishments', EstablishmentController::class);
    Route::resource('rates', RateController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('photos', ImageController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('bookings', BookingController::class)->except('store');
    Route::resource('payments', PaymentController::class);
    Route::resource('billings', BillingController::class);
    Route::resource('stoppages', StoppageController::class);
    Route::resource('checkouts', CheckoutController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('dotations', DotationController::class);
    Route::resource('cashflows', CashflowController::class);
    Route::resource('quotations', QuotationController::class);
    Route::resource('equipments', EquipmentController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('correspondences', CorrespondenceController::class);
    

    Route::get('/search/rooms/card', [RoomController::class, 'search'])->name('rooms.search');
    Route::get('/search/partners/card', [PartnerController::class, 'search'])->name('partners.search');
    Route::get('/search/employees/card', [EmployeeController::class, 'search'])->name('employees.search');

    Route::get('/profile', [Controller::class, 'profile'])->name('profile');

    Route::get('/list/rooms/pdf', [RoomController::class, 'getRoomsPdf'])->name('rooms.pdf');
    Route::get('/list/partners/pdf', [PartnerController::class, 'getPartnersPdf'])->name('partners.pdf');
    Route::get('/quotations/{id}/pdf', [QuotationController::class, 'getQuotationPdf'])->name('quotations.pdf');
    Route::get('/list/employees/pdf', [EmployeeController::class, 'getEmployeesPdf'])->name('employees.pdf');
    Route::get('/{year}/salaries/{month}/employees/{checkout}/pdf', [PaymentController::class, 'getPaymentPdf'])->name('payments.pdf');
    
    Route::get('/list/dotations/pdf', [DotationController::class, 'getDotationsPdf'])->name('dotations.pdf');
    Route::get('/list/equipments/pdf', [EquipmentController::class, 'getEquipmentsPdf'])->name('equipments.pdf');
    Route::get('/list/appointments/pdf', [AppointmentController::class, 'getAppointmentsPdf'])->name('appointments.pdf');
    Route::get('/list/correspondences/pdf', [CorrespondenceController::class, 'getCorrespondencesPdf'])->name('correspondences.pdf');
    Route::get('/list/stoppages/pdf', [StoppageController::class, 'getStoppagesPdf'])->name('stoppages.pdf');
});

require_once __DIR__.'/auth.php';