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
     * Metodo que consulta la informacion del elemento y su asociacion con otros elementos
     *
     * @param $idUsuario
     * @param $tipoElemento
     * @return mixed.
     */
    public function getInfoAsociacionElementos($idElemento, $tipoElemento)
    {
        $data = \DB::select('CALL getInfoAsociacionElementos(?,?)', array($idElemento, $tipoElemento));

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
     * Metodo que consulta las variedades de plantas registradas en el sistema por el id del usuario
     *
     * @return mixed.
     */
    public function getPlantasByUsuarioId($idUsuario)
    {
        $data = \DB::select('CALL getPlantasByUsuarioId(?)', array($idUsuario));

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
     * Metodo que consulta las variedades de peces registrados en el sistema por el id del usuario
     *
     * @return mixed.
     */
    public function getPecesByUsuarioId($idUsuario)
    {
        $data = \DB::select('CALL getPecesByUsuarioId(?)', array($idUsuario));

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
     * Metodo que consulta la informacion del pez por su id
     *
     * @param $idPez
     * @return mixed
     */
    public function getGaleriaPlantaById($idPlanta)
    {
        $data = \DB::select('CALL getGaleriaPlantaById(?)', array($idPlanta));

        return $data;
    }

    /**
     * Metodo que consulta la informacion del pez por su id
     *
     * @param $idPez
     * @return mixed
     */
    public function getGaleriaPezById($idPez)
    {
        $data = \DB::select('CALL getGaleriaPezById(?)', array($idPez));

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
    public function postInsertarProcesos($rq, $idUsuario)
    {
        $result = [];

        $nombre = strtoupper($rq->input('nombre'));
        $descripcion = $rq->input('descripcion');
        $fecha = $rq->input('fecha');
        $area = $rq->input('area');
        $volumen = $rq->input('volumen');

        try {
            $transaction = \DB::select('CALL insDatosProceso(?,?,?,?,?,?)', array($idUsuario,
                    $nombre,
                    $descripcion,
                    $fecha,
                    $area,
                    $volumen)
            );
            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                $result['estado'] = "success";
                $result['mensaje'] = 'Registrado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
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
    public function postInsertarUsuario($rq)
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
            $transaction = \DB::select('CALL insDatosUsuario(?,?,?,?,?,?,?,?)',
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

            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                $result['estado'] = "success";
                $result['mensaje'] = 'Registrado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
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
    public function postInsertarPlanta($rq, $idUsuario)
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
            $transaction = \DB::select('CALL insDatosPlanta(?,?,?,?,?,?,?,?,?,?,?,?,?)',
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
            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                $result['estado'] = "success";
                $result['mensaje'] = 'Registrado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
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
    public function postInsertarPez($rq, $idUsuario)
    {
        $result = [];

        $nombre = strtoupper($rq->input('nombre'));

        $tempvitmin = $rq->input('tempvitmin');
        $tempvitmax = $rq->input('tempvitmax');

        $tempoptmin = $rq->input('tempoptmin');
        $tempoptmax = $rq->input('tempoptmax');

        $porcpromin = $rq->input('porcpromin');
        $porcpromax = $rq->input('porcpromax');

        $nitnat = $rq->input('nitnat');

        $nitri = $rq->input('nitri');

        $oxi = $rq->input('oxi');

        $crepeso = $rq->input('crepeso');

        $cretiempo = $rq->input('cretiempo');

        try {
            $transaction = \DB::select('CALL insDatosPez(?,?,?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $idUsuario,
                    $nombre,
                    $tempvitmin,
                    $tempvitmax,
                    $tempoptmin,
                    $tempoptmax,
                    $porcpromin,
                    $porcpromax,
                    $nitnat,
                    $nitri,
                    $oxi,
                    $crepeso,
                    $cretiempo
                )
            );
            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                $result['estado'] = "success";
                $result['mensaje'] = 'Registrado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'No se registro correctamente' . $e;
        }

        return json_encode($result);

    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS PARA EDITAR INFORMACION *********************************************
     *******************************************************************************************
     */

    /**
     * Metodo que actualiza el estado de un elemento
     *
     * @param $rq
     * @return string
     */
    public function postEditarEstadoElemento($rq)
    {
        $result = [];

        $estadoactual = 1;

        if ($rq->input('estado') == 1) {
            $estadoactual = 2;
        }

        $elemento = $rq->input('elemento');

        $id = $rq->input('id');

        try {
            $transaction = \DB::select('CALL updEstadoElemento(?,?,?)', array(
                    $estadoactual,
                    $elemento,
                    $id
                )
            );
            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                $result['estado'] = "success";
                $result['mensaje'] = 'Actualizado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'No se actualizó correctamente';
        }
        return json_encode($result);
    }

    /**
     * Metodo que actualiza la informacion de un especimen
     *
     * @param $rq
     * @return string
     */
    public function postEditarPez($rq)
    {
        $result = [];

        $id = $rq->input('pezid');

        $nombre = strtoupper($rq->input('nombre'));

        $tempvitmin = $rq->input('tempvitmin');
        $tempvitmax = $rq->input('tempvitmax');

        $tempoptmin = $rq->input('tempoptmin');
        $tempoptmax = $rq->input('tempoptmax');

        $porcpromin = $rq->input('porcpromin');
        $porcpromax = $rq->input('porcpromax');

        $nitnat = $rq->input('nitnat');

        $nitri = $rq->input('nitri');

        $oxi = $rq->input('oxi');

        $crepeso = $rq->input('crepeso');

        $cretiempo = $rq->input('cretiempo');

        try {
            $transaction = \DB::select('CALL updDatosPez(?,?,?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $id,
                    $nombre,
                    $tempvitmin,
                    $tempvitmax,
                    $tempoptmin,
                    $tempoptmax,
                    $porcpromin,
                    $porcpromax,
                    $nitnat,
                    $nitri,
                    $oxi,
                    $crepeso,
                    $cretiempo
                )
            );
            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                $result['estado'] = "success";
                $result['mensaje'] = 'Actualizado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'No se actualizó correctamente' . $e;
        }

        return json_encode($result);
    }

}