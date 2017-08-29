<?php

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

// Rotas do Post-------------------------------------------------------

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    // Rota que redireciona para a view de criação
    Route::get('/posts/create',[
      'uses' => 'PostsController@create',
      'as' => 'post.create'
    ]);

    // Salvar um post
    Route::post('/posts/store',[
      'uses' => 'PostsController@store',
      'as' => 'post.store'
    ]);

    // Retorna a view para edição de posts
    Route::get('/posts/editar/{id}',[
      'uses' => 'PostsController@edit',
      'as' => 'post.editar'
    ]);

    // Da o update dos dados do post
    Route::post('/posts/update/{id}',[
      'uses' => 'PostsController@update',
      'as' => 'post.update'
    ]);

    // Rota para deletar post
    Route::get('/posts/deletar/{id}',[
      'uses' => 'PostsController@destroy',
      'as' => 'post.deletar'
    ]);

    // Rota para remover de vez um post
    Route::get('/posts/kill/{id}',[
      'uses' => 'PostsController@kill',
      'as' => 'post.kill'
    ]);



    // Rota que retorna a view de Posts
    Route::get('/posts', [
      'uses' =>'PostsController@index',
      'as' => 'posts'
    ]);

    // Rota que retorna a view de Posts no lixo
    Route::get('/posts/trashed', [
      'uses' =>'PostsController@trashed',
      'as' => 'post.trashed'
    ]);

    // Rota para restaurar uma postagem
    Route::get('/posts/restore/{id}', [
      'uses' =>'PostsController@restore',
      'as' => 'post.restore'
    ]);


    // Rota para criação de categoria
    Route::get('/categoria/create', [
      'uses' => 'CategoriasController@create',
      'as' => 'categoria.create'
    ]);

    //Rota para guardar a nova categoria no banco
    Route::post('/categoria/store', [
      'uses' => 'CategoriasController@store',
      'as' => 'categorias.store'
    ]);

    // Rota para apresentar categorias
    Route::get('/categorias', [
      'uses' => 'CategoriasController@index',
      'as' => 'categorias'
    ]);

    // Rota para editar uma categoria
    Route::get('/categoria/editar/{id}', [
      'uses' => 'CategoriasController@edit',
      'as' => 'categoria.editar'
    ]);

    //Deletar categoria
    Route::get('/categoria/deletar/{id}', [
      'uses' => 'CategoriasController@destroy',
      'as' => 'categoria.excluir'
    ]);

    //Da o update da categoria no banco
    Route::post('/categoria/update/{id}', [
      'uses' => 'CategoriasController@update',
      'as' => 'categorias.update'
    ]);

    //Rota para apresentação das tags
    Route::get('/tags', [
      'uses' => 'TagsController@index',
      'as' => 'tags'
    ]);

    //Rota para deleção das tags
    Route::get('/tags/deletar/{id}', [
      'uses' => 'TagsController@destroy',
      'as' => 'tag.delete'
    ]);

    //Rota para view de criação das tags
    Route::get('/tags/criar', [
      'uses' => 'TagsController@create',
      'as' => 'tag.create'
    ]);

    //Rota para salvar uma nova tags
    Route::post('/tags/salvar', [
      'uses' => 'TagsController@store',
      'as' => 'tag.store'
    ]);

    //Rota para view de edição das tags
    Route::get('/tags/editar/{id}', [
      'uses' => 'TagsController@edit',
      'as' => 'tag.edit'
    ]);

    //Rota para salvar a edição da tag
    Route::post('/tags/update/{id}', [
      'uses' => 'TagsController@update',
      'as' => 'tag.update'
    ]);

    //Rota para apresentar os usuários
    Route::get('/users', [
      'uses' => 'UsersController@index',
      'as' => 'users'
    ]);

    //Rota para a view de criação de usuários
    Route::get('/users/create', [
      'uses' => 'UsersController@create',
      'as' => 'user.create'
    ]);

    //Rota para deletar usuários
    Route::get('/users/delete/{id}', [
      'uses' => 'UsersController@destroy',
      'as' => 'user.delete'
    ]);

    //Rota para criar novo usuário
    Route::post('/users/store', [
      'uses' => 'UsersController@store',
      'as' => 'user.store'
    ]);

    //Rota para alterar permissão de usuário
    Route::get('/users/admin/{id}', [
      'uses' => 'UsersController@admin',
      'as' => 'user.admin'
    ]);

    //Rota para salvar edição do perfil
    Route::post('/users/profile/update', [
      'uses' => 'ProfilesController@update',
      'as' => 'user.profile.update'
    ]);

    //Rota que leva a view de edição do perfil
    Route::get('/users/profile/edit', [
      'uses' => 'ProfilesController@edit',
      'as' => 'user.profile.edit'
    ]);

    //Rota que leva a view de edição das configurações
    Route::get('/settings/edit', [
      'uses' => 'SettingsController@edit',
      'as' => 'setting.edit'
    ]);

    //Rota que salva as alterações nas configurações
    Route::post('/settings/update', [
      'uses' => 'SettingsController@update',
      'as' => 'setting.update'
    ]);
});

// -------------------------------------------------------------------
