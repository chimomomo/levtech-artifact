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

Route::get('/', 'GameController@index');
Route::get('/games/show', 'GameController@show');
Route::get('/companylist', 'CompanyController@listup');
Route::get('/companyindex', 'CompanyController@index');
Route::get('/modellist', 'ModelController@listup');
Route::get('/modelindex', 'ModelController@index');
Route::get('/genrelist', 'GenreController@listup');
Route::get('/genreindex', 'GenreController@index');
Route::get('/reviews', 'ReviewController@index');
Route::get('/reviews/show', 'ReviewController@show');
Route::get('/reviews/create', 'ReviewController@create');
Route::get('/reviews/edit', 'ReviewController@edit');
Route::get('/posts', 'PostController@index');
Route::get('/posts/show', 'PostController@show');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/edit', 'PostController@edit');
Route::get('/recruits', 'RecruitController@index');
Route::get('/recruits/show', 'RecruitController@show');
Route::get('/recruits/create', 'RecruitController@create');
Route::get('/recruits/edit', 'RecruitController@edit');
Route::get('/bugs', 'BugController@index');
Route::get('/bugs/show', 'BugController@show');
Route::get('/bugs/create', 'BugController@create');
Route::get('/bugs/edit', 'BugController@edit');
Route::get('/amendments', 'AmendmentController@index');
Route::get('/amendments/show', 'AmendmentController@show');
Route::get('/amendments/create', 'AmendmentController@create');
Route::get('/amendments/edit', 'AmendmentController@edit');
Route::get('/mypage', 'UserController@index');
Route::get('/mypage/edit', 'UserController@edit');
Route::get('/friends', 'FriendController@index');
Route::get('/friends/edit', 'FriendController@edit');
Route::get('/groups', 'GroupController@index');
Route::get('/groups/show', 'GroupController@show');
Route::get('/groups/create', 'GroupController@create');
Route::get('/groups/edit', 'GroupController@edit');
Route::get('/chats', 'ChatController@index');