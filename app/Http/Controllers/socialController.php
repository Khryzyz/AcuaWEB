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
     *  Metodo del controlador que retorna la vista de solicitudes
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function socialSolicitudes()
    {
        return view('social.socialSolicitudes');
    }

    /**
     *  Metodo del controlador que retorna la vista de listado de colegas
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function socialColegas()
    {
        return view('social.socialColegas');
    }

    /**
     *  Metodo del controlador que retorna la vista de perfil de colega
     *
     * @param $usuarioid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function perfilColega($usuarioid)
    {
        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($usuarioid);

        $data = $dataBL[0];

        return view('social.perfilColega', compact('data'));
    }

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
     * Metodo del controlador que retorna la vista para manejar el estado de la solicitud
     *
     * @param $usuarioid
     * @param $tipo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEstadoSolicitud($usuarioid, $tipo)
    {

        $data = array(
            "usuarioid" => $usuarioid,
            "tipo" => $tipo,
        );

        $data = (object)$data;

        return view('social.modalEstadoSolicitud', compact('data'));

    }

    /**
     * Metodo del controlador que registra un usuario como colega
     *
     * @param Request $rq
     * @return string
     */
    public function postEstadoSolicitud(Request $rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postEditarEstadoSolicitud($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     * Metodo del controlador que retorna la vista para manejar el estado de un colega
     *
     * @param $usuarioid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEstadoColega($usuarioid)
    {

        $data = array(
            "usuarioid" => $usuarioid
        );

        $data = (object)$data;

        return view('social.modalEstadoColega', compact('data'));

    }

    /**
     * Metodo del controlador que elimina un usuario como colega
     *
     * @param Request $rq
     * @return string
     */
    public function postModalEstadoColega(Request $rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postEditarEstadoColega($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR GRID ************************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta las solicitudes realizadas
     *
     * @return array
     */
    public function getSolicitudesRealizadas()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getSolicitudesRealizadas($this->auth->user()->id);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las solicitudes recibidas
     *
     * @return array
     */
    public function getSolicitudesRecibidas()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getSolicitudesRecibidas($this->auth->user()->id);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta la lista de colegas
     *
     * @return array
     */
    public function getListColegas()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getListColegasByUsuarioId($this->auth->user()->id);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de plantas registradas en el sistema por el id del colega
     *
     * @return array
     */
    public function getPlantasByColegaId($usuarioid)
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPlantasByUsuarioId($usuarioid);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registradas en el sistema por el id del colega
     *
     * @return array
     */
    public function getPecesByColegaId($usuarioid)
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPecesByUsuarioId($usuarioid);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR CHARTS ************************************************************
     *******************************************************************************************
     */

}
