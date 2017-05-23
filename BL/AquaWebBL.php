<?php

class AquaWebBL
{

    public function __construct()
    {
    }


    /**
     * Metodo que trae la informacion del usuario
     *
     * @param $idUsuario
     * @return mixed.
     */
    public function getInfoUsuarioById($idUsuario)
    {
        $dataProcesos = \DB::select('CALL getInfoUsuarioById(?)', array($idUsuario));

        return $dataProcesos;
    }

    /**
     * Metodo que consulta los proceso relaciionados con el usuario
     *
     * @param $idUsuario
     * @return mixed
     */
    public function getProcesosByIdUsuario($idUsuario)
    {
        $dataProcesos = \DB::select('CALL getProcesosByIdUsuario(?)', array($idUsuario));

        return $dataProcesos;
    }

}