<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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

Route::get('/', 'App\Http\Controllers\PostController@index')->name('home');
Route::resource('posts', PostController::class);

Route::resource('products', ProductController::class);
Route::get('/posts', 'App\Http\Controllers\PostController@getPosts');

Route::get('/categorywitpost', 'App\Http\Controllers\PostController@checkPivotRecords');
Route::get('/postwithCategories', 'App\Http\Controllers\PostController@getPostWithCategories');
Route::get('/getPostsByUser', 'App\Http\Controllers\PostController@getPostsByUser');

