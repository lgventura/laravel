<?php

/*
Rotas do site
*/

Route::get('/', 'PageController@index');
Route::get('contatos', 'PageController@contatos');
Route::get('page/cursos', 'PageController@cursos');
Route::get('page/cursos/detalhes/{id}', 'PageController@detalhesC');
Route::get('page/professor', 'PageController@professor');
Route::get('page/professor/detalhes/{id}', 'PageController@detalhesP');
Route::get('page/noticias', 'PageController@noticias');
Route::get('page/noticias/detalhes/{id}', 'PageController@detalhesN');

Route::get('/adm/inicio', 'InicioController@index');


//Dashboard
Route::get('/adm/dashboard', 'DashboardController@index');

//Route::get('/adm/teste', 'TesteController@index');

//Rotas para os Cursos
Route::get('/adm/curso', 'CursoController@index');
Route::get('/adm/curso/add', 'CursoController@add');
Route::post('/adm/curso/inserir', 'CursoController@inserir');
Route::get('/adm/curso/deletar/{id}', 'CursoController@deletar');
Route::get('/adm/curso/dados/{id}', 'CursoController@dados');
Route::post('/adm/curso/editar', 'CursoController@editar');


//Rotas para os Professores
Route::get('/adm/professor', 'ProfessoreController@index');
Route::get('/adm/professor/add', 'ProfessoreController@add');
//Route::get('/adm/professor/add', 'TesteController@teste');
Route::post('/adm/professor/inserir', 'ProfessoreController@inserir');
Route::get('/adm/professor/deletar/{id}', 'ProfessoreController@deletar');
Route::get('/adm/professor/dados/{id}', 'ProfessoreController@dados');
Route::post('/adm/professor/editar', 'ProfessoreController@editar');


//Rotas para as Disciplinas
Route::get('/adm/disciplina', 'DisciplinaController@index');
Route::get('/adm/disciplina/add', 'DisciplinaController@add');
Route::post('/adm/disciplina/inserir', 'DisciplinaController@inserir');
Route::get('/adm/disciplina/deletar/{id}', 'DisciplinaController@deletar');
Route::get('/adm/disciplina/dados/{id}', 'DisciplinaController@dados');
Route::post('/adm/disciplina/editar', 'DisciplinaController@editar');

Route::get('/adm/cpa', 'CpaController@index');
Route::get('/adm/cpa/add', 'CpaController@add');
Route::post('/adm/cpa/inserir', 'CpaController@inserir');
Route::get('/adm/cpa/deletar/{id}', 'CpaController@deletar');
Route::get('/adm/cpa/dados/{id}', 'CpaController@dados');
Route::post('/adm/cpa/editar', 'CpaController@editar');

Route::get('/adm/noticias', 'NoticiaController@index');
Route::get('/adm/noticias/add', 'NoticiaController@add');
Route::post('/adm/noticias/inserir', 'NoticiaController@inserir');
Route::get('/adm/noticias/deletar/{id}', 'NoticiaController@deletar');
Route::get('/adm/noticias/dados/{id}', 'NoticiaController@dados');
Route::post('/adm/noticias/editar', 'NoticiaController@editar');

Route::get('/adm/slides', 'SlideController@index');
Route::get('/adm/slides/add', 'SlideController@add');
Route::post('/adm/slides/inserir', 'SlideController@inserir');
Route::get('/adm/slides/deletar/{id}', 'SlideController@deletar');
Route::get('/adm/slides/dados/{id}', 'SlideController@dados');
Route::post('/adm/slides/editar', 'SlideController@editar');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
