<?php

use App\Models\Guarantee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InvoicePdfController;
use App\Http\Controllers\GuaranteePdfController;
use App\Http\Controllers\LoadingOrderPdfController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['web']
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

    Route::get('/invoice/{id}/pdf', [InvoicePdfController::class, 'download']) ->name('invoice.pdf');
    Route::get('/guarantee/{id}/pdf', [GuaranteePdfController::class, 'download']) ->name('guarantee.pdf');
    Route::get('/loadingorder/{id}/pdf', [LoadingOrderPdfController::class, 'download']) ->name('loadingorder.pdf');

    Route::get('/truck/locations/latest', function () {
    return \App\Models\Truck::with('latestLocation')->get();
    })->name('truck.locations.latest');

});