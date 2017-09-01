<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Utils;

use AquaWebBL;

class generalController extends Controller
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
     * Metodo del controlador que consulta la informacion del especimen por su id
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
     * Metodo del controlador que consulta la informacion de la galeria del especimen por su id
     *
     * @param $idPlanta
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalGaleriaPlantaById($idPlanta)
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getGaleriaPlantaById($idPlanta);

        return view('layouts.Modals.modalGaleriaPlanta', compact('data'));

    }

    /**
     * Metodo del controlador que consulta la informacion del especimen por su id
     *
     * @param $idPlanta
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEditarPlantaById($idPlanta)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoPlantaById($idPlanta);

        $data = $dataBL[0];

        return view('layouts.Modals.modalEditarPlanta', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para actualizar el especimen
     *
     * @param $rq
     * @return string
     */
    public function postModalEditarPlantaById(Request $rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postEditarPlanta($rq);

        return $result;

    }

    /**
     * Metodo del controlador que consulta la informacion del especimen por su id
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
     * Metodo del controlador que consulta la informacion de la galeria del especimen por su id
     *
     * @param $idPez
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalGaleriaPezById($idPez)
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getGaleriaPezById($idPez);

        return view('layouts.Modals.modalGaleriaPez', compact('data'));

    }

    /**
     * Metodo del controlador que consulta la informacion del especimen por su id
     *
     * @param $idPez
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEditarPezById($idPez)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoPezById($idPez);

        $data = $dataBL[0];

        return view('layouts.Modals.modalEditarPez', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para actualizar el especimen
     *
     * @param $rq
     * @return string
     */
    public function postModalEditarPezById(Request $rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postEditarPez($rq);

        return $result;

    }

    /**
     * Metodo del controlador que consulta la informacion del usuario por su id
     *
     * @param $idUsuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalInfoUsuarioById($idUsuario)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($idUsuario);

        $data = $dataBL[0];

        return view('layouts.Modals.modalInfoUsuario', compact('data'));

    }

    /**
     * Metodo del controlador que consulta la informacion del usuario por su id
     *
     * @param $idUsuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEditarUsuarioById($idUsuario)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($idUsuario);

        $data = $dataBL[0];

        return view('layouts.Modals.modalEditarUsuario', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para actualizar el usuario
     *
     * @param $rq
     * @return string
     */
    public function postModalEditarUsuarioById(Request $rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postEditarUsuario($rq);

        return $result;

    }

    /**
     * Metodo del controlador que consulta la informacion del usuario por su id
     *
     * @param $idUsuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEditarPassUsuarioById($idUsuario)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($idUsuario);

        $data = $dataBL[0];

        return view('layouts.Modals.modalEditarPassUsuario', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para actualizar el pass del usuario
     *
     * @param $rq
     * @return string
     */
    public function postModalEditarPassUsuarioById(Request $rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postEditarPassUsuarioById($rq);

        return $result;

    }

    /**
     * Metodo del controlador que consulta la informacion del usuario por su id
     *
     * @param $idUsuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEditarAvatarUsuarioById($idUsuario)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($idUsuario);

        $data = $dataBL[0];

        return view('layouts.Modals.modalEditarAvatarUsuario', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para actualizar el avatar del usuario
     *
     * @param $rq
     * @return string
     */
    public function postModalEditarAvatarUsuarioById(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postEditarAvatarUsuario($rq);

        $result_decode = json_decode($result);

        if ($result_decode->codigo) {

            $file = $rq->file('avatar');

            $extension = pathinfo($rq->file('avatar')->getClientOriginalName(), PATHINFO_EXTENSION);

            $file->move('img/avatar', $result_decode->codigo . "." . $extension);
        }

        return $result;

    }

    /**
     * Metodo del controlador que consulta la informacion de la relacion de los especimenes
     *
     * @param $idElemento
     * @param $tipoElemento
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEstadoElemento($idElemento, $tipoElemento)
    {
        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoAsociacionElementos($idElemento, $tipoElemento);

        $data = $dataBL[0];

        return view('layouts.Modals.modalEstadoElemento', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para actualizar el estado de un elemento
     *
     * @param $rq
     * @return string
     */
    public function postModalEstadoElemento(Request $rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postEditarEstadoElemento($rq);

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

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR DROPDOWNS *********************************************************
     *******************************************************************************************
     */

}
