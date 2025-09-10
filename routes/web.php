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
Route::post('/label/find', [QRLoginController::class, 'findLabel'])->name('label.find');
Route::post('/logout', [QRLoginController::class, 'logout'])->name('logout');
Route::post('/reset-session', [QRLoginController::class, 'resetSession'])->name('reset.session');
Route::post('/update-qc-pass', [QRLoginController::class, 'updateQcPass'])->name('update.qc.pass');
Route::post('/update-shift', [QRLoginController::class, 'updateShift'])->name('update.shift');
Route::post('/print-label', [QRLoginController::class, 'printLabel'])->name('print.label');
Route::get('/', [QRLoginController::class, 'index'])->name('index');
Route::get('/print', [QRLoginController::class, 'printIndex'])->name('print');
Route::get('/auto-print', function (Illuminate\Http\Request $request) {
    // $pdfUrl = $request->query('file');
    $pdfUrl = urldecode($request->query('file'));

    return view('pages.auto-print', compact('pdfUrl'));
})->name('auto.print');
Route::get('/api/get-certificate', function () {
    return response()->file(storage_path('app/qz/digital-certificate.txt'), [
        'Content-Type' => 'text/plain'
    ]);
});

Route::post('/api/sign-message', function (Request $request) {
    $message = $request->input('request');
    $privateKey = file_get_contents(storage_path('app/qz/private-key.pem'));
    openssl_sign($message, $signature, $privateKey, OPENSSL_ALGO_SHA512);
    return base64_encode($signature);
});

// Route::get('/show-print-label', [QRLoginController::class, 'showPrintLabel'])->name('show.print.label');