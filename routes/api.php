<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([ 'prefix' => 'v1'], function () {

    //Customers
    Route::apiResource('customers','API\CustomerController');
});