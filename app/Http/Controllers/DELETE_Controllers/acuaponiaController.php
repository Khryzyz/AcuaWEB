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

class acuaponiaController extends Controller
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


    public function vindex()
    {
        return view('videos.index');
    }

    public function vcontrol()
    {
        return view('control.index');
    }

    public function GetDatosMuestraGrid()
    {

        $datos = Muestras::orderBy('fecha', 'desc')->get();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);
    }


    public function GetDatosVideosGrid()
    {

        $datos = Videos::where('estado', 1)->orderBy('fecha', 'desc')->get();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);
    }


    public function getModalVideo($id)
    {

        $datos = Videos::where('idvideos', '=' ,$id)->get();

        return view('videos.modaldetallevideo', compact('datos'));
    }


    public function getmodalisertvideo()
    {
        return view('videos.modalinsertarvideo');
    }

    public function insmodalisertvideo(Request $rq)
    {
        DB::table('videos')->insert(
            ['nombre' => $rq->input('nombre'), 'descripcion' => $rq->input('descripcion'), 'urlyoutube'=> $rq->input('idyoutube')]
            );
        $result['estado'] = true;
        $result['mensaje'] = 'Video agregado correctamente';
        return json_encode($result);
    }



    public function GetDataGrafi()
    {

        $datos = DB::table('msensores')
        ->orderBy('fecha', 'desc')
        ->skip(0)
        ->take(24)
        ->get();
        //dd($datos);
        return $datos;
    }




    public function GetBideoData(Request $rq)
    {
        $datos = DB::table('msensores')
        ->orderBy('fecha', 'desc')
        ->first();


        $datos1 = DB::table('msensores')
        ->orderBy('fecha', 'desc')
        ->skip(0)
        ->take(24)
        ->get();

        $data = json_decode($rq->getContent());

        $fecha_vieja = $data->fecha;
        $fecha_nueva = $datos->fecha;

        if($fecha_vieja < $fecha_nueva)
        {
            $result['estado']=true;
            $result['result']= $datos1;
        }
        else
        {
            $result['estado']=false;
        }

        return json_encode($result);

    }

    public function getExcel()
    {
        Excel::create('Datos de la muestra', function($excel) {

            $excel->sheet('Productos', function($sheet) {

                $products =  Muestras::all();

                $sheet->fromArray($products);

            });
        })->export('xls');
    }

    public function delVideo(Request $rq)
    {
        $datos = Videos::find($rq->input('id'));
        $datos->estado = 2;
        $datos->save();
        $result['estado'] = true;
        $result['mensaje'] = 'Se elimino correctamente';
        return json_encode($result);
    }

    public function getModalEditaVideo($id)
    {
        $datos = Videos::find($id);
        return view('videos.modaleditavideo', compact('datos'));
    }

    public function postModalEditaVideo(Request $rq)
    {
        
        $datos = Videos::find($rq->input('idvideos'));
        $datos->nombre = $rq->input('nombre');
        $datos->descripcion = $rq->input('descripcion');
        $datos->urlyoutube = $rq->input('urlyoutube');
        $datos->fecha = date("Y-m-d H:i:s");
        $datos->save();
        $result['estado'] = true;
        $result['mensaje'] = 'Se actualizo conrrectamente';
        return json_encode($result);
    }
}
