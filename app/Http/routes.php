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

Route::get('/', function () {
    return redirect()->intended('auth/login');
});


Route::group(['middleware' => 'auth'], function () {

    /**
     *******************************************************************************************
     * AREA TEST *******************************************************************************
     * SOLO ES USADA PARA REALIZAR PRUEBAS SOBRE LA TECNOLOGIA *********************************
     *******************************************************************************************
     */

    //Test Grid Datatables

    Route::get('test/vistaGridDatatables', 'testController@vistaGridDatatables');

    Route::post('test/getGridDataTables', 'testController@getGridDataTables')->name('getGridDataTables');

    //Test Grid Kendo

    Route::get('test/vistaGridKendo', 'testController@vistaGridKendo');

    Route::post('test/getGridKendo', 'testController@getGridKendo')->name('getGridKendo');

    //Test Dropdown Kendo

    Route::get('test/vistaDropdownKendo', 'testController@vistaDropdownKendo');

    Route::post('test/getDropDownKendo', 'testController@getDropDownKendo')->name("getDropDownKendo");

    Route::post('test/getDropDownArgKendo/{estado}', 'testController@getDropDownArgKendo')->name('getDropDownArgKendo');

    //Test Info Auth

    Route::get('test/vistaInfoAuth', 'testController@vistaInfoAuth');

    //Test Modal

    Route::get('test/vistaModal', 'testController@vistaModal');

    Route::get('test/getModalTest', 'testController@getModalTest');

    Route::get('test/getModalFormTest/{id}', 'testController@getModalFormTest');


    /**
     *******************************************************************************************
     * FIN AREA TEST ***************************************************************************
     *******************************************************************************************
     */

    /**
     *******************************************************************************************
     * AREA HOME *******************************************************************************
     *******************************************************************************************
     */

    // Rutas pertenecientes al HOME de la aplicacion

    Route::get('/', 'homeController@index');

    Route::get('home', 'homeController@index');

    /**
     *******************************************************************************************
     * FIN AREA HOME ***************************************************************************
     *******************************************************************************************
     */

    /**
     *******************************************************************************************
     * AREA PROCESOS ***************************************************************************
     *******************************************************************************************
     */

    /**
     * AREA PROCESOS  / VISTAS *****************************************************************
     */

    Route::get('procesos', 'procesosController@index');

    Route::get('procesos/getViewInfoCaracteristicasProcesoById/{idProceso}', 'procesosController@getViewInfoCaracteristicasProcesoById');

    Route::get('procesos/getViewInfoValoresProcesoById/{idProceso}', 'procesosController@getViewInfoValoresProcesoById');

    Route::get('procesos/modalAgregarProcesos', 'procesosController@getModalAgregarProcesos');

    Route::post('procesos/modalAgregarProcesos', 'procesosController@postModalAgregarProcesos');

    /**
     * AREA PROCESOS  / MODALES ****************************************************************
     */

    Route::get('procesos/getModalInfoPlantaById/{idPlanta}', 'procesosController@getModalInfoPlantaById');

    Route::get('procesos/getModalInfoPezById/{idPez}', 'procesosController@getModalInfoPezById');

    /**
     * AREA PROCESOS  / GRIDS ******************************************************************
     */

    Route::post('procesos/getProcesosByIdUsuario/{idUsuario}', 'procesosController@getProcesosByIdUsuario');

    Route::post('procesos/getInfoPlantaByProcesoId/{idProceso}', 'procesosController@getInfoPlantaByProcesoId');

    Route::post('procesos/getInfoPezByProcesoId/{idProceso}', 'procesosController@getInfoPezByProcesoId');

    Route::post('procesos/getValuesProcesoByIdForGrid/{idTipoSensor}/{idProceso}', 'procesosController@getValuesProcesoByIdForGrid');

    /**
     * AREA PROCESOS  / CHARTS *****************************************************************
     */

    Route::post('procesos/getValuesProcesoByIdForChart/{idTipoSensor}/{idProceso}', 'procesosController@getValuesProcesoByIdForChart');

    /**
     *******************************************************************************************
     * FIN AREA PROCESOS ***********************************************************************
     *******************************************************************************************
     */

    /**
     *******************************************************************************************
     * AREA CONFIGURACION **********************************************************************
     *******************************************************************************************
     */

    /**
     * AREA CONFIGURACION  / VISTAS *****************************************************************
     */
    Route::get('configuracion/usuarios', 'configuracionController@configuracionUsuarios');

    Route::get('configuracion/personal', 'configuracionController@configuracionPersonal');

    Route::get('configuracion/plantas', 'configuracionController@configuracionPlantas');

    Route::get('configuracion/peces', 'configuracionController@configuracionPeces');

    /**
     * AREA PROCESOS  / GRIDS ******************************************************************
     */

    Route::post('configuracion/getUsuarios', 'configuracionController@getUsuarios');

    Route::post('configuracion/getPlantas', 'configuracionController@getPlantas');

    Route::post('configuracion/getPeces', 'configuracionController@getPeces');
    /**
     *******************************************************************************************
     * FIN AREA CONFIGURACION ******************************************************************
     *******************************************************************************************
     */

});

/**
 *******************************************************************************************
 * AREA AUTENTICACION **********************************************************************
 *******************************************************************************************
 */

Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

/**
 *******************************************************************************************
 * FIN AREA AUTENTICACION ******************************************************************
 *******************************************************************************************
 */

/**
 *******************************************************************************************
 * AREA REGISTRO ***************************************************************************
 *******************************************************************************************
 */

Route::get('auth/register', 'Auth\AuthController@getRegister');

Route::post('auth/register', 'Auth\AuthController@postRegister');

/**
 *******************************************************************************************
 * FIN AREA REGISTRO ***********************************************************************
 *******************************************************************************************
 */