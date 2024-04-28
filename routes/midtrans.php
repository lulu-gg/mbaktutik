<?php

use App\Http\Controllers\Midtrans\MidtransController;
use App\Models\OrderInvoice;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('ping', function () {
    return response('ok');
});

Route::post('notification', [MidtransController::class, 'notification']);

// 404 Page Handling
Route::fallback(function () {
    return redirect('/');
});
