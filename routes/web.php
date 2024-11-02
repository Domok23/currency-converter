<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\AllCurrencyController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\SlideController;

Route::get('/currencies/sgd-rates', [CurrencyController::class, 'getSGDRates'])->name('sgd-rates');
Route::get('/currencies/all', [AllCurrencyController::class, 'showAllCurrencies'])->name('all-currencies');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/image-upload', [ImageUploadController::class, 'index'])->name('image-upload');
Route::post('/image-upload', [ImageUploadController::class, 'upload']);

Route::resource('slides', SlideController::class)->names([
    'index' => 'slides.index',
    'create' => 'slides.create',
    'store' => 'slides.store',
    'show' => 'slides.show',
    'edit' => 'slides.edit',
    'update' => 'slides.update',
    'destroy' => 'slides.destroy',
]);