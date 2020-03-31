<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', 'LoginController@login'); 
Route::post('register', 'LoginController@register'); 

Route::group(['middleware' => ['jwt.verify']], function () {


Route::get('daily_scrum', 'ScrumController@index');
Route::get('daily_scrum/{id}', 'ScrumController@show');
Route::post('daily_scrum', 'ScrumController@store');
Route::delete('daily_scrum/{id}', 'ScrumController@destroy');
});
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
