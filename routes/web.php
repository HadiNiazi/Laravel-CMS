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
Route::get('/test',function (){
     return view('admin.index');
});
Route::resource('/admin/user','AdminUserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
