<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** Posts Routes*/
//display posts page
Route::get('posts','PostsController@index');
Route::get('/','PostsController@index');

//display post detail page
Route::get('posts/{post_id}','PostsController@show');
//update post details
Route::post('posts/{post_id}','PostsController@update');

//add posts
Route::post('posts','PostsController@store');


/** Categories Routes*/

//display all categories
Route::get('categories','CategoriesController@index');
//add new category
Route::post('category','CategoriesController@store');

//display category
Route::get('category/update/{category_id}','CategoriesController@show');
//edit category
Route::post('category/update/{category_id}','CategoriesController@update');

//delete category
Route::get('category/delete/{category_id}','CategoriesController@delete');

//display add subcategory form
Route::get('category/add/{category_id}','CategoriesController@show');
//save subcategory
Route::post('category/{category_id}','CategoriesController@store');




