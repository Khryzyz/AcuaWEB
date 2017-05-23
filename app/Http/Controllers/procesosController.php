<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Utils;

use AquaWebBL;

class procesosController extends Controller
{

    /*CONSTRUCTOR DEL AUTH ######################################### */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Funcion del controlador que solo me retrona la vista principal.
     *
     * @return retorna la vista de las muestras tomadas
     */
    public function index()
    {

        $Bl = new AquaWebBL();

        $dataUsuario = $Bl->getInfoUsuarioById($this->auth->user()->id);

        return view('procesos.index', compact('dataUsuario'));

    }

    public function getProcesosByIdUsuario(Request $rq, $idUsuario)
    {

        $Bl = new AquaWebBL();

        $dataGrid = $Bl->getProcesosByIdUsuario($idUsuario);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }


}
