<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\CustomerViewController;
use App\Http\Controllers\dashboardsController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\greetingsCrontroller;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PackagesCrontroller;
use App\Http\Controllers\PromotionsController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CustomerViewController::class, 'index'])->name('customerHome');
Route::get('booking', [CustomerViewController::class, 'booking'])->name('booking');
Route::get('bookingPickup', [CustomerViewController::class, 'bookingPickup'])->name('bookingPickup');
Route::post('booking/store', [CustomerViewController::class, 'bookingStore'])->name('booking.store');


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('dashboard', [dashboardsController::class, 'index'])->name('dashboard')->middleware('auth');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('drivers', [DriversController::class, 'index'])->name('drivers.index')->middleware(Authenticate::class);
Route::post('drivers/store', [DriversController::class, 'store'])->name('drivers.store')->middleware(Authenticate::class);
Route::get('drivers/{id}/edit', [DriversController::class, 'edit'])->name('drivers.edit')->middleware(Authenticate::class);
Route::put('drivers/{id}/update', [DriversController::class, 'update'])->name('drivers.update')->middleware(Authenticate::class);
Route::delete('drivers/{id}/destroy', [DriversController::class, 'destroy'])->name('drivers.destroy')->middleware(Authenticate::class);


Route::get('cars', [CarsController::class, 'index'])->name('cars.index')->middleware(Authenticate::class);
Route::post('cars/store', [CarsController::class, 'store'])->name('cars.store')->middleware(Authenticate::class);
Route::get('cars/{id}/edit', [CarsController::class, 'edit'])->name('cars.edit')->middleware(Authenticate::class);
Route::put('cars/{id}/update', [CarsController::class, 'update'])->name('cars.update')->middleware(Authenticate::class);
Route::delete('cars/{id}/destroy', [CarsController::class, 'destroy'])->name('cars.destroy')->middleware(Authenticate::class);

Route::get('promotions', [PromotionsController::class, 'index'])->name('promotions.index')->middleware(Authenticate::class);
Route::post('promotions/store', [PromotionsController::class, 'store'])->name('promotions.store')->middleware(Authenticate::class);
Route::get('promotions/{id}/edit', [PromotionsController::class, 'edit'])->name('promotions.edit')->middleware(Authenticate::class);
Route::put('promotions/{id}/update', [PromotionsController::class, 'update'])->name('promotions.update')->middleware(Authenticate::class);
Route::delete('promotions/{id}/destroy', [PromotionsController::class, 'destroy'])->name('promotions.destroy')->middleware(Authenticate::class);


Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index')->middleware(Authenticate::class);
Route::post('invoices/store', [InvoiceController::class, 'store'])->name('invoices.store')->middleware(Authenticate::class);
Route::get('invoices/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit')->middleware(Authenticate::class);
Route::put('invoices/{id}/update', [InvoiceController::class, 'update'])->name('invoices.update')->middleware(Authenticate::class);

Route::get('packages', [PackagesCrontroller::class, 'index'])->name('packages.index')->middleware(Authenticate::class);
Route::post('packages/store', [PackagesCrontroller::class, 'store'])->name('packages.store')->middleware(Authenticate::class);
Route::get('packages/{id}/edit', [PackagesCrontroller::class, 'edit'])->name('packages.edit')->middleware(Authenticate::class);
Route::put('packages/{id}/update', [PackagesCrontroller::class, 'update'])->name('packages.update')->middleware(Authenticate::class);
Route::delete('packages/{id}/destroy', [PackagesCrontroller::class, 'destroy'])->name('packages.destroy')->middleware(Authenticate::class);

Route::get('greetings/edit', [greetingsCrontroller::class, 'edit'])->name('greetings.edit')->middleware(Authenticate::class);
Route::put('greetings/{id}/update', [greetingsCrontroller::class, 'update'])->name('greetings.update')->middleware(Authenticate::class);
