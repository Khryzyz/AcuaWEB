<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
use Datatables;
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

        //$Bl = new ProcesosBL();

        //$dataProcesos = Datatables::of(\DB::select('CALL getProcesosByIdUsuario(?)', array(3)));

        return Datatables::of(Usuario::query())->make(true);
/*
        return Datatables::of(
            \DB::select(
                'CALL getProcesosByIdUsuario(?)', array(3)
            )
        )
            ->make();
*/
    }


}
