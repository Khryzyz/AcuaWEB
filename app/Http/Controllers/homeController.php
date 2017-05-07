<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;

use Utils;
use DB;
use Excel;
use aplicacion\Muestras;
use aplicacion\Videos;

class homeController extends Controller
{
    /**
     * Funcion del controlador que solo me retrona la vista principal.
     *
     * @return retorna la vista de las muestras tomadas
     */
    public function index()
    {
        return view('home.index');
    }

}
