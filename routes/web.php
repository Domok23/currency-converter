<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\AllCurrencyController;

Route::get('/currencies/sgd-rates', [CurrencyController::class, 'getSGDRates'])->name('sgd-rates');
Route::get('/currencies/all', [AllCurrencyController::class, 'showAllCurrencies'])->name('all-currencies');

Route::get('/', function () {
    return view('welcome');
});
