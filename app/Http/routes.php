<?php

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
     * AREA GENERAL  / VISTAS *****************************************************************
     */

    /**
     * AREA GENERAL  / MODALES ****************************************************************
     */

    Route::get('general/getModalInfoPlantaById/{idPlanta}', 'generalController@getModalInfoPlantaById')->name('modalInfoPlantaById');

    Route::get('general/getModalGaleriaPlantaById/{idPlanta}', 'generalController@getModalGaleriaPlantaById');

    Route::get('general/getModalEditarPlantaById/{idPlanta}', 'generalController@getModalEditarPlantaById');

    Route::post('general/postModalEditarPlantaById', 'generalController@postModalEditarPlantaById')->name('modalEditarPlanta');

    Route::get('general/getModalInfoPezById/{idPez}', 'generalController@getModalInfoPezById')->name('modalInfoPezById');

    Route::get('general/getModalGaleriaPezById/{idPez}', 'generalController@getModalGaleriaPezById');

    Route::get('general/getModalEditarPezById/{idPez}', 'generalController@getModalEditarPezById');

    Route::post('general/postModalEditarPezById', 'generalController@postModalEditarPezById')->name('modalEditarPez');

    Route::get('general/getModalInfoUsuarioById/{idUsuario}', 'generalController@getModalInfoUsuarioById')->name('modalInfoUsuarioById');

    Route::get('general/getModalEditarUsuarioById/{idUsuario}', 'generalController@getModalEditarUsuarioById');

    Route::post('general/postModalEditarUsuarioById', 'generalController@postModalEditarUsuarioById')->name('modalEditarUsuario');

    Route::get('general/getModalEditarPassUsuarioById/{idUsuario}', 'generalController@getModalEditarPassUsuarioById');

    Route::post('general/postModalEditarPassUsuarioById', 'generalController@postModalEditarPassUsuarioById')->name('modalEditarPassUsuario');

    Route::get('general/getModalEditarAvatarUsuarioById/{idUsuario}', 'generalController@getModalEditarAvatarUsuarioById');

    Route::post('general/postModalEditarAvatarUsuarioById', 'generalController@postModalEditarAvatarUsuarioById')->name('modalEditarAvatarUsuario');

    Route::get('general/getModalEstadoElemento/{idElemento}/{tipoElemento}', 'generalController@getModalEstadoElemento');

    Route::post('general/postModalEstadoElemento', 'generalController@postModalEstadoElemento')->name('modalEstadoElemento');


    /**
     *******************************************************************************************
     * FIN AREA GENERAL ************************************************************************
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

    Route::get('procesos', 'procesosController@procesos')->name('procesos');

    Route::get('procesos/getViewInfoCaracteristicasProcesoById/{idProceso}', 'procesosController@getViewInfoCaracteristicasProcesoById')->name('getViewInfoCaracteristicasProcesoById');

    Route::get('procesos/getViewInfoValoresProcesoById/{idProceso}', 'procesosController@getViewInfoValoresProcesoById')->name('getViewInfoValoresProcesoById');

    Route::get('procesos/editarEspecimenesProcesos/{idProceso}', 'procesosController@getEditarEspecimenesProcesos')->name('editarEspecimenesProcesos');

    /**
     * AREA PROCESOS  / MODALES ****************************************************************
     */

    Route::get('procesos/modalAgregarProcesos', 'procesosController@getModalAgregarProcesos')->name('modalAgregarProcesos');

    Route::post('procesos/modalAgregarProcesos', 'procesosController@postModalAgregarProcesos')->name('modalAgregarProcesos');

    Route::get('procesos/modalEditarProcesos/{idProceso}', 'procesosController@getModalEditarProcesos');

    Route::post('procesos/modalEditarProcesos', 'procesosController@postModalEditarProcesos')->name('modalEditarProcesos');

    Route::get('procesos/modalAsociarEspecimenProceso/{idEspecimen}/{idProceso}/{tipoEspecimen}/{estado}', 'procesosController@getModalAsociarEspecimenProceso')->name('modalAsociarEspecimenProceso');

    Route::post('procesos/modalAsociarEspecimenProceso', 'procesosController@postModalAsociarEspecimenProceso')->name('modalAsociarEspecimenProceso');


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

    Route::get('configuracion/editargaleriaplanta/{idPlanta}', 'configuracionController@editargaleriaplanta')->name('editargaleriaplanta');

    Route::get('configuracion/editargaleriapez/{idPez}', 'configuracionController@editargaleriapez')->name('editargaleriapez');


    /**
     * AREA CONFIGURACION  / MODALES ****************************************************************
     */

    Route::get('configuracion/modalAgregarUsuario', 'configuracionController@getModalAgregarUsuario')->name('modalAgregarUsuario');

    Route::post('configuracion/modalAgregarUsuario', 'configuracionController@postModalAgregarUsuario')->name('modalAgregarUsuario');

    Route::get('configuracion/modalAgregarPlanta', 'configuracionController@getModalAgregarPlanta')->name('modalAgregarPlanta');

    Route::post('configuracion/modalAgregarPlanta', 'configuracionController@postModalAgregarPlanta')->name('modalAgregarPlanta');

    Route::get('configuracion/modalAgregarPez', 'configuracionController@getModalAgregarPez')->name('modalAgregarPez');

    Route::post('configuracion/modalAgregarPez', 'configuracionController@postModalAgregarPez')->name('modalAgregarPez');

    Route::get('configuracion/modalAgregarImagen/{id}/{tipo}', 'configuracionController@getModalAgregarImagen')->name('modalAgregarImagen');

    Route::post('configuracion/modalAgregarImagen', 'configuracionController@postModalAgregarImagen');

    Route::get('configuracion/modalEstadoGaleria/{idGaleria}/{estado}', 'configuracionController@getModalEstadoGaleria');

    Route::post('configuracion/modalEstadoGaleria', 'configuracionController@postModalEstadoGaleria')->name('modalEstadoGaleria');

    Route::get('configuracion/modalEditarInfoGaleria/{idGaleria}', 'configuracionController@getModalEditarInfoGaleria');

    Route::post('configuracion/modalEditarInfoGaleria', 'configuracionController@postModalEditarInfoGaleria')->name('modalEditarInfoGaleria');

    /**
     * AREA CONFIGURACION  / GRIDS ******************************************************************
     */

    Route::post('configuracion/getUsuarios', 'configuracionController@getUsuarios')->name('getUsuarios');

    Route::post('configuracion/getPlantas', 'configuracionController@getPlantas')->name('getPlantas');

    Route::post('configuracion/getPeces', 'configuracionController@getPeces')->name('getPeces');

    Route::post('configuracion/getPlantasByUsuarioId', 'configuracionController@getPlantasByUsuarioId')->name('getPlantasByUsuarioId');

    Route::post('configuracion/getPlantasByUsuarioIdForProceso/{idProceso}', 'configuracionController@getPlantasByUsuarioIdForProceso')->name('getPlantasByUsuarioIdForProceso');

    Route::post('configuracion/getPecesByUsuarioId', 'configuracionController@getPecesByUsuarioId')->name('getPecesByUsuarioId');

    Route::post('configuracion/getPecesByUsuarioIdForProceso/{idProceso}', 'configuracionController@getPecesByUsuarioIdForProceso')->name('getPecesByUsuarioIdForProceso');

    Route::post('configuracion/getInfoGaleriaPlantaById/{idPlanta}', 'configuracionController@getInfoGaleriaPlantaById')->name('getInfoGaleriaPlantaById');

    Route::post('configuracion/getInfoGaleriaPezById/{idPez}', 'configuracionController@getInfoGaleriaPezById')->name('getInfoGaleriaPezById');

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

    /**
     *******************************************************************************************
     * AREA SOCIAL *****************************************************************************
     *******************************************************************************************
     */

    /**
     * AREA SOCIAL / VISTAS *******************************************************************
     */

    Route::get('social/socialSolicitudes', 'socialController@socialSolicitudes')->name('socialSolicitudes');

    /**
     * AREA SOCIAL / MODALES ******************************************************************
     */

    Route::get('social/modalInfoUsuarioPublicoById/{idUsuario}', 'socialController@getModalInfoUsuarioPublicoById')->name('modalInfoUsuarioPublicoById');

    Route::get('social/modalAgregarColega/{idUsuario}', 'socialController@getModalAgregarColega')->name('modalAgregarColega');

    Route::post('social/modalAgregarColega', 'socialController@postModalAgregarColega')->name('modalAgregarColega');

    /**
     * AREA SOCIAL / GRIDS *********************************************************************
     */

    Route::post('social/getSolicitudesRealizadas', 'socialController@getSolicitudesRealizadas')->name('solicitudesRealizadas');

    Route::post('social/getSolicitudesRecibidas', 'socialController@getSolicitudesRecibidas')->name('solicitudesRecibidas');

    /**
     *******************************************************************************************
     * FIN AREA SOCIAL *************************************************************************
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