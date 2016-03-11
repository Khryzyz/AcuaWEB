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

/*
 *METODOS GET 
 */

Route::get('/', 'mainController@index');

Route::get('main/modal', 'mainController@getViewModal');

Route::get('main/modaltest', 'mainController@modaltest');
Route::get('main/modalformulario', 'mainController@getModalFormulario');

Route::get('main/tesProcedimiento', 'mainController@getViewProcedimientos');

Route::get('main/testPrueba', 'mainController@postPrubaproce');



/*
 *METODOS POST 
 */
Route::post('main/modalformulario', 'mainController@postMamodalFormulario');
Route::post('main/tesProcedimientogrid', 'mainController@postPrubaproce');

//Route::get('main/tesProcedimientogrid', 'mainController@postPrubaproce');
