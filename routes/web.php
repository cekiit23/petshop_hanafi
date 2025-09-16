<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PakanController;


Route::resource('pakan', PakanController::class);
Route::get('/', function () {
    return view('welcome');
});
