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


Auth::routes();

// Route::namespace('App\Http\Controllers\Site')->group(function () {

//     route::get('/', ['as' => 'site.home.index', 'uses' => 'HomeController@index']);

//     route::get('/produtos', ['as' => 'site.produtos.index', 'uses' => 'ProdutosController@index']);

//     route::get('/produtos/{nome}', ['as' => 'site.produtos.show', 'uses' => 'ProdutosController@show']);

//     route::get('/ blog', ['as' => 'site.blog.index', 'uses' => 'BlogController@index']);

//     route::get('/blog/{nome}', ['as' => 'site.blog.show', 'uses' => 'BlogController@show']);
    
//     route::get('/sobre', ['as' => 'site.sobre.index', 'uses' => 'SobreController@index']);

    
// });