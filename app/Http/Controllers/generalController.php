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
     * Metodo del controlador que:
     *  - consulta la informacion de la planta por su id
     *  - Retorna la vista junto con la informacion de la planta
     * Usado en Modal
     *
     * @param $rq
     * @return string
     */
    public function postModalEditarPlantaById($rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postModalAgregarUsuario($rq);

        return $result;
    }

    /**
     * Metodo del controlador que:
     *  - consulta la informacion del pez por su id
     *  - Retorna la vista junto con la informacion del pez
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
     * Metodo del controlador que:
     *  - consulta la informacion del pez por su id
     *  - Retorna la vista junto con la informacion del pez
     * Usado en Modal
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
     * Metodo del controlador que:
     *  - consulta la informacion del pez por su id
     *  - Retorna la vista junto con la informacion del pez
     * Usado en Modal
     *
     * @param $rq
     * @return string
     */
    public function postModalEditarPezById($rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postModalAgregarUsuario($rq);

        return $result;

    }

    /**
     * Metodo del controlador que:
     *  - consulta la informacion del usuario por su id
     *  - Retorna la vista junto con la informacion del usuario
     * Usado en Modal
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
     * Metodo del controlador que:
     *  - consulta la informacion del usuario por su id
     *  - Retorna la vista junto con la informacion del usuario
     * Usado en Modal
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
     * Metodo del controlador que:
     *  - consulta la informacion del usuario por su id
     *  - Retorna la vista junto con la informacion del usuario
     * Usado en Modal
     *
     * @param $rq
     * @return string
     */
    public function postModalEditarUsuarioById($rq)
    {
        $Bl = new AquaWebBL();

        $result = $Bl->postModalAgregarUsuario($rq);

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
