<?php

use App\Http\Controllers\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::as('api.')->group(function () {

    Route::get('/', function () {
        return response()->json([
            'code' => 200,
            'msg'  => 'Hello World!',
        ]);
    })->name('hello');

    Route::as('exchangeRate.')->prefix('exchangeRate')->group(function () {
        Route::post('/transform', [api\ExchangeRateController::class, 'transform'])->name('transform');
    });

});
