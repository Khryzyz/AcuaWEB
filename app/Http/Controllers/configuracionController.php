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

class configuracionController extends Controller
{
    public function configuracionProcesos()
    {
        return view('configuracion.configuracionProcesos');
    }

    public function configuracionPlantas()
    {
        return view('configuracion.configuracionPlantas');
    }

    public function configuracionPeces()
    {
        return view('configuracion.configuracionPeces');
    }

}
