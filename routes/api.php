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

Route::group([
  'middleware' => [
      'throttle:200,1'
  ]
], function () {
  Route::get('/shelf/{shelf_slug}/read', 'API\ShelfController@index');
  Route::get('/metadata/read/{book_id}', 'API\BookController@show');
});

Route::get('/metadata/read/all', ['as'=> 'api.metadata.all', 'uses' => 'ApiController@metadata']);