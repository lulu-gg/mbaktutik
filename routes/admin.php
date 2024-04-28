<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TruckController;
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

    // Truck
    Route::resource('/truck', TruckController::class);

    // User
    Route::resource('/user', UserController::class)->except(['edit', 'update']);

    // Auth Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

// // 404 Page Handling
Route::fallback(function () {
    return view('admin.layout.404');
});
