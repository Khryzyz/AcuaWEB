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


        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $data = $dataBL[0];

        return view('configuracion.configuracionPersonal', compact('data'));

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
     *  Metodo del controlador que:
     *  - Retorna la vista de configuracion de plantas por el usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionMisPlantas()
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $data = $dataBL[0];

        return view('configuracion.configuracionMisPlantas', compact('data'));
    }

    /**
     *  Metodo del controlador que:
     *  - Retorna la vista de configuracion de peces registrados por el usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionMisPeces()
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $data = $dataBL[0];

        return view('configuracion.configuracionMisPeces', compact('data'));
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR MODALES *********************************************************
     *******************************************************************************************
     */

    /**
     * Metodo del controlador que retorna el modal para agregar un usuario
     * Usado en Modal
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarUsuario()
    {

        return view('configuracion.modalAgregarUsuario');

    }

    /**
     * Metodo del controlador que retorna el modal para agregar un usuario
     * Usado en Modal
     *
     * @param Request $rq
     * @return string
     */
    public function postModalAgregarUsuario(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postModalAgregarUsuario($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     * Metodo del controlador que retorna el modal para agregar una variedad de planta
     * Usado en Modal
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarPlanta()
    {

        return view('configuracion.modalAgregarPlanta');

    }

    /**
     * Metodo del controlador que retorna el modal para agregar una variedad de planta
     * Usado en Modal
     *
     * @param Request $rq
     * @return string
     */
    public function postModalAgregarPlanta(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postModalAgregarPlanta($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     * Metodo del controlador que retorna el modal para agregar una variedad de pez
     * Usado en Modal
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarPez()
    {

        return view('configuracion.modalAgregarPez');

    }

    /**
     * Metodo del controlador que retorna el modal para agregar una variedad de pez
     * Usado en Modal
     *
     * @param Request $rq
     * @return string
     */
    public function postModalAgregarPez(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postModalAgregarPez($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR GRID ************************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta los usuarios registrados en el sistema
     * Usado en Grid
     *
     * @return array
     */
    public function getUsuarios()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getUsuarios();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de plantas registradas en el sistema
     * Usado en Grid
     *
     * @return array
     */
    public function getPlantas()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPlantas();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registrados en el sistema
     * Usado en Grid
     *
     * @return array
     */
    public function getPeces()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPeces();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de plantas registradas en el sistema por el id del usuario
     * Usado en Grid
     *
     * @return array
     */
    public function getPlantasByUsuarioId()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPlantasByUsuarioId($this->auth->user()->id);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registrados en el sistema por el id del usuario
     * Usado en Grid
     *
     * @return array
     */
    public function getPecesByUsuarioId()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPecesByUsuarioId($this->auth->user()->id);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR DROPDOWN ********************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta los tipos de usuario registrados en el sistema
     * Usado en DropDown
     *
     * @return mixed
     */
    public function getTiposUsuario()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getTiposUsuario();

        //Agregado de opcion por defecto
        array_unshift($data, "Seleccione...");

        return $data;
    }

    /**
     * Metodo que consulta los tipos de exposicion solar registrados en el sistema
     * Usado en DropDown
     *
     * @return mixed
     */
    public function getTiposExpoSolar()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getTiposExpoSolar();

        //Agregado de opcion por defecto
        array_unshift($data, "Seleccione...");

        return $data;
    }

}
