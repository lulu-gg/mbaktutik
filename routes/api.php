<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Rive API',
        'version' => env('API_VERSION', 1),
        'maintenance' => env('API_MAINTENANCE', false),
    ]);
});

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('api.auth')->group(function () {
    // 
});


Route::fallback(function () {
    return response()->json("Not Found", 404);
});
