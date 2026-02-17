<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\WebhookController;
use App\Http\Controllers\Front\ThingsBoardController;


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
Route::post('webhook', [WebhookController::class, 'index'])->name('webhook_index');
Route::post('thingsboard', [ThingsBoardController::class, 'index'])->name('thingsboard_index');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
