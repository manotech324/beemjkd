<?php

use Illuminate\Support\Facades\Route;
use Modules\Area\Http\Controllers\AreaController;
use Modules\Area\Http\Controllers\RegionController;
use App\Http\Middleware\JwtMiddleware;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('area', AreaController::class)->names('area');
});

Route::middleware([JwtMiddleware::class])->group(function () {

    Route::apiResource('region', RegionController::class)->names('area');
});
