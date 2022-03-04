<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientChangePasswordController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientSocialController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\PaymentMethodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Authentaction Routes
Route::prefix('auth')->group(function () {
    Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

// Admin Dashboard
Route::prefix('/admin')->middleware('auth:admin')->group(function () {

    // -- Begin Clients Routes --
    // Resource
    Route::resource('client', ClientController::class);
    // Change Password
    Route::get('/client/{id}/change-password', [ClientChangePasswordController::class, 'showChangePassword'])->name('client.change-password');
    Route::post('/client/change-password', [ClientChangePasswordController::class, 'changePassword']);
    // Social Media
    Route::resource('client-social', ClientSocialController::class);
    // -- End Clients Routes --

    // -- Begin Admin Routes --
    // Resource
    Route::resource('cpanel', AdminController::class);
    // -- End Clients Routes --

    // -- Begin Contract Type Routes --
    // Resource
    Route::resource('contract-type', ContractTypeController::class);
    // -- End Contract Type Routes --

    // -- Begin Contract Routes --
    // Resource
    Route::resource('contract', ContractController::class);
    // -- End Contract Routes --

    // -- Begin Payment Method Routes --
    // Resource
    Route::resource('payment-method', PaymentMethodController::class);
    // -- End Payment Method Routes --

    // Dashboard Route
    Route::get('/', function () {
        return view('ecommerce.index');
    })->name('home');

    // Logout Route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return view('ecommerce.page-not-found');
});
