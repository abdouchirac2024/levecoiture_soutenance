<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public route for the homepage
Route::get('/', function () {
    $rides = \App\Models\Ride::latest()->get();
    return view('welcome', compact('rides'));
});

// Public route for viewing a ride's details
Route::get('rides/{ride}', [DriverController::class, 'show'])->name('rides.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour l'admin
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('reservations', [AdminController::class, "reservations"])->name('reservations');
    Route::get('users', [AdminController::class, "users"])->name('users');
    Route::get('users/create', [AdminController::class, "createUser"])->name('users.create');
    Route::get('drivers', [AdminController::class, 'drivers'])->name('drivers');
    Route::get('drivers/{id}', [AdminController::class, 'viewDriverDetails'])->name('drivers.details');
    Route::post('drivers/approve/{id}', [AdminController::class, 'approveDriver'])->name('drivers.approve');
    Route::post('drivers/reject/{id}', [AdminController::class, 'rejectDriver'])->name('drivers.reject');
    Route::get('rides', [AdminController::class, 'rides'])->name('rides');

    // Routes pour la gestion des clients
    Route::get('clients', [AdminClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [AdminClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [AdminClientController::class, 'store'])->name('clients.store');
    Route::get('clients/{client}/edit', [AdminClientController::class, 'edit'])->name('clients.edit');
    Route::put('clients/{client}', [AdminClientController::class, 'update'])->name('clients.update');
    Route::delete('clients/{client}', [AdminClientController::class, 'destroy'])->name('clients.destroy');
});

// Routes pour les conducteurs
Route::middleware(['auth', 'driver'])->name('driver.')->prefix('driver')->group(function(){
    Route::get('dashboard', [DriverController::class, 'index'])->name('dashboard');
    Route::get('profile', [DriverController::class, 'profile'])->name('profile');
    Route::put('profile', [DriverController::class, 'updateProfile'])->name('profile.update');
    
    // Routes pour la gestion des annonces
    Route::get('rides/create', [DriverController::class, 'createRide'])->name('rides.create');
    Route::post('rides', [DriverController::class, 'storeRide'])->name('rides.store');
    Route::get('rides/{ride}/edit', [DriverController::class, 'editRide'])->name('rides.edit');
    Route::put('rides/{ride}', [DriverController::class, 'updateRide'])->name('rides.update');
    Route::delete('rides/{ride}', [DriverController::class, 'deleteRide'])->name('rides.delete');
});

// Routes pour les clients
Route::middleware(['auth', 'customer'])->name('customer.')->prefix('customer')->group(function(){
    Route::get('dashboard', [CustomerController::class, 'index'])->name('dashboard');
});

// Routes pour la gestion des profils
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (inscription, connexion, etc.)
require __DIR__.'/auth.php';
