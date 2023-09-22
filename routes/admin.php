<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|administrador
*/
// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');Auth::routes();
route::middleware('admin','auth')->get('/', ['as' => 'admin.home.index', 'uses' => 'App\Http\Controllers\Admin\HomeController@index']);

Route::middleware('admin','auth')->namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function () {
    
    // Crud Utilizador
Route::middleware('administrador')->get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
Route::middleware('administrador')->post('/user_store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
Route::middleware('administrador')->post('/user_update{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
Route::middleware('administrador')->get('/user_delete{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
Route::middleware('administrador')->get('/user_list', [App\Http\Controllers\Admin\UserController::class, 'list'])->name('admin.user.list');
Route::middleware('administrador')->get('/user_form', [App\Http\Controllers\Admin\UserController::class, 'form'])->name('admin.user.indexf');

// Prestador Individual
Route::middleware('administrador')->get('/user/prestadores/individual', [App\Http\Controllers\Admin\PrestadorController::class, 'individual'])->name('admin.individual.index');

// Prestador Empresa
Route::middleware('administrador')->get('/user/prestadores/empresa', [App\Http\Controllers\Admin\PrestadorController::class, 'empresa'])->name('admin.prestador.empresa.index');

// Activar
Route::middleware('administrador')->get('/user/prestador/activar/{id}', [App\Http\Controllers\Admin\PrestadorController::class, 'activar'])->name('admin.prestador.activar');
Route::middleware('administrador')->get('/user/prestador/desativar/{id}', [App\Http\Controllers\Admin\PrestadorController::class, 'desativar'])->name('admin.prestador.desativar');

// Crud Categoria
Route::middleware('administrador')->get('/categoria', [App\Http\Controllers\Admin\CategoriaController::class, 'index'])->name('admin.categoria.index');
Route::middleware('administrador')->post('/categoria_store', [App\Http\Controllers\Admin\CategoriaController::class, 'store'])->name('admin.categoria.store');
Route::middleware('administrador')->post('/categoria_update{id}', [App\Http\Controllers\Admin\CategoriaController::class, 'update'])->name('admin.categoria.update');
Route::middleware('administrador')->get('/categoria_delete{id}', [App\Http\Controllers\Admin\CategoriaController::class, 'delete'])->name('admin.categoria.delete');
Route::middleware('administrador')->get('/categoria_list', [App\Http\Controllers\Admin\CategoriaController::class, 'list'])->name('admin.categoria.list');


// Crud Subs Categoria
Route::middleware('administrador')->get('/genero', [App\Http\Controllers\Admin\SubCategoriaController::class, 'index'])->name('admin.sub_categoria.index');
Route::middleware('administrador')->post('/genero_store', [App\Http\Controllers\Admin\SubCategoriaController::class, 'store'])->name('admin.sub_categoria.store');
Route::middleware('administrador')->post('/genero_update/{id}', [App\Http\Controllers\Admin\SubCategoriaController::class, 'update'])->name('admin.sub_categoria.update');
Route::middleware('administrador')->get('/genero_delete/{id}', [App\Http\Controllers\Admin\SubCategoriaController::class, 'delete'])->name('admin.sub_categoria.delete');
Route::middleware('administrador')->get('/genero_list', [App\Http\Controllers\Admin\SubCategoriaController::class, 'list'])->name('admin.sub_categoria.list');



// Crud Armazem
Route::middleware('administrador')->get('/armazem', [App\Http\Controllers\Admin\ArmazemController::class, 'index'])->name('admin.armazem.index');
Route::middleware('administrador')->post('/armazem_store', [App\Http\Controllers\Admin\ArmazemController::class, 'store'])->name('admin.armazem.store');
Route::middleware('administrador')->post('/armazem_update{id}', [App\Http\Controllers\Admin\ArmazemController::class, 'update'])->name('admin.armazem.update');
Route::middleware('administrador')->get('/armazem_delete{id}', [App\Http\Controllers\Admin\ArmazemController::class, 'delete'])->name('admin.armazem.delete');
Route::middleware('administrador')->get('/armazem_create', [App\Http\Controllers\Admin\ArmazemController::class, 'create'])->name('admin.armazem.create');


// Crud Empresa
Route::middleware('administrador')->get('/empresa', [App\Http\Controllers\Admin\EmpresasController::class, 'index'])->name('admin.empresa.index');
Route::middleware('administrador')->post('/empresa_store', [App\Http\Controllers\Admin\EmpresasController::class, 'store'])->name('admin.empresa.store');
Route::middleware('administrador')->post('/empresa_update{id}', [App\Http\Controllers\Admin\EmpresasController::class, 'update'])->name('admin.empresa.update');
Route::middleware('administrador')->get('/empresa_delete{id}', [App\Http\Controllers\Admin\EmpresasController::class, 'delete'])->name('admin.empresa.delete');
Route::middleware('administrador')->get('/empresa_list', [App\Http\Controllers\Admin\EmpresasController::class, 'list'])->name('admin.empresa.list');


// Crud Cores
Route::middleware('administrador')->get('/comissao', [App\Http\Controllers\Admin\ComissaoController::class, 'index'])->name('admin.comissao.index');
Route::middleware('administrador')->post('/comissao_store', [App\Http\Controllers\Admin\ComissaoController::class, 'store'])->name('admin.comissao.store');
Route::middleware('administrador')->post('/comissao_update/{id}', [App\Http\Controllers\Admin\ComissaoController::class, 'update'])->name('admin.comissao.update');
Route::middleware('administrador')->get('/comissao_delete/{id}', [App\Http\Controllers\Admin\ComissaoController::class, 'delete'])->name('admin.comissao.delete');
Route::middleware('administrador')->get('/comissao_list', [App\Http\Controllers\Admin\ComissaoController::class, 'list'])->name('admin.comissao.list');
// Crud Serviços
Route::get('/servicos', [App\Http\Controllers\Admin\ServicosController::class, 'index'])->name('admin.servico.index');
Route::post('/servicos_store', [App\Http\Controllers\Admin\ServicosController::class, 'store'])->name('admin.servico.store');
Route::post('/servicos_update{id}', [App\Http\Controllers\Admin\ServicosController::class, 'update'])->name('admin.servico.update');
Route::get('/servicos_delete{id}', [App\Http\Controllers\Admin\ServicosController::class, 'delete'])->name('admin.servico.delete');
Route::get('/servicos_list', [App\Http\Controllers\Admin\ServicosController::class, 'list'])->name('admin.servico.list');

Route::get('/servico/activar/{id}', [App\Http\Controllers\Admin\ServicosController::class, 'activar'])->name('admin.servico.activar');
Route::get('/servicos/desativar/{id}', [App\Http\Controllers\Admin\ServicosController::class, 'desativar'])->name('admin.servico.desativar');


Route::get('/servico/activo/{id}', [App\Http\Controllers\Admin\ServicosController::class, 'activo'])->name('prestador.servico.activar');
Route::get('/servicos/suspenso/{id}', [App\Http\Controllers\Admin\ServicosController::class, 'suspenso'])->name('prestador.servico.desativar');

});


