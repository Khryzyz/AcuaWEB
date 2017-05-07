<?php

class ProcesosBL
{

    public function __construct()
    {
    }

    public function getProcesosByIdUsuario($idUsuario)
    {
        $dataProcesos = \DB::select('CALL getProcesosByIdUsuario(?)', array($idUsuario));

        return $dataProcesos;
    }
}