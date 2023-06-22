<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminOrdersController;
use App\Http\Controllers\AdminCarsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\ValidateController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\pdfController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/User/{userId}/order', [OrderController::class, 'showUserOrders'])->name('User.order');

// Route::put('/profile', 'UserController@update')->name('profile.update');
// Route::put('/users/{id}', [DriverDetailsController::class, 'updateUser'])->name('Driver.update');


Route::resource('User', UserController::class);
Route::resource('Cars', CarsController::class);
Route::resource('Orders', OrdersController::class);

Route::resource('Dashboard', AdminOrdersController::class);
Route::resource('tomobilat', AdminCarsController::class);
Route::resource('users', AdminUsersController::class);
Route::get('/validate/{id}' ,[ ValidateController::class,"validateOrder"])->name('Orders.validate');
Route::get('/approve/{id}' ,[ ApproveController::class,"approveOrder"])->name('Orders.approve');
Route::get('/reject/{id}' ,[ ApproveController::class,"rejectOrder"])->name('Orders.reject');

// Route::get('/orders/{id}/pdf', [pdfController::class, 'pdf'])->name('Orders.pdf');

Route::get('pdf/preview/{id}', [pdfController::class, 'preview'])->name('pdf.preview');
Route::get('pdf/generate', [pdfController::class, 'generatePDF'])->name('pdf.generate');
Route::get('/available/{id}', [CarsController::class, 'available'])->name('availability');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

//filtering
Route::post('/cars', [CarsController::class, 'filterCars'])->name('Cars.filter');
Route::get('/cars/clear-filters', [CarsController::class, 'clearFilters'])->name('Cars.clearFilters');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
