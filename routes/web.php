<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('bookings', BookingController::class)->only('store');
Route::get('/bookings/done', [Controller::class, 'booking'])->name('bookings.done');
Route::get('/', [Controller::class, 'welcome'])->middleware('locale')->name('welcome');
Route::get('/{locale}/locale', [Controller::class, 'setLocaleApp'])->name('locales.change');
Route::get('/{currency}/currency', [Controller::class, 'setCurrency'])->name('currencies.change');
Route::get('/{id}/room/{name}', [Controller::class, 'room'])->middleware('locale')->name('rooms.book');
Route::get('/rooms/filter', [Controller::class, 'rooms'])->middleware('locale')->name('rooms.filter');


