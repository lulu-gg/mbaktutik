<?php

use App\Helpers\RoleHelpers;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EventScannerJobController;
use App\Http\Controllers\Admin\EventsCategoryController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\GeneralParameterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrganizerRegistrationController;
use App\Http\Controllers\Admin\ScannerOfficerController;
use App\Http\Controllers\Admin\SponsorsController;
use App\Http\Controllers\Admin\TicketReportController;
use App\Http\Controllers\Admin\TicketVariationsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TransactionReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawlController;
use App\Http\Middleware\Admin\AdminPermission;
use App\Http\Middleware\Admin\RestrictedOrganizerPermission;
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

    // Events
    Route::resource('/events', EventsController::class);

    // Events Category
    Route::resource('/events-category', EventsCategoryController::class);

    // Sponsors
    Route::resource('/sponsors', SponsorsController::class)->middleware(AdminPermission::class);

    // Scanner Officer
    Route::resource('/scanner-officer', ScannerOfficerController::class);

    // Withdrawl
    Route::prefix('/withdrawl/{withdrawl}/')->group(function () {
        Route::post('/accept', [WithdrawlController::class, 'accept']);
        Route::post('/reject', [WithdrawlController::class, 'reject']);
    });

    Route::resource('/withdrawl', WithdrawlController::class)->except(['edit', 'update']);

    // Transaction Report
    Route::prefix('/transaction-report')->group(function () {
        Route::get('/', [TransactionReportController::class, 'index']);
        Route::get('/{order}', [TransactionReportController::class, 'show']);
    });

    // Ticket Report
    Route::prefix('/ticket-report')->group(function () {
        Route::get('/', [TicketReportController::class, 'index']);
    });

    // Event Oragnizer Request
    Route::prefix('/organizer-registration')->group(function () {
        Route::get('/', [OrganizerRegistrationController::class, 'index']);
        Route::get('/{organizer}', [OrganizerRegistrationController::class, 'show']);
        Route::post('/{organizer}/accept', [OrganizerRegistrationController::class, 'accept']);
    })->middleware(AdminPermission::class);

    // General Parameter
    Route::prefix('/general-parameter')->group(function () {
        Route::get('/', [GeneralParameterController::class, 'index']);
        Route::post('/', [GeneralParameterController::class, 'update']);
    })->middleware(AdminPermission::class);

    // User
    Route::resource('/user', UserController::class)->except(['edit', 'update'])->middleware(AdminPermission::class);

    // Auth Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

// // 404 Page Handling
Route::fallback(function () {
    return view('admin.layout.404');
});
