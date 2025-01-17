<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['api'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Add more API routes here
});
