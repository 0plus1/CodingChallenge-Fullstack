<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/metadata/read/all', ['as'=> 'api.metadata.all', 'uses' => '\App\Http\Controllers\API\BookController@getMiddleware']);
Route::get('/shelf/{shelf_slug}/read', ['as'=> 'api.shelf.books.read', 'uses' => '\App\Http\Controllers\API\ShelfController@getBooks']);
