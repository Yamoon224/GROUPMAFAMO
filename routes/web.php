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

Route::resource('bookings', BookingController::class)->only('store', 'show');
Route::get('/rooms/bookings/done', [Controller::class, 'booking'])->middleware('locale')->name('rooms.bookings.done');
Route::get('/', [Controller::class, 'home'])->middleware('locale')->name('home');
Route::get('/{locale}/locale', [Controller::class, 'setLocaleSwitch'])->name('locales.switch');
Route::get('/{currency}/currency', [Controller::class, 'setCurrency'])->name('currencies.change');
Route::get('/{id}/room/{name}', [Controller::class, 'room'])->middleware('locale')->name('rooms.book');
Route::get('/rooms/filter', [Controller::class, '_rooms'])->middleware('locale')->name('rooms.filter');
Route::get('/rooms', [Controller::class, 'rooms'])->middleware('locale')->name('rooms.index');


require_once __DIR__.'/admin.php';
