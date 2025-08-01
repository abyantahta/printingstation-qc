<?php

use App\Http\Controllers\QRLoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.landing');
// });
// Route::get('/print', function () {
//     return view('pages.print');
// });
Route::post('/login/store', [QRLoginController::class, 'store'])->name('login.store');
Route::post('/logout', [QRLoginController::class, 'logout'])->name('logout');
Route::get('/', [QRLoginController::class, 'index'])->name('index');
Route::get('/print', [QRLoginController::class, 'printIndex'])->name('print');