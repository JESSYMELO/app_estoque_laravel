<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos/pesquisar', 'ProdutoController@pesquisar');

Route::post('/produtos/pesquisar', 'ProdutoController@pesquisar');

Route::get('/produtos/inserir', 'ProdutoController@mostrar_inserir');

Route::post('/produtos/inserir', 'ProdutoController@inserir');

Route::get('/produtos/alterar/{id}', 'ProdutoController@mostrar_alterar');

Route::post('/produtos/alterar', 'ProdutoController@alterar');

Route::get('/produtos/excluir/{id}', 'ProdutoController@excluir');

