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

// OCS
Route::post('/organizacaoControleSocial/store', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class,'store']);
Route::post('/organizacaoControleSocial/update', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class,'update']);
Route::get('/associacao/{associacao_id}/organizacaoControleSocial', [App\Http\Controllers\Api\OrganizacaoControleSocialController::class,'index']);

// Proprieadade
Route::post('/propriedade/store', [App\Http\Controllers\Api\PropriedadeController::class,'store']);
Route::post('/propriedade/update', [App\Http\Controllers\Api\PropriedadeController::class,'update']);
Route::get('/usuario/{user_id}/propriedades', [App\Http\Controllers\Api\PropriedadeController::class,'index']);
