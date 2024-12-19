<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\AllCurrencyController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProductionPlanController;
use Illuminate\Support\Facades\Log;

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

Route::resource('products', ProductController::class);

Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');

Route::get('/gantt-data', [ProductionController::class, 'getGanttData']);
Route::get('/calculate-eta/{id}', [ProductionController::class, 'calculateETA']);Route::group(['middleware' => 'auth'], function () {
    Route::resource('productions', ProductionController::class);
    Route::resource('production-plans', ProductionPlanController::class);
});

Route::get('/currencies/sgd-rates', [CurrencyController::class, 'getSGDRates'])->name('sgd-rates');
Route::get('/currencies/all', [AllCurrencyController::class, 'showAllCurrencies'])->name('all-currencies');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('productions', ProductionController::class);
    Route::resource('production-plans', ProductionPlanController::class);
});

Route::group(['prefix' => 'currencies'], function () {
    Route::get('/sgd-rates', [CurrencyController::class, 'getSGDRates'])->name('sgd-rates');
    Route::get('/all', [AllCurrencyController::class, 'showAllCurrencies'])->name('all-currencies');
});

Route::group(['prefix' => 'slides'], function () {
    Route::resource('/', SRoute::group(['middleware' => 'auth'], function () {
    Route::resource('productions', ProductionController::class);
    Route::resource('production-plans', ProductionPlanController::class);
});

Route::get('/currencies/sgd-rates', [CurrencyController::class, 'getSGDRates'])->name('sgd-rates');
Route::get('/currencies/all', [AllCurrencyController::class, 'showAllCurrencies'])->name('all-currencies');

Route::get('/', function () {Route::grouRoute::group(['middleware' => 'auth'], function () {
    Route::resource('productions', ProductionController::class);
    Route::resource('production-plans', ProductionPlanController::class);
});

Route::get('/currencies/sgd-rates', [CurrencyController::class, 'getSGDRates'])->name('sgd-rates');
Route::get('/currencies/all', [AllCurrencyController::class, 'showAllCurrencies'])->name('all-currencies');

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

Route::resource('products', ProductController::class);

Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');

Route::get('/gantt-data', [ProductionController::class, 'getGanttData']);
Route::get('/calculate-eta/{id}', [ProductionController::class, 'calculateETA']);
Route::get('/gantt-data', [ProductionController::class, 'getGanttData']);
Route::get('/calculate-eta/{id}', [ProductionController::class, 'calculateETA']);
Route::get('/calculate-eta/{id}', [ProductionController::class, 'calculateETA']); Route::get('/calculate-eta/{id}', [ProductionController::class, 'calculateETA']);
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

Route::resource('products', ProductController::class);

Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');

Route::get('/gantt-data', [ProductionController::class, 'getGanttData'])->name('gantt-data');
Route::get('/calculate-eta/{id}', [ProductionController::class, 'calculateETA'])->name('calculate-eta');
Route::get('/calculate-eta/{id}', [ProductionController::class, 'calculateETA'])->name('calculate-eta');

// ...

Route::get('/currencies/sgd-rates', [CurrencyController::class, 'getSGDRates'])->name('sgd-rates');
Log::info('SGD rates retrieved');

Route::get('/currencies/all', [AllCurrencyController::class, 'showAllCurrencies'])->name('all-currencies');
Log::info('All currencies retrieved');

Route::get('/', function () {
    Log::info('Welcome page loaded');
    return view('welcome');
});

Route::get('/image-upload', [ImageUploadController::class, 'index'])->name('image-upload');
Log::info('Image upload page loaded');

Route::post('/image-upload', [ImageUploadController::class, 'upload']);
Log::info('Image uploaded');

Route::resource('slides', SlideController::class)->names([
    'index' => 'slides.index',
    'create' => 'slides.create',
    'store' => 'slides.store',
    'show' => 'slides.show',
    'edit' => 'slides.edit',
    'update' => 'slides.update',
    'destroy' => 'slides.destroy',
]);
Log::info('Slides resource loaded');

Route::resource('products', ProductController::class);
Log::info('Products resource loaded');

Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');
Log::info('Products bulk deleted');

Route::get('/gantt-data', [ProductionController::class, 'getGanttData'])->name('gantt-data');

Route::get('/calculate-eta/{id}', [ProductionController::class, 'calculateETA'])->name('calculate-eta');
