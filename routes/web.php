<?php

use App\Http\Controllers\AdminAccountSettingsController;
use App\Http\Controllers\AdminActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminInfoController;
use App\Http\Controllers\AdminSocialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClientChangePasswordController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\ClientSocialController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Barryvdh\DomPDF\Facade\Pdf;
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
Route::prefix('auth')->middleware('guest:admin')->group(function () {
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
    // View Blocked Client
    Route::get('blocked-clients', [ClientController::class, 'blockedClient'])->name('blocked.client');
    // Un-Block Client
    Route::put('unblock-client/{id}/client', [ClientController::class, 'unblockClient']);
    // Block Client
    Route::put('block-client/{id}/client', [ClientController::class, 'blockClient'])->name('block.client');
    // Client Informations
    Route::resource('client-info', ClientInfoController::class);
    // -- End Clients Routes --

    // -- Begin Admin Routes --
    // Resource
    Route::resource('cpanel', AdminController::class);
    // Admin Account Settings
    Route::prefix('admin-settings')->group(function () {
        // Show Admin Account Settings
        Route::get('/', [AdminAccountSettingsController::class, 'showAdminAccountSettings'])->name('show.admin.account.settings');
        // Admin General Information
        Route::resource('admin-info', AdminInfoController::class);
        // Admin Social Media Links
        Route::resource('admin-social', AdminSocialController::class);
        // Admin Activities
        Route::resource('admin-activities', AdminActivityController::class);
        // Change Admin Password
        Route::get('change-password', [AdminAccountSettingsController::class, 'showChangePassword'])->name('change.admin.password');
        Route::put('change-password', [AdminAccountSettingsController::class, 'changePassword']);
    });
    // -- End Clients Routes --

    // -- Begin Contract Type Routes --
    // Resource
    Route::resource('contract-type', ContractTypeController::class);
    // -- End Contract Type Routes --

    // -- Begin Product Routes --
    // Resource
    Route::resource('product', ProductController::class);
    // -- End Product Routes --

    // -- Begin PDF Routes --
    // Download Contract
    Route::get('admin-client-contract/{id}/client', [PDFController::class, 'downloadContractAsPDF'])->name('admin.client.contract.as.pdf');
    // Download Admin Clients
    Route::get('client-pdf', [PDFController::class, 'adminCLientsAsPDF'])->name('admin.clients.as.pdf');
    // Download Stores PDF
    Route::get('stores-pdf', [PDFController::class, 'adminStoresAsPDF'])->name('admin.stores.as.pdf');
    // Download Products PDF
    Route::get('products-pdf', [PDFController::class, 'adminProductsAsPDF'])->name('admin.products.as.pdf');
    // -- End PDF Routes --

    // -- Begin Contract Routes --
    // Resource
    Route::resource('contract', ContractController::class);
    // -- End Contract Routes --

    // -- Begin Branch Routes --
    // Resource
    Route::resource('branch', BranchController::class);
    // -- End Branch Routes --

    // -- Begin Store Routes --
    // Resource
    Route::resource('store', StoreController::class);
    // -- End Store Routes --

    // -- Begin Payment Method Routes --
    // Resource
    Route::resource('payment-method', PaymentMethodController::class);
    // -- End Payment Method Routes --

    // Dashboard Route
    Route::get('/', function () {
        return view('ecommerce.index');
    })->name('home');

    Route::prefix('market')->group(function () {
        Route::get('/', [MarketController::class, 'showMarket'])->name('show.market');
    });

    // Logout Route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return view('ecommerce.page-not-found');
});

// Test Route
Route::get('test', function () {
    return view('ecommerce.contract.form-date-time-picker');
});
