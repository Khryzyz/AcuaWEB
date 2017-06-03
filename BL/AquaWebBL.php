<?php

class AquaWebBL
{

    public function __construct()
    {
    }


    /**
     * Metodo que consulta la informacion del usuario por su id
     *
     * @param $idUsuario
     * @return mixed.
     */
    public function getInfoUsuarioById($idUsuario)
    {
        $data = \DB::select('CALL getInfoUsuarioById(?)', array($idUsuario));

        return $data;
    }

    /**
     * Metodo que consulta los procesos por el id del usuario relacionados
     *
     * @param $idUsuario
     * @return mixed
     */
    public function getProcesosByIdUsuario($idUsuario)
    {
        $data = \DB::select('CALL getProcesosByIdUsuario(?)', array($idUsuario));

        return $data;
    }

    /**
     * Metodo que consulta la informacion del proceso por su id
     *
     * @param $idUsuario
     * @return mixed
     */
    public function getInfoProcesoById($idProceso)
    {
        $data = \DB::select('CALL getInfoProcesoById(?)', array($idProceso));

        return $data;
    }

    /**
     * Metodo que consulta las plantas por el id del proceso relacionado
     *
     * @param $idProceso
     * @return mixed
     */
    public function getInfoPlantaByProcesoId($idProceso)
    {
        $data = \DB::select('CALL getInfoPlantaByProcesoId(?)', array($idProceso));

        return $data;
    }

    /**
     * Metodo que consulta los peces por el id del proceso relacionado
     *
     * @param $idProceso
     * @return mixed
     */
    public function getInfoPezByProcesoId($idProceso)
    {
        $data = \DB::select('CALL getInfoPezByProcesoId(?)', array($idProceso));

        return $data;
    }

    /**
     * Metodo que consulta la informacion de la planta por su id
     *
     * @param $idPlanta
     * @return mixed
     */
    public function getInfoPlantaById($idPlanta)
    {
        $data = \DB::select('CALL getInfoPlantaById(?)', array($idPlanta));

        return $data;
    }

    /**
     * Metodo que consulta la informacion del pez por su id
     *
     * @param $idPez
     * @return mixed
     */
    public function getInfoPezById($idPez)
    {
        $data = \DB::select('CALL getInfoPezById(?)', array($idPez));

        return $data;
    }

    /**
     * Metodo que consulta los valores del proceso por su id
     *
     * @param $idProceso
     * @param $idTipoSensor
     * @return mixed
     */
    public function getValuesProcesoById($idProceso,$idTipoSensor)
    {
        $data = \DB::select('CALL getValuesProcesoById(?,?)', array($idProceso,$idTipoSensor));

        return $data;
    }

}