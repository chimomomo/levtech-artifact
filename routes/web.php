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
Route::get('/games/posts/{game}', 'GameController@postIndex');
Route::get('/games/recruits/{game}', 'GameController@recruitIndex');
Route::get('/games/bugs/{game}', 'GameController@bugIndex');
Route::get('/games/amendments/{game}', 'GameController@amendmentIndex');
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
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@delete');
Route::post('/posts/{post}/postcomments','PostCommentController@store');
Route::delete('/posts/postcomments/{postcomment}', 'PostCommentController@delete');
Route::get('/post/like/{id}', 'PostLikeController@like')->name('post.like');
Route::get('/post/unlike/{id}', 'PostLikeController@unlike')->name('post.unlike');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');
Route::get('/recruits', 'RecruitController@index');
Route::get('/recruits/create', 'RecruitController@create');
Route::get('/recruits/{recruit}/edit', 'RecruitController@edit');
Route::put('/recruits/{recruit}', 'RecruitController@update');
Route::delete('/recruits/{recruit}', 'RecruitController@delete');
Route::get('/recruits/{recruit}', 'RecruitController@show');
Route::post('/recruits', 'RecruitController@store');
Route::get('/bugs', 'BugController@index');
Route::get('/bugs/create', 'BugController@create');
Route::get('/bugs/{bug}/edit', 'BugController@edit');
Route::put('/bugs/{bug}', 'BugController@update');
Route::delete('/bugs/{bug}', 'BugController@delete');
Route::get('/bugs/{bug}', 'BugController@show');
Route::post('/bugs', 'BugController@store');
Route::get('/amendments', 'AmendmentController@index');
Route::get('/amendments/create', 'AmendmentController@create');
Route::get('/amendments/{amendment}/edit', 'AmendmentController@edit');
Route::put('/amendments/{amendment}', 'AmendmentController@update');
Route::delete('/amendments/{amendment}', 'AmendmentController@delete');
Route::get('/amendments/{amendment}', 'AmendmentController@show');
Route::post('/amendments', 'AmendmentController@store');
Route::get('/mypage/reviews/{user}', 'UserController@reviewIndex');
Route::get('/mypage/posts/{user}', 'UserController@postIndex');
Route::get('/mypage/recruits/{user}', 'UserController@recruitIndex');
Route::get('/mypage/bugs/{user}', 'UserController@bugIndex');
Route::get('/mypage/amendments/{user}', 'UserController@amendmentIndex');
Route::get('/mypage/{user}/edit', 'UserController@edit');
Route::put('/mypage/{user}', 'UserController@update');
Route::get('/mypage/{user}', 'UserController@show');
Route::get('/friends', 'FriendController@index');
Route::get('/friends/edit', 'FriendController@edit');
Route::get('/groups', 'GroupController@index');
Route::get('/groups/show', 'GroupController@show');
Route::get('/groups/create', 'GroupController@create');
Route::get('/groups/edit', 'GroupController@edit');
Route::get('/chats', 'ChatController@index');
Auth::routes();

