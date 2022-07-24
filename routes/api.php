<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
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
//public
Route::get('employee',"EmployeeController@index");
Route::get('employee/{id}',"EmployeeController@show");
Route::post('register',"AuthController@register");
Route::post('login',"AuthController@login");

//private
Route::group(['middleware'=>["auth:sanctum"]],function(){
       Route::post('employee',"EmployeeController@store");
       Route::put('employee/{id}',"EmployeeController@update");
       Route::delete('employee/{id}',"EmployeeController@destroy");
       Route::post('logout',"AuthController@logOut");

});