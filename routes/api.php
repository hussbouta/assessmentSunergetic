<?php

use Illuminate\Support\Facades\Route;

Route::group([ 'prefix' => 'v1'], function () {

    //Customers
    Route::apiResource('customers', 'API\CustomerController');
});
