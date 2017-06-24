<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Utils;

use AquaWebBL;

class configuracionController extends Controller
{

    protected $auth;

    /**
     * Constructor de la clase que recibe las variables de autenticacion
     *
     * configuracionController constructor.
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
     *  Metodo del controlador que:
     *  - Retorna la vista de configuracion de usuarios
     *
     * Usado en Vista
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionUsuarios()
    {
        return view('configuracion.configuracionUsuarios');
    }

    /**
     *  Metodo del controlador que:
     *  - Retorna la vista de configuracion de informacion personal de usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionPersonal()
    {
        return view('configuracion.configuracionPersonal');
    }

    /**
     *  Metodo del controlador que:
     *  - Retorna la vista de configuracion de plantas
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionPlantas()
    {
        return view('configuracion.configuracionPlantas');
    }

    /**
     *  Metodo del controlador que:
     *  - Retorna la vista de configuracion de peces
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionPeces()
    {
        return view('configuracion.configuracionPeces');
    }
    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR MODALES *********************************************************
     *******************************************************************************************
     */

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR GRID ************************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta los usuarios registrados en el sistema
     * Usado en Grid
     *
     * @param Request $rq
     * @return array
     */
    public function getUsuarios(Request $rq)
    {

        $Bl = new AquaWebBL();

        $dataGrid = $Bl->getUsuarios();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }

    /**
     * Metodo que consulta las variedades de plantas registradas en el sistema
     * Usado en Grid
     *
     * @param Request $rq
     * @return array
     */
    public function getPlantas(Request $rq)
    {

        $Bl = new AquaWebBL();

        $dataGrid = $Bl->getPlantas();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registrados en el sistema
     * Usado en Grid
     *
     * @param Request $rq
     * @return array
     */
    public function getPeces(Request $rq)
    {

        $Bl = new AquaWebBL();

        $dataGrid = $Bl->getPeces();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }

}
