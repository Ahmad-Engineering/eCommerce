<?php

use App\Http\Controllers\ClientChangePasswordController;
use App\Http\Controllers\ClientController;
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

// Dashboard Route
Route::get('/', function () {
    return view('ecommerce.index');
});

Route::prefix('/admin')->group(function () {

    // -- Begin Clients Routes --
    // Resource
    Route::resource('client', ClientController::class);
    // Change Password
    Route::get('/client/{id}/change-password', [ClientChangePasswordController::class, 'showChangePassword'])->name('client.change-password');
    Route::post('/client/change-password', [ClientChangePasswordController::class, 'changePassword']);
    // -- End Clients Routes --

});
