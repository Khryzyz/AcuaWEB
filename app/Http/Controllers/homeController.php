<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Utils;

use AquaWebBL;

class homeController extends Controller
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
     * Metodo del controlador que retorna la vista principal
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $dataRegisters = $Bl->getInfoUsuariosRegistrados($this->auth->user()->id);

        $registers = $dataRegisters;

        $data = $dataBL[0];

        return view('home.index', compact('data', 'registers'));

    }

}
