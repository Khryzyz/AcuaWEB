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

    Route::get('home', 'homeController@index')->name('home');

    /**
     *******************************************************************************************
     * FIN AREA HOME ***************************************************************************
     *******************************************************************************************
     */

    /**
     *******************************************************************************************
     * AREA GENERAL ****************************************************************************
     *******************************************************************************************
     */

    /**
     *******************************************************************************************
     * FIN AREA GENERAL ************************************************************************
     *******************************************************************************************
     */

    /**
     * AREA GENERAL  / MODALES ****************************************************************
     */

    Route::get('general/getModalInfoPlantaById/{idPlanta}', 'generalController@getModalInfoPlantaById');

    Route::get('general/getModalInfoPezById/{idPez}', 'generalController@getModalInfoPezById');

    /**
     *******************************************************************************************
     * AREA PROCESOS ***************************************************************************
     *******************************************************************************************
     */

    /**
     * AREA PROCESOS  / VISTAS *****************************************************************
     */

    Route::get('procesos', 'procesosController@index')->name('procesos');

    Route::get('procesos/getViewInfoCaracteristicasProcesoById/{idProceso}', 'procesosController@getViewInfoCaracteristicasProcesoById')->name('getViewInfoCaracteristicasProcesoById');

    Route::get('procesos/getViewInfoValoresProcesoById/{idProceso}', 'procesosController@getViewInfoValoresProcesoById')->name('getViewInfoValoresProcesoById');

    /**
     * AREA PROCESOS  / MODALES ****************************************************************
     */

    Route::get('procesos/modalAgregarProcesos', 'procesosController@getModalAgregarProcesos')->name('modalAgregarProcesos');

    Route::post('procesos/modalAgregarProcesos', 'procesosController@postModalAgregarProcesos')->name('modalAgregarProcesos');

    /**
     * AREA PROCESOS  / GRIDS ******************************************************************
     */

    Route::post('procesos/getProcesosByIdUsuario/{idUsuario}', 'procesosController@getProcesosByIdUsuario')->name('getProcesosByIdUsuario');

    Route::post('procesos/getInfoPlantaByProcesoId/{idProceso}', 'procesosController@getInfoPlantaByProcesoId')->name('getInfoPlantaByProcesoId');

    Route::post('procesos/getInfoPezByProcesoId/{idProceso}', 'procesosController@getInfoPezByProcesoId')->name('getInfoPezByProcesoId');

    Route::post('procesos/getValuesProcesoByIdForGrid/{idTipoSensor}/{idProceso}', 'procesosController@getValuesProcesoByIdForGrid')->name('getValuesProcesoByIdForGrid');

    /**
     * AREA PROCESOS  / CHARTS *****************************************************************
     */

    Route::post('procesos/getValuesProcesoByIdForChart/{idTipoSensor}/{idProceso}', 'procesosController@getValuesProcesoByIdForChart')->name('getValuesProcesoByIdForChart');

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

    Route::get('configuracion/usuarios', 'configuracionController@configuracionUsuarios')->name('configUsuarios');

    Route::get('configuracion/personal', 'configuracionController@configuracionPersonal')->name('configPersonal');

    Route::get('configuracion/plantas', 'configuracionController@configuracionPlantas')->name('configPlantas');

    Route::get('configuracion/peces', 'configuracionController@configuracionPeces')->name('configPeces');

    Route::get('configuracion/misplantas', 'configuracionController@configuracionMisPlantas')->name('configMisPlantas');

    Route::get('configuracion/mispeces', 'configuracionController@configuracionMisPeces')->name('configMisPeces');


    /**
     * AREA CONFIGURACION  / MODALES ****************************************************************
     */

    Route::get('configuracion/modalAgregarUsuario', 'configuracionController@getModalAgregarUsuario')->name('modalAgregarUsuario');

    Route::post('configuracion/modalAgregarUsuario', 'configuracionController@postModalAgregarUsuario')->name('modalAgregarUsuario');

    Route::get('configuracion/modalAgregarPlanta', 'configuracionController@getModalAgregarPlanta')->name('modalAgregarPlanta');

    Route::post('configuracion/modalAgregarPlanta', 'configuracionController@postModalAgregarPlanta')->name('modalAgregarPlanta');

    Route::get('configuracion/modalAgregarPez', 'configuracionController@getModalAgregarPez')->name('modalAgregarPez');

    Route::post('configuracion/modalAgregarPez', 'configuracionController@postModalAgregarPez')->name('modalAgregarPez');

    /**
     * AREA CONFIGURACION  / GRIDS ******************************************************************
     */

    Route::post('configuracion/getUsuarios', 'configuracionController@getUsuarios')->name('getUsuarios');

    Route::post('configuracion/getPlantas', 'configuracionController@getPlantas')->name('getPlantas');

    Route::post('configuracion/getPeces', 'configuracionController@getPeces')->name('getPeces');

    Route::post('configuracion/getPlantasByUsuarioId', 'configuracionController@getPlantasByUsuarioId')->name('getPlantasByUsuarioId');

    Route::post('configuracion/getPecesByUsuarioId', 'configuracionController@getPecesByUsuarioId')->name('getPecesByUsuarioId');

    /**
     * AREA CONFIGURACION  / DROPDOWNS **************************************************************
     */

    Route::post('configuracion/getTiposUsuario', 'configuracionController@getTiposUsuario')->name('getTiposUsuario');

    Route::post('configuracion/getTiposExpoSolar', 'configuracionController@getTiposExpoSolar')->name('getTiposExpoSolar');

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

Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('logout');

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