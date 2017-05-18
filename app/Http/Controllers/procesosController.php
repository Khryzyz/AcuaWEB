<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;
use Utils;
use ProcesosBL;

class procesosController extends Controller
{
    /**
     * Funcion del controlador que solo me retrona la vista principal.
     *
     * @return retorna la vista de las muestras tomadas
     */
    public function index()
    {
        return view('procesos.index');
    }

    public function getProcesosByIdUsuario(Request $rq)
    {

        $Bl = new ProcesosBL();

        $dataGrid = $Bl->getProcesosByIdUsuario(3);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }


}
