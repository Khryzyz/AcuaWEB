<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Utils;

use AquaWebBL;

class pdfController extends Controller
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
     * AREA METODOS USADOS POR VISTAS **********************************************************
     *******************************************************************************************
     */

    /**
     *  Metodo del controlador que retorna la vista de generacion de reporte de especimenes
     *
     * @param $idProceso
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getReporteProceso($idProceso)
    {

        $Bl = new AquaWebBL();

        $dataProcesoBL = $Bl->getInfoProcesoById($idProceso);

        $dataProceso = $dataProcesoBL[0];

        $dataPlanta = $Bl->getInfoPlantaByProcesoId($idProceso);

        $dataPez = $Bl->getInfoPezByProcesoId($idProceso);

        $dataSensores = $Bl->getTiposSensores();

        $dataSensores = (array)$dataSensores;

        $data = [];

        for ($i = 0; $i < count($dataSensores); $i++) {

            $data_aux = [];

            $sensorAux = (array)$dataSensores[$i];

            $dataValores = $Bl->getValuesReporteProcesoById($idProceso, $sensorAux['id']);

            array_push($data_aux, $sensorAux, $dataValores);

            array_push($data, $data_aux);

        }

        //return view('reportes.reporteProceso', compact('dataProceso', 'dataPlanta', 'dataPez', 'data'));

        $reportPDF = \App::make('dompdf.wrapper');

        $view = \View::make('reportes.reporteProceso', compact('dataProceso', 'dataPlanta', 'dataPez', 'data'))->render();

        $reportPDF->loadHTML($view);

        $reportPDF->stream();

        return $reportPDF->download('Reporte Proceso ' . $idProceso . ".pdf");

    }

}
