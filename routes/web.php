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
Route::post('/associacoes/create', [App\Http\Controllers\AssociacaoController::class, 'create'])->name('associacao.create');
Route::post('/associacoes/editar/{id}', [App\Http\Controllers\AssociacaoController::class, 'edit'])->name('associacao.edit');

Route::post('/usuario/store', [App\Http\Controllers\AdminController::class, 'usuario_store'])->name('usuario.store');
