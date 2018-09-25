<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'api'], function () {
    Route::middleware('api')->group(function () {

    });

    Route::middleware('auth:api')->group(function () {

    });
});
