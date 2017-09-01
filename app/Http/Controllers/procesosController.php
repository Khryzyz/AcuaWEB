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
     * Metodo del controlador que retorna la vista de procesos
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
     * Metodo del controlador que consulta la informacion del proceso por su id
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
     * Metodo del controlador que consulta la informacion del proceso por su id
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
     * Metodo del controlador que consulta la informacion del proceso por su id
     *
     * @param $idProceso
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditarEspecimenesProcesos($idProceso)
    {
        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoProcesoById($idProceso);

        $data = $dataBL[0];

        return view('procesos.editarEspecimenesProceso', compact('data'));
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR MODALES *********************************************************
     *******************************************************************************************
     */

    /**
     * Metodo del controlador que retorna el modal para agregar un proceso
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarProcesos()
    {
        return view('procesos.modalAgregarProceso');
    }

    /**
     * Metodo del controlador que recibe la informacion para agregar un proceso
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
     * Metodo del controlador que retorna el modal para editar un proceso
     *
     * @param $idProceso
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEditarProcesos($idProceso)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoProcesoById($idProceso);

        $data = $dataBL[0];

        return view('procesos.modalEditarProceso', compact('data'));
    }

    /**
     * Metodo del controlador que recibe la informacion para editar un proceso
     *
     * @param Request $rq
     * @return string
     */
    public function postModalEditarProcesos(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postEditarProcesos($rq);

        return $result;
    }

    /**
     * Metodo del controlador que retorna el modal para asociar un especimen a un proceso
     *
     * @param $idEspecimen
     * @param $idProceso
     * @param $tipoEspecimen
     * @param $estado
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAsociarEspecimenProceso($idEspecimen, $idProceso, $tipoEspecimen, $estado)
    {
        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoAsociacionElementosForProceso($idEspecimen, $idProceso, $tipoEspecimen, $estado);

        $data = $dataBL[0];

        return view('procesos.modalAsociacionElemento', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para asociar un especimen a un proceso
     *
     * @param Request $rq
     * @return string
     */
    public function postModalAsociarEspecimenProceso(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postInfoAsociacionElementosForProceso($rq);

        return $result;
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR GRID ************************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta los procesos por el id del usuario relacionado
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
     * Metodo que consulta los valores del proceso por su id y tipo de sensor
     *
     * @param $idProceso
     * @param $idTipoSensor
     * @return array
     */
    public function getValuesProcesoByIdForGrid($idProceso, $idTipoSensor)
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
     * Metodo que consulta los valores del proceso por su id y tipo de sensor
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
