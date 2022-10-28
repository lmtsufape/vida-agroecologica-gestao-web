<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/usuarios', [App\Http\Controllers\AdminController::class, 'usuarios_index'])->name('usuarios.index');
Route::get('/associacoes', [App\Http\Controllers\AdminController::class, 'associacoes_index'])->name('associacoes.index');
Route::get('/associacao/{associacao_id}/organizacaoControleSocial', [App\Http\Controllers\OrganizacaoControleSocialController::class, 'index'])->name('ocs.index');

Route::post('/associacao/store', [App\Http\Controllers\AssociacaoController::class, 'store'])->name('associacao.store');
Route::post('/associacao/update', [App\Http\Controllers\AssociacaoController::class, 'update'])->name('associacao.update');

Route::post('/usuario/store', [App\Http\Controllers\UserController::class, 'store'])->name('usuario.store');
Route::post('/usuario/update', [App\Http\Controllers\UserController::class, 'update'])->name('usuario.update');

