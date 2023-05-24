<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/requests",[RequestController::class, 'getRequests']);
Route::patch("/hod-accept-Request",[RequestController::class, 'hodatRequest']);

// Registration routes
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login routes
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/evaluate', [\App\Http\Controllers\NotationController::class, 'store'])->middleware('auth:sanctum', 'verified');
