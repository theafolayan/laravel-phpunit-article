<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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


Route::group(['prefix' => 'tasks'], function () {
    Route::get('/{task}','TaskController@show');
    Route::post('/create', 'TaskController@create_task');
    Route::patch('{task}/complete', 'TaskController@mark_task_as_completed');
    Route::delete('/{id}', 'TaskController@destroy');
});
