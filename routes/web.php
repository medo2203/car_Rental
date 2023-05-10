<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminOrdersController;
use App\Http\Controllers\ValidateController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/User/{userId}/order', [OrderController::class, 'showUserOrders'])->name('User.order');

// Route::put('/profile', 'UserController@update')->name('profile.update');
// Route::put('/users/{id}', [DriverDetailsController::class, 'updateUser'])->name('Driver.update');


Route::resource('User', UserController::class);
Route::resource('Cars', CarsController::class);
Route::resource('Orders', OrdersController::class);
// Route::post('')
Route::resource('Dashboard', AdminOrdersController::class);
Route::get('/validate/{id}' ,[ ValidateController::class,"validateOrder"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
