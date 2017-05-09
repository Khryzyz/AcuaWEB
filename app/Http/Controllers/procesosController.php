<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
//use Datatables;
use aplicacion\Usuario;
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

    public function getProcesosByIdUsuario()
    {

        $Bl = new ProcesosBL();

        $dataProcesos = $Bl->getProcesosByIdUsuario(3);

        return json_encode(["data" => $dataProcesos]);


        //$query = Usuario::all();

        //return json_encode(["data" => $query]);

    }


}
