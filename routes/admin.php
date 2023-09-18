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

// Crud Categoria
Route::get('/praca', [App\Http\Controllers\Admin\PracaController::class, 'index'])->name('admin.praca.index');
Route::post('/praca_store', [App\Http\Controllers\Admin\PracaController::class, 'store'])->name('admin.praca.store');
Route::post('/praca_update{id}', [App\Http\Controllers\Admin\PracaController::class, 'update'])->name('admin.praca.update');
Route::get('/praca_delete{id}', [App\Http\Controllers\Admin\PracaController::class, 'delete'])->name('admin.praca.delete');
// Route::get('/praca_list', [App\Http\Controllers\Admin\PracaController::class, 'list'])->name('admin.praca.list');

// Crud Subs Categoria
Route::get('/genero', [App\Http\Controllers\Admin\SubCategoriaController::class, 'index'])->name('admin.sub_categoria.index');
Route::post('/genero_store', [App\Http\Controllers\Admin\SubCategoriaController::class, 'store'])->name('admin.sub_categoria.store');
Route::post('/genero_update/{id}', [App\Http\Controllers\Admin\SubCategoriaController::class, 'update'])->name('admin.sub_categoria.update');
Route::get('/genero_delete/{id}', [App\Http\Controllers\Admin\SubCategoriaController::class, 'delete'])->name('admin.sub_categoria.delete');
Route::get('/genero_list', [App\Http\Controllers\Admin\SubCategoriaController::class, 'list'])->name('admin.sub_categoria.list');

// Crud Subs Categoria
Route::get('/provincia', [App\Http\Controllers\Admin\ProvinciaController::class, 'index'])->name('admin.provincia.index');
Route::post('/provincia_store', [App\Http\Controllers\Admin\ProvinciaController::class, 'store'])->name('admin.provincia.store');
Route::post('/provincia_update/{id}', [App\Http\Controllers\Admin\ProvinciaController::class, 'update'])->name('admin.provincia.update');
Route::get('/provincia_delete/{id}', [App\Http\Controllers\Admin\ProvinciaController::class, 'delete'])->name('admin.provincia.delete');
// Route::get('/provincia_list', [App\Http\Controllers\Admin\ProvinciaController::class, 'list'])->name('admin.provincia.list');


// Crud Cores
Route::get('/cores', [App\Http\Controllers\Admin\CorController::class, 'index'])->name('admin.cor.index');
Route::post('/cores_store', [App\Http\Controllers\Admin\CorController::class, 'store'])->name('admin.cor.store');
Route::post('/cores_update/{id}', [App\Http\Controllers\Admin\CorController::class, 'update'])->name('admin.cor.update');
Route::get('/cores_delete/{id}', [App\Http\Controllers\Admin\CorController::class, 'delete'])->name('admin.cor.delete');
Route::get('/cores_list', [App\Http\Controllers\Admin\CorController::class, 'list'])->name('admin.cor.list');


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

// Crud Produtos
Route::get('/produtos', [App\Http\Controllers\Admin\ProdutosController::class, 'index'])->name('admin.produto.index');
Route::post('/produtos_store', [App\Http\Controllers\Admin\ProdutosController::class, 'store'])->name('admin.produto.store');
Route::post('/produtos_update{id}', [App\Http\Controllers\Admin\ProdutosController::class, 'update'])->name('admin.produto.update');
Route::get('/produtos_delete{id}', [App\Http\Controllers\Admin\ProdutosController::class, 'delete'])->name('admin.produto.delete');
Route::get('/produtos_list', [App\Http\Controllers\Admin\ProdutosController::class, 'list'])->name('admin.produto.list');

// Crud Especies
Route::get('/especies', [App\Http\Controllers\Admin\EspeciesController::class, 'index'])->name('admin.especies.index');
Route::post('/especies_store', [App\Http\Controllers\Admin\EspeciesController::class, 'store'])->name('admin.especies.store');
Route::post('/especies_update{id}', [App\Http\Controllers\Admin\EspeciesController::class, 'update'])->name('admin.especies.update');
Route::get('/especies_delete{id}', [App\Http\Controllers\Admin\EspeciesController::class, 'delete'])->name('admin.especies.delete');
Route::get('/especies_list', [App\Http\Controllers\Admin\EspeciesController::class, 'list'])->name('admin.especies.list');

