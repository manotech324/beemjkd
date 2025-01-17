<?php

use Illuminate\Support\Facades\Route;
use Modules\Employee\Http\Controllers\EmployeeController;
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


// Route::middleware([JwtMiddleware::class])->group(function () {
Route::apiResource('employee', EmployeeController::class)->names('employee');
// });