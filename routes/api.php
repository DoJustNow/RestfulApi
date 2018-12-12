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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rooms','RoomApiController@index');
Route::get('/room','RoomApiController@show');
Route::post('/room','RoomApiController@store');
Route::put('/room','RoomApiController@update');
Route::delete('/room','RoomApiController@delete');

/**
 * Мето         Путь                    Action      Имя маршрута
 * ----         --------------------    ------      -------------
 * GET          /photos                 index       photos.index
 * GET          /photos/create          create      photos.create
 * POST         /photos                 store       photos.store
 * GET          /photos/{photo}         show        photos.show
 * GET          /photos/{photo}/edit    edit        photos.edit
 * PUT/PATCH    /photos/{photo}         update      photos.update
 * DELETE       /photos/{photo}         destroy     photos.destroy
 */