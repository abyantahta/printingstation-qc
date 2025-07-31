<?php

use App\Http\Controllers\QRLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
});
Route::get('/print', function () {
    return view('pages.print');
});
Route::post('/login/store', [QRLoginController::class, 'store'])->name('login.store');