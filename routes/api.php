<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::post('login', [AuthController::class, 'authenticate'])
    ->name('authenticate');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('privateInformations', function () {
        return response()->json([
            'information' => 'Hello World!'
        ]);
    });
    
    Route::get('getRole', function () {
        return response()->json([
            'role' => auth()->user()->is_admin
        ]);
    });
});

