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

/**
 * busca informações da API
 */
Route::get("/v1","ItemController@index");
/**
 * inserção de dados do item
 */
Route::post("/v1","ItemController@store");
/**
 * remove um item
 */
Route::delete("/v1/{id}","ItemController@destroy");
/**
 * Atualiza um item
 */
Route::put("/v1/{id}","ItemController@update");