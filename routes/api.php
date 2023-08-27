<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesatransactionController;
use App\Http\Controllers\Order_Controller;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    // pay with mpesa
Route::group(['prefix' => 'c2b', 'as' => 'c2b.'], function () {
    Route::post('confirm', [MpesaPayment_Controller::class,'confirmTrsction'])->name('confirm');
    Route::post('validate', [MpesaPayment_Controller::class,'validateTrsction'])->name('validate');
}); 

    // pay with stripe
Route::post('/stripe/postpay_ment', [Order_Controller::class,'stripepayment'])->name('stripe-payment');

