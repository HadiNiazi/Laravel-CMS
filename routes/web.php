<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*==========================================Starting my own routes==================================== */
Route::get('post/{id}', 'AdminPostController@post');


Route::group(['middleware'=>'admin'],function (){
    Route::get('/admin',function (){
        return view('admin.index');
    });
    Route::resource('/admin/users','AdminUserController');
    Route::resource('/admin/posts','AdminPostController');
    Route::resource('/admin/categories','AdminCategoriesController');
    Route::resource('/admin/media','AdminMediasController');

    Route::resource('/admin/comments', 'PostCommentsController');
    Route::resource('/admin/comment/replies', 'CommentRepliesController');
});

