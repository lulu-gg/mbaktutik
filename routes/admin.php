<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EventScannerJobController;
use App\Http\Controllers\Admin\EventsCategoryController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\GeneralParameterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ScannerOfficerController;
use App\Http\Controllers\Admin\SponsorsController;
use App\Http\Controllers\Admin\TicketVariationsController;
use App\Http\Controllers\Admin\UserController;
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

// Auth Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'admin.auth'], function () {

    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Events
    Route::prefix('/events/{event}/')->group(function () {
        Route::prefix('/ticket')->group(function () {
            Route::get('/create', [TicketVariationsController::class, 'create']);
            Route::post('/', [TicketVariationsController::class, 'store']);

            Route::get('/{ticket}/edit', [TicketVariationsController::class, 'edit']);
            Route::patch('/{ticket}', [TicketVariationsController::class, 'update']);

            Route::delete('/{ticket}', [TicketVariationsController::class, 'destroy']);
        });

        Route::prefix('scanner')->group(function () {
            Route::get('/create', [EventScannerJobController::class, 'create']);
            Route::post('/', [EventScannerJobController::class, 'store']);

            Route::delete('/{scanner}', [EventScannerJobController::class, 'destroy']);
        });
    });

    Route::resource('/events', EventsController::class);

    // Events Category
    Route::resource('/events-category', EventsCategoryController::class);

    // Sponsors
    Route::resource('/sponsors', SponsorsController::class);

    // Scanner Officer
    Route::resource('/scanner-officer', ScannerOfficerController::class);

    // General Parameter
    Route::get('/general-parameter', [GeneralParameterController::class, 'index']);
    Route::post('/general-parameter', [GeneralParameterController::class, 'update']);

    // User
    Route::resource('/user', UserController::class)->except(['edit', 'update']);

    // Auth Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

// // 404 Page Handling
Route::fallback(function () {
    return view('admin.layout.404');
});
