<?php

use App\Http\Controllers\Frontend\HomeController;
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

// for reset cache in production
Route::get('/53Cfwnl2vR', function () {
    Artisan::call('optimize:clear');
    return "Cleared!";
});

// // 404 Page Handling
Route::fallback(function () {
    return view('dashboard.layout.404');
});
