<?php

use App\Http\Controllers\Frontend\EventsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TicketController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'register']);
Route::get('/reset-password', [HomeController::class, 'resetPassword']);

Route::get('/events', [EventsController::class, 'index']);
Route::get('/events/detail/{event}', [EventsController::class, 'show']);
Route::get('/events/detail/{event}/purchase', [EventsController::class, 'purchase']);
Route::post('/events/detail/{event}/purchase/checkout', [EventsController::class, 'checkout']);
Route::post('/events/detail/{event}/purchase/checkout/proceed', [EventsController::class, 'proceedCheckout']);
Route::get('/events/payment/{midtrans_order_id}', [EventsController::class, 'payment']);

Route::get('/ticket/{qrCode}', [TicketController::class, 'show']);

Route::get('/sponsors', [HomeController::class, 'sponsors']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/account', [HomeController::class, 'account']);
Route::get('/account/settings', [HomeController::class, 'accountSettings']);
Route::get('/account/myevents', [HomeController::class, 'accountMyEvents']);
Route::get('/account/myorder', [HomeController::class, 'accountmyOrder']);
Route::get('/terms-and-conditions', [HomeController::class, 'termsConditions']);
Route::get('/privacy-and-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/biaya', [HomeController::class, 'biaya']);


Route::get('/account/organizer/events/create', [HomeController::class, 'organizerEventsCreate']);
Route::get('/account/organizer/events/edit', [HomeController::class, 'organizerEventsEdit']);
Route::get('/account/organizer/events/detail', [HomeController::class, 'organizerEventsDetail']);
Route::get('/account/organizer/events/index', [HomeController::class, 'organizerEvents']);

Route::get('/organizer-register', [HomeController::class, 'organizerRegister']);


// for reset cache in production
Route::get('/53Cfwnl2vR', function () {
    Artisan::call('optimize:clear');
    return "Cleared!";
});

// // 404 Page Handling
Route::fallback(function () {
    return view('dashboard.layout.404');
});

Route::get('phpmyinfo', function () {
    phpinfo();
})->name('phpmyinfo');
