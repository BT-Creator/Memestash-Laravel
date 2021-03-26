<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class, 'index']);
    Route::get('/{ouid}', [UserController::class, 'show']);
    Route::put('/', [UserController::class, 'store']);
    Route::patch('/{ouid}', [UserController::class, 'update']);
    Route::get('/{ouid}/cards', [CardController::class, 'show']);
    Route::put('/{ouid}/cards/{cid}', [CardController::class, 'store']);
    Route::put('/{ouid}/wallet', [WalletController::class, 'add']);
    Route::get('/{ouid}/chats', [ChatController::class, 'index']);
    Route::get('/{ouid}/chats/{tuid}', [ChatController::class, 'show']);
    Route::patch('/{ouid}/chats/{tuid}', [ChatController::class, 'update']);
    Route::put('/{ouid}/chats/{tuid}', [ChatController::class, 'store']);
});

Route::prefix('cards') -> group(function (){
    Route::get('/', [CardController::class, 'index']);
});
