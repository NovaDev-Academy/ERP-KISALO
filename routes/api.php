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

//Estabelecimentos
    Route::middleware('auth:sanctum')->get('estabelecimentos', [App\Http\Controllers\Api\EstabelecimentoController::class, 'index'])->name('auth.mobile.estabelecimentos');

    Route::middleware('auth:sanctum')->get('estabelecimentos/{id}', [App\Http\Controllers\Api\EstabelecimentoController::class, 'show'])->name('auth.mobile.estabelecimentos.show');


//Tipo Estabelecimentos
    Route::middleware('auth:sanctum')->get('tipo/estabelecimentos', [App\Http\Controllers\Api\TipoEstabelecimentoController::class, 'index'])->name('auth.mobile.tipo.estabelecimentos');
    Route::middleware('auth:sanctum')->get('tipo/estabelecimentos/{id}', [App\Http\Controllers\Api\TipoEstabelecimentoController::class, 'show'])->name('auth.mobile.tipo.estabelecimentos.show');

// Produtos

    Route::middleware('auth:sanctum')->get('produtos', [App\Http\Controllers\Api\ProdutosController::class, 'index'])->name('auth.mobile.produtos');

    Route::middleware('auth:sanctum')->get('produtos/{id}', [App\Http\Controllers\Api\ProdutosController::class, 'show'])->name('auth.mobile.produtos.show');

// Serviços

    Route::middleware('auth:sanctum')->get('servicos', [App\Http\Controllers\Api\ServicosController::class, 'index'])->name('auth.mobile.servicos');
    Route::middleware('auth:sanctum')->get('servicos/{id}', [App\Http\Controllers\Api\ServicosController::class, 'show'])->name('auth.mobile.servicos.show');


// Serviços

    Route::middleware('auth:sanctum')->get('agendamentos', [App\Http\Controllers\Api\AgendamentoController::class, 'index'])->name('auth.mobile.agendamentos');
    Route::middleware('auth:sanctum')->get('agendamentos/{id}', [App\Http\Controllers\Api\AgendamentoController::class, 'show'])->name('auth.mobile.agendamentos.show');
 

});

