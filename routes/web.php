<?php

use Illuminate\Support\Facades\Route;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Started cms code
|--------------------------------------------------------------------------
*/
Route::get('/admin',function (){
    return view('admin.index');
});
Route::resource('/admin/users','AdminUserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
