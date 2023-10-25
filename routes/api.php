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

Route::prefix('auth')->group(function(){
// Autenticação
    Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login'])->name('auth.mobile.login');
    Route::post('register', [App\Http\Controllers\Api\LoginController::class, 'register'])->name('auth.mobile.register');
    Route::middleware('auth:sanctum')->post('logout', [App\Http\Controllers\Api\LoginController::class, 'logout'])->name('auth.mobile.logout');


// Serviços
    Route::middleware('auth:sanctum')->get('categoria/servicos', [App\Http\Controllers\Api\ServicosController::class, 'categoria'])->name('auth.mobile.servicos.categoria');
    Route::middleware('auth:sanctum')->get('servicos', [App\Http\Controllers\Api\ServicosController::class, 'index'])->name('auth.mobile.servicos');
    Route::middleware('auth:sanctum')->get('servicos/{id}', [App\Http\Controllers\Api\ServicosController::class, 'show'])->name('auth.mobile.servicos.show');

    // Pedidos
    Route::middleware('auth:sanctum')->get('pedidos/{user}', [App\Http\Controllers\Api\PedidosController::class, 'index'])->name('auth.mobile.pedidos.index');
    Route::middleware('auth:sanctum')->post('pedidos/store/{user}', [App\Http\Controllers\Api\PedidosController::class, 'store'])->name('auth.mobile.pedidos.store');
    Route::middleware('auth:sanctum')->post('pedidos/finalizar/{pedido}', [App\Http\Controllers\Api\PedidosController::class, 'end'])->name('auth.mobile.pedidos.finalizar');

    Route::middleware('auth:sanctum')->get('meuspedidos/{id_pedido}', [App\Http\Controllers\Api\PedidosController::class, 'show'])->name('auth.mobile.meus.pedidos.index');
    Route::middleware('auth:sanctum')->get('aceitar_prestador/{id_pedido}/{id_prestador}', [App\Http\Controllers\Api\PedidosController::class, 'close'])->name('auth.mobile.meus.pedidos.close');
   

    Route::middleware('auth:sanctum')->get('perfil/{user}', [App\Http\Controllers\Api\PerfilController::class, 'index'])->name('auth.mobile.perfil.index');
    Route::middleware('auth:sanctum')->post('perfil/atualizar/dados_pessoais/{id_user}', [App\Http\Controllers\Api\PerfilController::class, 'update'])->name('auth.mobile.perfil.update');
    Route::middleware('auth:sanctum')->post('perfil/atualizar/credencias/{id_user}', [App\Http\Controllers\Api\PerfilController::class, 'senha'])->name('auth.mobile.perfil.senha');


    Route::middleware('auth:sanctum')->get('prestador/detalhes/{id}', [App\Http\Controllers\Api\PerfilController::class, 'prestador'])->name('auth.mobile.prestador.index');

});

