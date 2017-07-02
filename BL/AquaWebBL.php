<?php

class AquaWebBL
{

    public function __construct()
    {
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS PARA CONSULTAR INFORMACION ******************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta los usuarios registrados en el sistema
     *
     * @return mixed.
     */
    public function getUsuarios()
    {
        $data = \DB::select('CALL getUsuarios()', array());

        return $data;
    }

    /**
     * Metodo que consulta los tipos de usuario registrados en el sistema
     *
     * @return mixed.
     */
    public function getTiposUsuario()
    {
        $data = \DB::select('CALL getTiposUsuario()', array());

        return $data;
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
     * Metodo que consulta las variedades de plantas registradas en el sistema
     *
     * @return mixed.
     */
    public function getPlantas()
    {
        $data = \DB::select('CALL getPlantas()', array());

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
     * Metodo que consulta las variedades de peces registrados en el sistema
     *
     * @return mixed.
     */
    public function getPeces()
    {
        $data = \DB::select('CALL getPeces()', array());

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
     * Metodo que consulta los tipos de exposicion solar registrados en el sistema
     *
     * @return mixed.
     */
    public function getTiposExpoSolar()
    {
        $data = \DB::select('CALL getTiposExpoSolar()', array());

        return $data;
    }

    /**
     * Metodo que consulta los valores del proceso por su id
     *
     * @param $idProceso
     * @param $idTipoSensor
     * @return mixed
     */
    public function getValuesProcesoById($idProceso, $idTipoSensor)
    {
        $data = \DB::select('CALL getValuesProcesoById(?,?)', array($idProceso, $idTipoSensor));

        return $data;
    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS PARA REGISTAR INFORMACION *******************************************
     *******************************************************************************************
     */

    /**
     * Metodo que registra un proceso
     *
     * @param $rq
     * @return string
     */
    public function postModalAgregarProcesos($rq, $idUsuario)
    {
        $result = [];

        $nombre = strtoupper($rq->input('nombre'));
        $descripcion = $rq->input('descripcion');
        $fecha = $rq->input('fecha');
        $area = $rq->input('area');
        $volumen = $rq->input('volumen');

        try {
            $insTransaction = \DB::select('CALL insDatosProceso(?,?,?,?,?,?)', array($idUsuario, $nombre, $descripcion, $fecha, $area, $volumen));
            $result['estado'] = true;
            $result['mensaje'] = 'Registrado correctamente';
        } catch (Exception $e) {
            $result['estado'] = false;
            $result['mensaje'] = 'No se registro correctamente';
        }
        return json_encode($result);

    }

    /**
     * Metodo que registra un usuario
     *
     * @param $rq
     * @return string
     */
    public function postModalAgregarUsuario($rq)
    {
        $result = [];

        $usuario = strtoupper($rq->input('usuario'));
        $pass = bcrypt($rq->input('pass'));
        $email = $rq->input('email');
        $primernombre = $rq->input('primernombre');
        $segundonombre = $rq->input('segundonombre');
        $primerapellido = $rq->input('primerapellido');
        $segundoapellido = $rq->input('segundoapellido');
        $tiposUsuario = $rq->input('tiposUsuario');


        try {
            $insTransaction = \DB::select('CALL insDatosUsuario(?,?,?,?,?,?,?,?)',
                array(
                    $usuario,
                    $pass,
                    $email,
                    $primernombre,
                    $segundonombre,
                    $primerapellido,
                    $segundoapellido,
                    $tiposUsuario
                )
            );
            $result['estado'] = true;
            $result['mensaje'] = 'Registrado correctamente';
        } catch (Exception $e) {
            $result['estado'] = false;
            $result['mensaje'] = 'No se registro correctamente';
        }
        return json_encode($result);

    }

    /**
     * Metodo que registra una variedad de planta
     *
     * @param $rq
     * @return string
     */
    public function postModalAgregarPlanta($rq, $idUsuario)
    {

        $result = [];

        $nombre = strtoupper($rq->input('nombre'));

        $phmin = $rq->input('phmin');
        $phmax = $rq->input('phmax');

        $plantmin = $rq->input('plantmin');
        $plantmax = $rq->input('plantmax');

        $germin = $rq->input('germin');
        $germax = $rq->input('germax');

        $cremin = $rq->input('cremin');
        $cremax = $rq->input('cremax');

        $tempmin = $rq->input('tempmin');
        $tempmax = $rq->input('tempmax');

        $expsolar = $rq->input('expsolar');

        try {
            $insTransaction = \DB::select('CALL insDatosPlanta(?,?,?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $idUsuario,
                    $nombre,
                    $phmin,
                    $phmax,
                    $plantmin,
                    $plantmax,
                    $germin,
                    $germax,
                    $cremin,
                    $cremax,
                    $tempmin,
                    $tempmax,
                    $expsolar
                )
            );
            $result['estado'] = true;
            $result['mensaje'] = 'Registrado correctamente';
        } catch (Exception $e) {
            $result['estado'] = false;
            $result['mensaje'] = 'No se registro correctamente';
        }
        return json_encode($result);

    }

    /**
     * Metodo que registra una variedad de pez
     *
     * @param $rq
     * @return string
     */
    public function postModalAgregarPez($rq, $idUsuario)
    {
        $result = [];

        $usuario = strtoupper($rq->input('usuario'));
        $pass = bcrypt($rq->input('pass'));
        $email = $rq->input('email');
        $primernombre = $rq->input('primernombre');
        $segundonombre = $rq->input('segundonombre');
        $primerapellido = $rq->input('primerapellido');
        $segundoapellido = $rq->input('segundoapellido');
        $tiposUsuario = $rq->input('tiposUsuario');


        try {
            $insTransaction = \DB::select('CALL insDatosUsuario(?,?,?,?,?,?,?,?)',
                array(
                    $usuario,
                    $pass,
                    $email,
                    $primernombre,
                    $segundonombre,
                    $primerapellido,
                    $segundoapellido,
                    $tiposUsuario
                )
            );
            $result['estado'] = true;
            $result['mensaje'] = 'Registrado correctamente';
        } catch (Exception $e) {
            $result['estado'] = false;
            $result['mensaje'] = 'No se registro correctamente';
        }
        return json_encode($result);

    }

}