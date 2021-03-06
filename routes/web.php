<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('vehicles',VehicleController::class);
Route::delete('/vehicle/masDelete',[VehicleController::class,'massDelete'])->name('vehicle.massDelete');
Route::resource('drivers',DriverController::class);
Route::delete('/driver/masDelete',[DriverController::class,'massDelete'])->name('drivers.massDelete');

Route::resource('import', App\Http\Controllers\ImportController::class)->only('index', 'store');
