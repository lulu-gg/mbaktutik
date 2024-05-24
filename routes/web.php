<?php

use App\Http\Controllers\Frontend\AuthController;
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

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register/event-organizer', [AuthController::class, 'registerEventOrganizer']);
Route::post('/register/event-organizer/submit', [AuthController::class, 'registerEventOrganizerSubmit']);
Route::get('/register/event-organizer/thankyou', [AuthController::class, 'registerEventOrganizerComplete']);

// Route::get('/register', [HomeController::class, 'register']);
// Route::get('/reset-password', [HomeController::class, 'resetPassword']);

Route::get('/events', [EventsController::class, 'index']);
Route::get('/events/detail/{event}', [EventsController::class, 'show']);
Route::get('/events/detail/{event}/purchase', [EventsController::class, 'purchase']);
Route::post('/events/detail/{event}/purchase/checkout', [EventsController::class, 'checkout']);
Route::post('/events/detail/{event}/purchase/checkout/proceed', [EventsController::class, 'proceedCheckout']);
Route::get('/events/payment/{midtrans_order_id}', [EventsController::class, 'payment']);

Route::get('/ticket/{qrCode}', [TicketController::class, 'show']);
Route::get('/ticket/scan/{qrCode}', [TicketController::class, 'scan']);
Route::post('/ticket/scan/{qrCode}/update', [TicketController::class, 'update']);

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

// //
// Route::fallback(function () {
//     return view('frontend.layout.404');
// });

Route::fallback(function () {
    if (request()->is('dashboard/*')) {
        return response()->view('admin.layout.404', [], 404);
    } else {
        return response()->view('frontend.layout.404', [], 404);
    }
});

// for reset cache in production
Route::get('/53Cfwnl2vR', function () {
    Artisan::call('optimize:clear');
    return "Cleared!";
});
