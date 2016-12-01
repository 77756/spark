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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/customers/add', 'CustomerController@add');
Route::get('/customers/show', 'CustomerController@show');

Route::get('/customers/{customer}/delete', 'CustomerController@delete');
Route::get('/customers/{customer}/more', 'CustomerController@more');
Route::get('/customers/{customer}/edit', 'CustomerController@edit');

Route::post('/customers/store', 'CustomerController@store');

Route::patch('/customers/{customer}/update', 'CustomerController@update');

Route::get('/profile/', 'ProfileDetailsController@edit');
Route::patch('/profile/update', 'ProfileDetailsController@update');


Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{category}', 'CategoryController@show');
Route::get('/categories/{category}/delete', 'CategoryController@delete');
Route::get('/categories/{category}/edit', 'CategoryController@edit');
Route::patch('/categories/{category}/update', 'CategoryController@update');
Route::post('/categories/add', 'CategoryController@store');

Route::get('/skill/{skill}', 'SkillController@show');
Route::get('/skill/{skill}/edit', 'SkillController@edit');
Route::get('/skill/{skill}/delete', 'SkillController@delete');

Route::patch('/skill/{skill}/update', 'SkillController@update');

Route::post('/newskill/{category}', 'SkillController@store');

Route::post('/newcategory_branche/{branche}', 'BrancheCategoryController@store');

Route::get('/branches', 'BrancheController@index');
Route::get('/branches/{branche}', 'BrancheController@show');
Route::get('/branches/{branche}/edit', 'BrancheController@edit');
Route::patch('/branches/{branche}/update', 'BrancheController@update');
Route::get('/branches/{branche}/delete', 'BrancheController@delete');
Route::post('/newbranche', 'BrancheController@store');

