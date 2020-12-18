<?php

use Illuminate\Support\Facades\Route;

// Rotas de Renderização de Páginas
Route::get('/', 'C_Main@renderInicialPage')->name('main.renderInicial');
Route::get('crud', 'C_Main@renderCrudPage')->name('main.renderCrud');

// Rotas de Usuário
Route::get('login', 'C_User@login')->name('login');
Route::get('logout', 'C_User@logout')->name('logout');
Route::post('create/user', 'C_User@createUser')->name('create.user');

// Rotas de Produto
Route::post('create/product', 'C_Product@createProduct')->name('create.product');
Route::get('read/product/{code_bar}/{name}/{qtd}/{price}', 'C_Product@readProduct')->name('read.product');
Route::get('update/product/{code_bar}/{name}/{qtd}/{price}', 'C_Product@updateProduct')->name('update.product');
Route::get('delete/product/{code_bar}', 'C_Product@deleteProduct')->name('delete.product');