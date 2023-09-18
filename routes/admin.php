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
|
*/
// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');Auth::routes();
route::middleware('admin','auth')->get('/', ['as' => 'admin.home.index', 'uses' => 'App\Http\Controllers\Admin\HomeController@index']);

Route::middleware('admin','auth')->namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function () {
    
    // Crud Utilizador
Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
Route::post('/user_store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
Route::post('/user_update{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
Route::get('/user_delete{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
Route::get('/user_list', [App\Http\Controllers\Admin\UserController::class, 'list'])->name('admin.user.list');



// Crud Categoria
Route::get('/categoria', [App\Http\Controllers\Admin\CategoriaController::class, 'index'])->name('admin.categoria.index');
Route::post('/categoria_store', [App\Http\Controllers\Admin\CategoriaController::class, 'store'])->name('admin.categoria.store');
Route::post('/categoria_update{id}', [App\Http\Controllers\Admin\CategoriaController::class, 'update'])->name('admin.categoria.update');
Route::get('/categoria_delete{id}', [App\Http\Controllers\Admin\CategoriaController::class, 'delete'])->name('admin.categoria.delete');
Route::get('/categoria_list', [App\Http\Controllers\Admin\CategoriaController::class, 'list'])->name('admin.categoria.list');


// Crud Subs Categoria
Route::get('/genero', [App\Http\Controllers\Admin\SubCategoriaController::class, 'index'])->name('admin.sub_categoria.index');
Route::post('/genero_store', [App\Http\Controllers\Admin\SubCategoriaController::class, 'store'])->name('admin.sub_categoria.store');
Route::post('/genero_update/{id}', [App\Http\Controllers\Admin\SubCategoriaController::class, 'update'])->name('admin.sub_categoria.update');
Route::get('/genero_delete/{id}', [App\Http\Controllers\Admin\SubCategoriaController::class, 'delete'])->name('admin.sub_categoria.delete');
Route::get('/genero_list', [App\Http\Controllers\Admin\SubCategoriaController::class, 'list'])->name('admin.sub_categoria.list');



// Crud Armazem
Route::get('/armazem', [App\Http\Controllers\Admin\ArmazemController::class, 'index'])->name('admin.armazem.index');
Route::post('/armazem_store', [App\Http\Controllers\Admin\ArmazemController::class, 'store'])->name('admin.armazem.store');
Route::post('/armazem_update{id}', [App\Http\Controllers\Admin\ArmazemController::class, 'update'])->name('admin.armazem.update');
Route::get('/armazem_delete{id}', [App\Http\Controllers\Admin\ArmazemController::class, 'delete'])->name('admin.armazem.delete');
Route::get('/armazem_create', [App\Http\Controllers\Admin\ArmazemController::class, 'create'])->name('admin.armazem.create');


// Crud Empresa
Route::get('/empresa', [App\Http\Controllers\Admin\EmpresasController::class, 'index'])->name('admin.empresa.index');
Route::post('/empresa_store', [App\Http\Controllers\Admin\EmpresasController::class, 'store'])->name('admin.empresa.store');
Route::post('/empresa_update{id}', [App\Http\Controllers\Admin\EmpresasController::class, 'update'])->name('admin.empresa.update');
Route::get('/empresa_delete{id}', [App\Http\Controllers\Admin\EmpresasController::class, 'delete'])->name('admin.empresa.delete');
Route::get('/empresa_list', [App\Http\Controllers\Admin\EmpresasController::class, 'list'])->name('admin.empresa.list');


// Crud Cores
Route::get('/comissao', [App\Http\Controllers\Admin\ComissaoController::class, 'index'])->name('admin.comissao.index');
Route::post('/comissao_store', [App\Http\Controllers\Admin\ComissaoController::class, 'store'])->name('admin.comissao.store');
Route::post('/comissao_update/{id}', [App\Http\Controllers\Admin\ComissaoController::class, 'update'])->name('admin.comissao.update');
Route::get('/comissao_delete/{id}', [App\Http\Controllers\Admin\ComissaoController::class, 'delete'])->name('admin.comissao.delete');
Route::get('/comissao_list', [App\Http\Controllers\Admin\ComissaoController::class, 'list'])->name('admin.comissao.list');
// Crud Serviços
Route::get('/servicos', [App\Http\Controllers\Admin\ServicosController::class, 'index'])->name('admin.servico.index');
Route::post('/servicos_store', [App\Http\Controllers\Admin\ServicosController::class, 'store'])->name('admin.servico.store');
Route::post('/servicos_update{id}', [App\Http\Controllers\Admin\ServicosController::class, 'update'])->name('admin.servico.update');
Route::get('/servicos_delete{id}', [App\Http\Controllers\Admin\ServicosController::class, 'delete'])->name('admin.servico.delete');
Route::get('/servicos_list', [App\Http\Controllers\Admin\ServicosController::class, 'list'])->name('admin.servico.list');



});


