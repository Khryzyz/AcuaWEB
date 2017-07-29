<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Utils;

use AquaWebBL;

class procesosController extends Controller
{

    protected $auth;

    /**
     * Constructor de la clase que recibe las variables de autenticacion
     *
     * procesosController constructor.
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR VISTAS **********************************************************
     *******************************************************************************************
     */

    /**
     * Metodo del controlador que:
     *  - consulta la informacion del usuario por su id
     *  - Retorna la vista junto con la informacion del usuario
     * Usado en Vista
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function procesos()
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $data = $dataBL[0];

        return view('procesos.procesos', compact('data'));

    }

    /**
     * Metodo del controlador que:
     *  - consulta la informacion del proceso por su id
     *  - Retorna la vista junto con la informacion del proceso
     * Usado en Vista
     *
     * @param $idProceso
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewInfoCaracteristicasProcesoById($idProceso)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoProcesoById($idProceso);

        $data = $dataBL[0];

        return view('procesos.infoCaracteristicasProceso', compact('data'));

    }

    /**
     * Metodo del controlador que:
     *  - consulta la informacion del proceso por su id
     *  - Retorna la vista junto con la informacion del proceso
     * Usado en Vista
     *
     * @param $idProceso
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewInfoValoresProcesoById($idProceso)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoProcesoById($idProceso);

        $data = $dataBL[0];

        return view('procesos.infoValoresProceso', compact('data'));

    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR MODALES *********************************************************
     *******************************************************************************************
     */

    /**
     * Metodo del controlador que:
     *  - consulta la informacion de la planta por su id
     *  - Retorna la vista junto con la informacion de la planta
     * Usado en Modal
     *
     * @param $idPlanta
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalInfoPlantaById($idPlanta)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoPlantaById($idPlanta);

        $data = $dataBL[0];

        return view('layouts.Modals.modalInfoPlanta', compact('data'));

    }

    /**
     * Metodo del controlador que:
     *  - consulta la informacion de la planta por su id
     *  - Retorna la vista junto con la informacion de la planta
     * Usado en Modal
     *
     * @param $idPez
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalInfoPezById($idPez)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoPezById($idPez);

        $data = $dataBL[0];

        return view('layouts.Modals.modalInfoPez', compact('data'));

    }

    /**
     * Metodo del controlador que retorna el modal para agregar un proceso
     * Usado en Modal
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarProcesos()
    {
        return view('procesos.modalAgregarProceso');
    }

    /**
     * Metodo del controlador que retorna el modal para agregar un proceso
     * Usado en Modal
     *
     * @param Request $rq
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postModalAgregarProcesos(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postInsertarProcesos($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR GRID ************************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta los procesos por el id del usuario relacionado
     * Usado en Grid
     *
     * @param $idUsuario
     * @return array
     */
    public function getProcesosByIdUsuario($idUsuario)
    {

        $Bl = new AquaWebBL();

        $dataGrid = $Bl->getProcesosByIdUsuario($idUsuario);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }

    /**
     * Metodo que consulta las plantas por el id del proceso relacionado
     * Usado en Grid
     *
     * @param $idProceso
     * @return array
     */
    public function getInfoPlantaByProcesoId($idProceso)
    {

        $Bl = new AquaWebBL();

        $dataGrid = $Bl->getInfoPlantaByProcesoId($idProceso);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }

    /**
     * Metodo que consulta los peces por el id del proceso relacionado
     * Usado en Grid
     *
     * @param $idProceso
     * @return array
     */
    public function getInfoPezByProcesoId($idProceso)
    {

        $Bl = new AquaWebBL();

        $dataGrid = $Bl->getInfoPezByProcesoId($idProceso);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }

    /**
     * Metodo que consulta los valores del proceso por su id
     * Usado en Grid
     *
     * @param $idProceso
     * @param $idTipoSensor
     * @return array
     */
    public function getValuesProcesoByIdForGrid(Request $rq, $idProceso, $idTipoSensor)
    {

        $Bl = new AquaWebBL();

        $dataGrid = $Bl->getValuesProcesoById($idProceso, $idTipoSensor);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR CHARTS ************************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta los valores del proceso por su id
     * Usado en Chart
     *
     * @param $idProceso
     * @param $idTipoSensor
     * @return array
     */
    public function getValuesProcesoByIdForChart($idProceso, $idTipoSensor)
    {

        $Bl = new AquaWebBL();

        $dataChart = $Bl->getValuesProcesoById($idProceso, $idTipoSensor);

        return $dataChart;

    }
}
