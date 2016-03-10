<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
use DataSourceResult;
use Kendo\Data\DataSource;

use Utils;


class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.testmodal');
    }

    /**
     * funcion que me carga el modal para el text es llamada por get
     * 
     * @return retorna la vista que sera cargada en el modal
     */
    public function modalTest()
    {
        return view('main.modalTest');
    }

    /**
     * Funcion que me carga el modal para el ejemplo con formulario (entra por get)
     * 
     * @return retorna la vista que sera cargada en el modal
     */
    public function getModalFormulario()
    {
        return view('main.modalformulario');
    }

    /**
     * Funcion que me carga el modal para el ejemplo con formulario (entra por get)
     * 
     * @return retorna la vista que sera cargada en el modal
     */
    public function getViewProcedimientos()
    {


        return view('main.testProcedimientos');


    }

    /**
     * Funcion que procesa los datos enviados desde el modal que contiene un formulario entra por post
     * 
     * @param $rq -> este parametro recibe los datos enviados por el formulario para ser usado
     * 
     * @return $restult -> json que contiene el estatus de la operacion, mensaje opcional, y los datos de que se deseen regresar
     */

    public function postMamodalFormulario(Request $rq)
    {
        $result['status'] = true;
        $result['mensaje'] = 'llego bien';
        return json_encode($result);
    }

    

    public function postPrubaproce(Request $rq)
    {

     $prueba = \DB::select('CALL getDatosPrueba');
    
     $request = file_get_contents('php://input');

    $input = json_decode($request);

    $util = new Utils();

    $data = $util->getDataRequest($prueba,$input);

    //dd($data);

     return $util->getDataRequest($prueba,$input);

       // return $prueba;
     
    }


 

}
