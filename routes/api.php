<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\Api\UserController as UserController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [\App\Http\Controllers\Auth\Api\LoginController::class, 'logout']);
});

Route::middleware(['auth:sanctum', 'type.admin'])->group(function () {
    // Usuario
    Route::post('cadastro', [UserController::class, 'store']);
    Route::post('atualizar/usuario', [UserController::class, 'update']);
    Route::get('users', [UserController::class, 'index']);

    // Associacao
    Route::get('associacoes', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'type.admin.presidente'])->group(function () {
    //Associacao
    Route::post('cadastrar/associacao', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'store']);
    Route::post('atualizar/associacao', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'update']);

    // OCS
    Route::post('/organizacaoControleSocial/store', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class, 'store']);
    Route::post('/organizacaoControleSocial/update', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class, 'update']);
    Route::get('/associacao/{associacao_id}/organizacaoControleSocial', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class, 'index']);

});

Route::middleware(['auth:sanctum', 'type.presidente'])->group(function () {
    //minhas associações
});

Route::middleware(['auth:sanctum', 'type.agricultor'])->group(function () {

    // Propriedade
    Route::post('/propriedade/store', [App\Http\Controllers\Api\PropriedadeController::class, 'store']);
    Route::post('/propriedade/update', [App\Http\Controllers\Api\PropriedadeController::class, 'update']);
    Route::get('/usuario/{user_id}/propriedades', [App\Http\Controllers\Api\PropriedadeController::class, 'index']);
});

Route::post('/verifica', [UserController::class, 'verificaUsuario']);
