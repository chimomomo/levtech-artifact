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

Route::get('/', 'GameController@index')->middleware('auth');
Route::get('/games/{game}', 'GameController@show');
Route::get('/games/reviews/{game}', 'GameController@reviewIndex');
Route::get('/companylist', 'CompanyController@listup');
Route::get('/companies/{company}', 'CompanyController@index');
Route::get('/machinelist', 'MachineController@listup');
Route::get('/machines/{machine}', 'MachineController@index');
Route::get('/genrelist', 'GenreController@listup');
Route::get('/genres/{genre}', 'GenreController@index');
Route::get('/reviews', 'ReviewController@index');
Route::get('/reviews/create', 'ReviewController@create');
Route::get('/reviews/{review}/edit', 'ReviewController@edit');
Route::put('/reviews/{review}', 'ReviewController@update');
Route::delete('/reviews/{review}', 'ReviewController@delete');
Route::get('/reviews/{review}', 'ReviewController@show');
Route::post('/reviews', 'ReviewController@store');
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
Auth::routes();

