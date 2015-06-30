<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Catalogue :
Route::get('/catalogue', 'CatalogueController@displaySections' );
Route::get('/catalogue/section/{section_id}', 'CatalogueController@displayCategories' )->where('section_id', '[0-9]+');
Route::get('/catalogue/category/{category_id}', 'CatalogueController@displayBooks' )->where('category_id', '[0-9]+');
Route::get('/catalogue/book/{book_id}', 'CatalogueController@displayBook' )->where('book_id', '[0-9]+');


Route::get('/', 'IndexController@index');
Route::post('/newsletter', 'NewsletterController@postFormNewsletter');
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
