<?php

use App\Http\Controllers\BusStopController;
use App\Http\Controllers\RuteController;
use Illuminate\Support\Facades\Route;

Route::resource('/bus-stop', BusStopController::class);
Route::resource('/rute', RuteController::class);

Route::get('/', function () {
    return view('main');
})->name('main');
