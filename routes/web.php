<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\AmountController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/exchange-rates', [ExchangeRateController::class, 'index'])->name('exchange-rates.index');
    Route::post('/exchange-rates', [ExchangeRateController::class, 'update'])->name('exchange-rates.update');
    Route::post('/exchange-rates/add', [ExchangeRateController::class, 'add'])->name('exchange-rates.add');
    Route::delete('/exchange-rates/delete', [ExchangeRateController::class, 'delete'])->name('exchange-rates.delete');

    Route::get('/amounts', [AmountController::class, 'index'])->name('amounts.index');
    Route::get('/amounts/create', [AmountController::class, 'create'])->name('amounts.create');
    Route::post('/amounts', [AmountController::class, 'store'])->name('amounts.store');
    Route::get('/amounts/{amount}/edit', [AmountController::class, 'edit'])->name('amounts.edit');
    Route::put('/amounts/{amount}', [AmountController::class, 'update'])->name('amounts.update');
    Route::delete('/amounts/{amount}', [AmountController::class, 'destroy'])->name('amounts.destroy');
});

require __DIR__.'/auth.php';
