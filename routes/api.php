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

Route::prefix('auth')->group(function (){
   Route::post('login', [App\Http\Controllers\Auth\Api\LoginController::class,'login']);
});

// Usuario
Route::post('login', [App\Http\Controllers\Auth\Api\LoginController::class, 'login']);
Route::post('cadastro', [App\Http\Controllers\Auth\Api\UserController::class, 'store']);
Route::post('atualizar/usuario', [App\Http\Controllers\Auth\Api\UserController::class, 'update']);
Route::get('users', [\App\Http\Controllers\Auth\Api\UserController::class, 'index']);

// OCS
Route::post('/organizacaoControleSocial/store', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class,'store']);
Route::post('/organizacaoControleSocial/update', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class,'update']);
Route::get('/associacao/{associacao_id}/organizacaoControleSocial', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class,'index']);

// Proprieadade
Route::post('/propriedade/store', [App\Http\Controllers\Api\PropriedadeController::class,'store']);
Route::post('/propriedade/update', [App\Http\Controllers\Api\PropriedadeController::class,'update']);
Route::get('/usuario/{user_id}/propriedades', [App\Http\Controllers\Api\PropriedadeController::class,'index']);

// Associacao
Route::post('cadastrar/associacao', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'store']);
Route::post('atualizar/associacao', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'update']);
Route::get('associacoes', [\App\Http\Controllers\Auth\Api\AssociacaoController::class, 'index']);
