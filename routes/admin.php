<?php

use App\Helpers\RoleHelpers;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\EventScannerJobController;
use App\Http\Controllers\Admin\EventsCategoryController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\GeneralParameterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrganizerRegistrationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ScannerOfficerController;
use App\Http\Controllers\Admin\SponsorsController;
use App\Http\Controllers\Admin\TenantRegistrationController;
use App\Http\Controllers\Admin\TicketReportController;
use App\Http\Controllers\Admin\TicketVariationsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TransactionReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawlController;
use App\Http\Middleware\Admin\AdminPermission;
use App\Http\Middleware\Admin\OrganizerPermission;
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
            Route::get('/create', [TicketVariationsController::class, 'create'])->middleware(OrganizerPermission::class);;
            Route::post('/', [TicketVariationsController::class, 'store'])->middleware(OrganizerPermission::class);;

            Route::get('/{ticket}/edit', [TicketVariationsController::class, 'edit'])->middleware(OrganizerPermission::class);;
            Route::patch('/{ticket}', [TicketVariationsController::class, 'update'])->middleware(OrganizerPermission::class);;

            Route::delete('/{ticket}', [TicketVariationsController::class, 'destroy'])->middleware(OrganizerPermission::class);;
        });

        Route::prefix('scanner')->group(function () {
            Route::get('/create', [EventScannerJobController::class, 'create'])->middleware(OrganizerPermission::class);;
            Route::post('/', [EventScannerJobController::class, 'store'])->middleware(OrganizerPermission::class);;

            Route::delete('/{scanner}', [EventScannerJobController::class, 'destroy'])->middleware(OrganizerPermission::class);;
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

    // Contact Us
    Route::get('/contact-us', [ContactUsController::class, 'index'])->middleware(AdminPermission::class);

    // Withdrawl
    Route::prefix('/withdrawl/{withdrawl}/')->group(function () {
        Route::post('/accept', [WithdrawlController::class, 'accept']);
        Route::post('/reject', [WithdrawlController::class, 'reject']);
    });

    Route::resource('/withdrawl', WithdrawlController::class)->except(['edit', 'update']);

    // Transaction Report
    Route::prefix('/transaction-report')->group(function () {
        Route::get('/', [TransactionReportController::class, 'index']);
        Route::get('/pdf', [TransactionReportController::class, 'pdf']);
        Route::get('/{order}', [TransactionReportController::class, 'show']);
        Route::get('/{order}/invoice', [TransactionReportController::class, 'invoice']);
    });

    // Ticket Report
    Route::prefix('/ticket-report')->group(function () {
        Route::get('/', [TicketReportController::class, 'index']);
        Route::get('/pdf', [TicketReportController::class, 'pdf']);
    });

    // Event Oragnizer Request
    Route::prefix('/organizer-registration')->group(function () {
        Route::get('/', [OrganizerRegistrationController::class, 'index']);
        Route::get('/{organizer}', [OrganizerRegistrationController::class, 'show']);
        Route::post('/{organizer}/accept', [OrganizerRegistrationController::class, 'accept']);
    })->middleware(AdminPermission::class);

    // Event Oragnizer Request
    Route::prefix('/tenant-registration')->group(function () {
        Route::get('/', [TenantRegistrationController::class, 'index']);
        Route::get('/{tenant}', [TenantRegistrationController::class, 'show']);
        Route::post('/{tenant}/accept', [TenantRegistrationController::class, 'accept']);
    })->middleware(AdminPermission::class);

    // General Parameter
    Route::prefix('/general-parameter')->group(function () {
        Route::get('/', [GeneralParameterController::class, 'index']);
        Route::post('/', [GeneralParameterController::class, 'update']);
    })->middleware(AdminPermission::class);

    // User
    Route::get('/user/organizer', [UserController::class, 'organizer'])->middleware(AdminPermission::class);
    Route::get('/user/scanner-officer', [UserController::class, 'scannerOfficer'])->middleware(AdminPermission::class);
    Route::resource('/user/admin', UserController::class)->except(['edit', 'update'])->middleware(AdminPermission::class);

    // Profile
    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::post('/', [ProfileController::class, 'save']);

        Route::get('/security', [ProfileController::class, 'security']);
        Route::post('/security', [ProfileController::class, 'updateSecurity']);

        Route::get('/organizer', [ProfileController::class, 'organizer']);
        Route::post('/organizer', [ProfileController::class, 'updateorganizer']);
    });

    // Auth Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

// // 404 Page Handling
Route::fallback(function () {
    return view('admin.layout.404');
});
