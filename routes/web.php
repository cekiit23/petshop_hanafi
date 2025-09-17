<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembelianPakanController;

Route::resource('pakan', PakanController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('pembelian_pakans', PembelianPakanController::class);

Route::get('/', function () {
    return view('welcome');
});
