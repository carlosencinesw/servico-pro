<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Controllers\ProdutosController;

Route::get('/', 'LoginController@index');

Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::get('/logout', ['as' => 'exit', 'uses' => 'LoginController@logout']);
Route::get('/register', ['as' => 'newuser', 'uses' => 'LoginController@create_user']);
Route::post('/register', ['as' => 'saveuser', 'uses' => 'LoginController@register']);



Route::group(['prefix' => 'app', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', 'dashboardController@Index');
    Route::group(['prefix' => 'modulos'], function(){
        Route::resource('clientes', 'ClientesController');
        Route::resource('produtos', 'ProdutosController');
        Route::resource('servicos', 'ServicosController');
        Route::resource('orcamentos', 'OrcamentoController');
        //Rota para visualizar o pdf do orçamento
        Route::get('visualizar/{id}', ['as' => 'ver', 'uses' => 'OrcamentoController@verOrcamento']);

        //Rota para atualizar os status do serviço
        Route::patch('servicos/status/{id}', ['as' => 'app.modulos.servicos.status', 'uses' => 'ServicosController@updateStatus']);

        //Rotas para editar e atualizar os dados do usuario logado
        Route::get('atualizar/usuario/{id}', ['as' => 'usuario.edit', 'uses' => 'LoginController@editUserProfile']);
        Route::put('atualizar/usuario/{id}', ['as' => 'usuario.update', 'uses' => 'LoginController@updateUser']);

        //Rotas para envio de feedback
        Route::get('feedback', ['as' => 'feedback', 'uses' => 'FeedbackController@index']);
        Route::post('feedback/send', ['as' => 'send.feedback', 'uses' => 'FeedbackController@sendFeedBack']);

    });
});
