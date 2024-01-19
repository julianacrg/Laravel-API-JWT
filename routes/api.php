<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::get(
    '/',
    function () {
        return response()->json(
            [
                'version' => app()->version(),
            ]
        );
    }
);

Route::group(
    [
        'prefix' => 'auth'
    ], 
    function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('refresh', [AuthController::class, 'refresh']);
        Route::get('me', [AuthController::class, 'me']);
    }
);

Route::group(
    [
        'middleware' => 'auth:api',
        'prefix' => 'user'
    ], 
    function () {
        Route::patch('profile', [UserController::class, 'profile']);
    }
);