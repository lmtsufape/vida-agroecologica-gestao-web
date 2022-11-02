<?php

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

Route::post('login', [App\Http\Controllers\Auth\Api\LoginController::class, 'login']);
Route::post('cadastro', [App\Http\Controllers\Auth\Api\UserController::class, 'store']);
Route::post('atualizar/usuario', [App\Http\Controllers\Auth\Api\UserController::class, 'update']);
Route::get('users', [\App\Http\Controllers\Auth\Api\UserController::class, 'index']);

Route::post('cadastrar/associacao', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'store']);
Route::post('atualizar/associacao', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'update']);
Route::get('associacoes', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'index']);

