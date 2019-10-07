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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::resource('posts','PostsController');

Route::post('/posts/{post}/comment', 'CommentController@store');

Route::delete('/comment/{comment}', 'CommentController@destroy');

Route::resource('clubs','ClubController');

Route::get('/clubs/player/{player}', 'PlayersController@show');

Route::get('/posts/comment/{comment}', 'CommentController@show', function($id){
    return view('posts.comment')->with('id',$id);
});

Route::get('/players/create','PlayersController@create');

Route::get('/players/{player}/edit','PlayersController@edit');

Route::put('/players/{player}','PlayersController@update');

Route::delete('/players/{player}','PlayersController@destroy');

Route::post('players', 'PlayersController@store');

//ADMIN PAGE
//route::resource('admin','AdminController');

Route::get('/admin', 'AdminController@index', function(){
    
    return view('admin.index')->with($data);
});

Route::get('/admin/show', 'AdminController@show', function(){
    return view('admin.show');
});

Route::get('/admin/{user}/edit','AdminController@edit');

Route::get('/admin/club', 'AdminController@club', function(){
    return view('admin.club');
});

Route::get('/admin/player', 'AdminController@player', function(){
    return view('admin.player');
});

Route::post('admin/{user}', 'AdminController@update');

Route::delete('/admins/{user}','AdminController@destroy');

// END ADMIN
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
