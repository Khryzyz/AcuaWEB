<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Utils;

use AquaWebBL;

class socialController extends Controller
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
     *******************************************************************************************
     * AREA METODOS USADOS POR MODALES *********************************************************
     *******************************************************************************************
     */

    /**
     * Metodo del controlador que consulta la informacion del usuario por su id
     *
     * @param $idUsuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalInfoUsuarioPublicoById($idUsuario)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioPublicoById($idUsuario);

        $data = $dataBL[0];

        return view('social.modalInfoUsuarioPublico', compact('data'));

    }

    /**
     * Metodo del controlador que consulta la informacion del usuario por su id
     *
     * @param $idUsuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarColega($idUsuario)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioPublicoById($idUsuario);

        $conteoBL = $Bl->getConteoSolicitud($this->auth->user()->id, $idUsuario);

        $data = (object)array_merge((array)$dataBL[0], (array)$conteoBL[0]);

        return view('social.modalAgregarColega', compact('data'));

    }

    /**
     * Metodo del controlador que registra un usuario como colega
     *
     * @param Request $rq
     * @return string
     */
    public function postModalAgregarColega(Request $rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postInsertarSolicitud($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR GRID ************************************************************
     *******************************************************************************************
     */

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR CHARTS ************************************************************
     *******************************************************************************************
     */

}
