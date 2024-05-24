<?php

use App\Http\Controllers\API\NewTelegramBotApiController;
use App\Http\Controllers\Api\TelegramBotApiController;
use App\Http\Controllers\API\TelegramBotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('get-me',[TelegramBotController::class,'getMe']);
Route::post('get-chat-info',[TelegramBotController::class,'getChatInfo']);
// Route::get('webhook',[TelegramBotController::class,'webhook'])

// Route::get('get-updates',[TelegramBotApiController::class,'getUpdates']);
Route::get('get-updates',[NewTelegramBotApiController::class,'getUpdates']);
// ===========
