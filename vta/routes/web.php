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

// Route::get('/', function () {
//     return view('transaction.index');
// });

Route::resource('project', 'ProjectController');
Route::resource('category', 'CategoryController');
Route::resource('activity', 'ActivityController');
Route::resource('transaction', 'TransactionController');


// Route::get('category/create/{id}', [
//     'as' => 'category.create',
//     'uses' => 'CategoryController@create'
// ]);

// Route::get('activity/create/{id}', [
//     'as' => 'activity.create',
//     'uses' => 'ActivityController@create'
// ]);

// Route::get('transaction/create/{id}', [
//     'as' => 'transaction.create',
//     'uses' => 'TransactionController@create'
// ]);



// Route::resources(
//     'project' => ProjectController
// );

// Auth::routes();

 Route::get('/', 'TransactionController@index')->name('home');