// Crud Racas
Route::get('/racas', [App\Http\Controllers\Admin\RacasController::class, 'index'])->name('admin.racas.index');
Route::post('/racas_store', [App\Http\Controllers\Admin\RacasController::class, 'store'])->name('admin.racas.store');
Route::post('/racas_update{id}', [App\Http\Controllers\Admin\RacasController::class, 'update'])->name('admin.racas.update');
Route::get('/racas_delete{id}', [App\Http\Controllers\Admin\RacasController::class, 'delete'])->name('admin.racas.delete');
Route::get('/racas_list', [App\Http\Controllers\Admin\RacasController::class, 'list'])->name('admin.racas.list');

// Crud Animais
Route::get('/animais', [App\Http\Controllers\Admin\AnimaisController::class, 'index'])->name('admin.animais.index');
Route::post('/animais_store', [App\Http\Controllers\Admin\AnimaisController::class, 'store'])->name('admin.animais.store');
Route::post('/animais_update{id}', [App\Http\Controllers\Admin\AnimaisController::class, 'update'])->name('admin.animais.update');
Route::get('/animais_delete{id}', [App\Http\Controllers\Admin\AnimaisController::class, 'delete'])->name('admin.animais.delete');
Route::get('/animais_list', [App\Http\Controllers\Admin\AnimaisController::class, 'list'])->name('admin.animais.list');

// Crud Tipos_Lembretes
Route::get('/tipo_lembretes', [App\Http\Controllers\Admin\TipolembreteContoller::class, 'index'])->name('admin.tipolembrete.index');
Route::post('/tipo_lembretes_store', [App\Http\Controllers\Admin\TipolembreteContoller::class, 'store'])->name('admin.tipolembrete.store');
Route::post('/tipo_lembretes_update{id}', [App\Http\Controllers\Admin\TipolembreteContoller::class, 'update'])->name('admin.tipolembrete.update');
Route::get('/atipo_lembretes_delete{id}', [App\Http\Controllers\Admin\TipolembreteContoller::class, 'delete'])->name('admin.tipolembrete.delete');
Route::get('/tipo_lembretes_list', [App\Http\Controllers\Admin\TipolembreteContoller::class, 'list'])->name('admin.tipolembrete.list');

// Crud Lembretes
Route::get('/lembretes', [App\Http\Controllers\Admin\LembretesController::class, 'index'])->name('admin.lembretes.index');
Route::post('/lembretes_store', [App\Http\Controllers\Admin\LembretesController::class, 'store'])->name('admin.lembretes.store');
Route::post('/lembretes_update{id}', [App\Http\Controllers\Admin\LembretesController::class, 'update'])->name('admin.lembretes.update');
Route::get('/lembretes_delete{id}', [App\Http\Controllers\Admin\LembretesController::class, 'delete'])->name('admin.lembretes.delete');
Route::get('/lembretes_list', [App\Http\Controllers\Admin\LembretesController::class, 'list'])->name('admin.lembretes.list');

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

// Crud Animalpet
Route::get('/animalpetshop', [App\Http\Controllers\Admin\AnimalPetController::class, 'index'])->name('admin.animalpetshop.index');
Route::post('/animalpetshop_store', [App\Http\Controllers\Admin\AnimalPetController::class, 'store'])->name('admin.animalpetshop.store');
Route::post('/animalpetshop_update{id}', [App\Http\Controllers\Admin\AnimalPetController::class, 'update'])->name('admin.animalpetshop.update');
Route::get('/animalpetshop_delete{id}', [App\Http\Controllers\Admin\AnimalPetController::class, 'delete'])->name('admin.animalpetshop.delete');
Route::get('/animalpetshop_list', [App\Http\Controllers\Admin\AnimalPetController::class, 'list'])->name('admin.animalpetshop.list');


});


