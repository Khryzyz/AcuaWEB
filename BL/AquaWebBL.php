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
     * CONSULTAS A USUARIOS ********************************************************************
     */

    /**
     * Metodo que consulta los usuarios registrados en el sistema
     *
     * @return mixed
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
     * Metodo que consulta la informacion del usuario por id
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
     * Metodo que consulta la informacion del usuario por id
     *
     * @param $idUsuario
     * @return mixed.
     */
    public function getInfoUsuarioPublicoById($idUsuario)
    {
        $data = \DB::select('CALL getInfoUsuarioPublicoById(?)', array($idUsuario));

        return $data;
    }

    /**
     * Metodo que consulta la informacion de los usuarios registrados
     *
     * @param $idUsuario
     * @return mixed.
     */
    public function getInfoUsuariosRegistrados($idUsuario)
    {
        $data = \DB::select('CALL getInfoUsuariosRegistrados(?)', array($idUsuario));

        return $data;
    }

    /**
     * Metodo que registra la asociacion deun especimen a un proceso
     *
     * @param $rq
     * @return string
     */
    public function postInfoAsociacionElementosForProceso($rq)
    {
        $result = [];

        $id = $rq->input('id');
        $elementotipo = $rq->input('elementotipo');
        $procesoid = $rq->input('procesoid');
        $asociado = $rq->input('asociado');
        $porcentaje = $rq->input('porcentaje');

        try {
            $transaction = \DB::select('CALL regEspecimenesForProceso(?,?,?,?,?)', array(
                    $id,
                    $elementotipo,
                    $procesoid,
                    $asociado,
                    $porcentaje)
            );
            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                if ($asociado == 1) {
                    $result['estado'] = "success";
                    $result['mensaje'] = 'Especimen asociado correctamente';
                } else {
                    $result['estado'] = "success";
                    $result['mensaje'] = 'Especimen retirado correctamente';
                }
            }
        } catch (Exception $e) {
            if ($asociado == 1) {
                $result['estado'] = "error";
                $result['mensaje'] = 'Especimen NO se asoció correctamente' . $e;
            } else {
                $result['estado'] = "error";
                $result['mensaje'] = 'Especimen NO se retiró correctamente' . $e;
            }
        }
        return json_encode($result);

    }

    /**
     * Metodo que consulta los procesos por el id del usuario
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
     * CONSULTAS A PLANTAS *********************************************************************
     */

    /**
     * Metodo que consulta las plantas registradas en el sistema
     *
     * @return mixed.
     */
    public function getPlantas()
    {
        $data = \DB::select('CALL getPlantas()', array());

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
     * Metodo que consulta las plantas registradas en el sistema por el id del usuario
     *
     * @return mixed.
     */
    public function getPlantasByUsuarioId($idUsuario)
    {
        $data = \DB::select('CALL getPlantasByUsuarioId(?)', array($idUsuario));

        return $data;
    }

    /**
     * Metodo que consulta las plantas por el id del proceso
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
     * Metodo que consulta las variedades de plantas registradas en el sistema por el id del proceso
     *
     * @return mixed.
     */
    public function getPlantasByUsuarioIdForProceso($idUsuario, $idProceso)
    {
        $data = \DB::select('CALL getPlantasByUsuarioIdForProceso(?,?)', array($idUsuario, $idProceso));

        return $data;
    }

    /**
     * CONSULTAS A PECES ***********************************************************************
     */

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
     * Metodo que consulta los peces registrados en el sistema por el id del proceso
     *
     * @return mixed.
     */
    public function getPecesByUsuarioIdForProceso($idUsuario, $idProceso)
    {
        $data = \DB::select('CALL getPecesByUsuarioIdForProceso(?,?)', array($idUsuario, $idProceso));

        return $data;
    }

    /**
     * CONSULTAS A GALERIA *********************************************************************
     */

    /**
     * Metodo que consulta la informacion de la galeria por id
     *
     * @return mixed.
     */
    public function getInfoGaleriaById($idGaleria)
    {
        $data = \DB::select('CALL getInfoGaleriaById(?)', array($idGaleria));

        return $data;
    }

    /**
     * Metodo que consulta la galeria por el id de la planta
     *
     * @param $idPlanta
     * @return mixed
     */
    public function getGaleriaPlantaById($idPlanta)
    {
        $data = \DB::select('CALL getGaleriaPlantaById(?)', array($idPlanta));

        return $data;
    }

    /**
     * Metodo que consulta la galeria por el i del pez
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
     * Metodo que consulta la informacion de la galeria de una planta por su id
     *
     * @param $idUsuario
     * @param $idPlanta
     * @return mixed
     */
    public function getInfoGaleriaPlantaById($idUsuario, $idPlanta)
    {

        $data = \DB::select('CALL getInfoGaleriaPlantaById(?,?)', array($idUsuario, $idPlanta));

        return $data;
    }

    /**
     * Metodo que consulta la informacion de la galeria de un pez por su id
     *
     * @param $idUsuario
     * @param $idPez
     * @return mixed
     */
    public function getInfoGaleriaPezById($idUsuario, $idPez)
    {

        $data = \DB::select('CALL getInfoGaleriaPezById(?,?)', array($idUsuario, $idPez));

        return $data;
    }

    /**
     * CONSULTAS A PROCESOS, ESPECIMENES Y ELEMENTOS *******************************************
     */

    /**
     * Metodo que consulta la informacion del proceso por id
     *
     * @param $idProceso
     * @return mixed
     */
    public function getInfoProcesoById($idProceso)
    {
        $data = \DB::select('CALL getInfoProcesoById(?)', array($idProceso));

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
     * Metodo que consulta la informacion del elemento y su asociacion con otros elementos
     *
     * @param $idElemento
     * @param $tipoElemento
     * @return mixed
     */
    public function getInfoAsociacionElementos($idElemento, $tipoElemento)
    {
        $data = \DB::select('CALL getInfoAsociacionElementos(?,?)', array($idElemento, $tipoElemento));

        return $data;
    }

    /**
     * Metodo que consulta la informacion del elemento y su asociacion con otros elementos por id de proceso
     *
     * @param $idEspecimen
     * @param $idProceso
     * @param $tipoEspecimen
     * @param $estado
     * @return mixed
     */
    public function getInfoAsociacionElementosForProceso($idEspecimen, $idProceso, $tipoEspecimen, $estado)
    {
        $data = \DB::select('CALL getInfoAsociacionElementosForProceso(?,?,?,?)', array($idEspecimen, $idProceso, $tipoEspecimen, $estado));

        return $data;
    }

    /**
     * Metodo que consulta la informacion de los especimenes de un proceso por id
     *
     * @param $idProceso
     * @param $idUsuario
     * @return mixed
     */
    public function getEspecimenesByIdUsuario($idProceso, $idUsuario)
    {
        $data = \DB::select('CALL getEspecimenesByIdUsuario(?,?)', array(
            $idProceso,
            $idUsuario
        ));

        return $data;
    }

    /**
     * CONSULTAS A GENERALES *******************************************************************
     */

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
     * Metodo que consulta el conteo de las solicitudes
     *
     * @param $idUsuarioSolicitante
     * @param $idUsuarioSolicitado
     * @return mixed
     */
    public function getConteoSolicitud($idUsuarioSolicitante, $idUsuarioSolicitado)
    {
        $data = \DB::select('CALL getConteoSolicitud(?,?)', array($idUsuarioSolicitante, $idUsuarioSolicitado));

        return $data;
    }


    /**
     * Metodo que consulta las solicitudes recibidas
     *
     * @return mixed.
     */
    public function getSolicitudesRecibidas($idUsuario)
    {
        $data = \DB::select('CALL getSolicitudesRecibidas(?)', array($idUsuario));

        return $data;
    }

    /**
     * Metodo que consulta las solicitudes realizadas
     *
     * @return mixed.
     */
    public function getSolicitudesRealizadas($idUsuario)
    {
        $data = \DB::select('CALL getSolicitudesRealizadas(?)', array($idUsuario));

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
     * @param $idUsuario
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
     * @param $idUsuario
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
     * @param $idUsuario
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
                $result['mensaje'] = $nombre . ' registrado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = $nombre . ' No se registro correctamente' . $e;
        }

        return json_encode($result);

    }

    /**
     * Metodo que registra una imagen en la galeria
     *
     * @param $rq
     * @return string
     */
    public function postInsertarImagenGaleria($rq)
    {
        $result = [];

        $usuarioid = $rq->input('usuarioid');
        $id = $rq->input('id');
        $tipo = $rq->input('tipo');
        $titulo = $rq->input('titulo');
        $descripcion = $rq->input('descripcion');

        $file = $rq->file('imagen')->getClientOriginalName();

        $extension = pathinfo($file, PATHINFO_EXTENSION);

        try {
            $transaction = \DB::select('CALL insImagenGaleria(?,?,?,?,?,?)',
                array(
                    $usuarioid,
                    $id,
                    $tipo,
                    $titulo,
                    $descripcion,
                    $extension
                )
            );

            if ($transaction[0]->IMAGE_STATUS) {
                $result['codigo'] = $transaction[0]->CODIGO;
                $result['estado'] = "success";
                $result['mensaje'] = 'Registrado correctamente';
            } else {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;
            }

        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'No se registro correctamente';
        }

        return json_encode($result);

    }

    /**
     * Metodo que registra una solicitud
     *
     * @param $rq
     * @param $idUsuario
     * @return string
     */
    public function postInsertarSolicitud($rq, $idUsuario)
    {
        $result = [];

        $usuariosolicitante = $idUsuario;
        $usuariosolicitado = $rq->input('usuarioid');

        try {
            $transaction = \DB::select('CALL insSolicitud(?,?)', array(
                    $usuariosolicitante,
                    $usuariosolicitado)
            );
            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                $result['estado'] = "success";
                $result['mensaje'] = 'Solicitud registrada correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'No se registro la solicitud correctamente';
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
                $result['mensaje'] = 'Estado actualizado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'Estado NO actualizado correctamente';
        }
        return json_encode($result);
    }

    /**
     * Metodo que edita la informacion de un usuario
     *
     * @param $rq
     * @return string
     */
    public function postEditarUsuario($rq)
    {
        $result = [];

        $usuarioid = $rq->input('usuarioid');
        $usuario = strtoupper($rq->input('usuario'));
        $email = $rq->input('email');
        $primernombre = $rq->input('primernombre');
        $segundonombre = $rq->input('segundonombre');
        $primerapellido = $rq->input('primerapellido');
        $segundoapellido = $rq->input('segundoapellido');

        try {
            $transaction = \DB::select('CALL updDatosUsuario(?,?,?,?,?,?,?)',
                array(
                    $usuarioid,
                    $usuario,
                    $email,
                    $primernombre,
                    $segundonombre,
                    $primerapellido,
                    $segundoapellido
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
     * Metodo que edita la contraseña de un usuario
     *
     * @param $rq
     * @return string
     */
    public function postEditarPassUsuarioById($rq)
    {
        $result = [];

        try {

            if (Hash::check('plain-text', bcrypt($rq->input('old_pass')))) {

                $usuarioid = $rq->input('usuarioid');
                $pass = bcrypt($rq->input('pass'));

                $transaction = \DB::select('CALL updPassUsuario(?,?)',
                    array(
                        $usuarioid,
                        $pass
                    )
                );

                if ($transaction) {

                    $result['estado'] = "fatal";
                    $result['mensaje'] = $transaction[0]->MESSAGE;

                } else {
                    $result['estado'] = "success";
                    $result['mensaje'] = 'Registrado correctamente';
                }
            } else {
                $result['estado'] = "nopass";
                $result['mensaje'] = "Contraseña no coincide, intentelo nuevamente";
            }

        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'No se registro correctamente';
        }
        return json_encode($result);

    }

    /**
     * Metodo que edita el avatar de un usuario
     *
     * @param $rq
     * @return string
     */
    public function postEditarAvatarUsuario($rq)
    {
        $result = [];

        $usuarioid = $rq->input('usuarioid');

        $file = $rq->file('avatar')->getClientOriginalName();

        $extension = pathinfo($file, PATHINFO_EXTENSION);

        try {
            $transaction = \DB::select('CALL updAvatarUsuario(?,?)',
                array(
                    $usuarioid,
                    $extension
                )
            );

            if ($transaction[0]->AVATAR_STATUS) {
                $result['codigo'] = $transaction[0]->CODIGO;
                $result['estado'] = "success";
                $result['mensaje'] = 'Registrado correctamente';
            } else {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;
            }

        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'No se registro correctamente';
        }

        return json_encode($result);

    }

    /**
     * Metodo que edita la informacion de una planta
     *
     * @param $rq
     * @return string
     */
    public function postEditarPlanta($rq)
    {
        $result = [];

        $id = $rq->input('plantaid');

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
            $transaction = \DB::select('CALL updDatosPlanta(?,?,?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $id,
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
                $result['mensaje'] = $nombre . ' actualizado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = $nombre . ' NO se actualizó correctamente';
        }
        return json_encode($result);
    }

    /**
     * Metodo que edita la informacion de un pez
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
                $result['mensaje'] = $nombre . ' actualizado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = $nombre . ' NO se actualizó correctamente' . $e;
        }

        return json_encode($result);
    }

    /**
     * Metodo que edita la informacion de un proceso
     *
     * @param $rq
     * @return string
     */
    public function postEditarProcesos($rq)
    {
        $result = [];

        $procesoid = $rq->input('procesoid');
        $nombre = strtoupper($rq->input('nombre'));
        $descripcion = $rq->input('descripcion');
        $fecha = $rq->input('fecha');
        $area = $rq->input('area');
        $volumen = $rq->input('volumen');

        try {
            $transaction = \DB::select('CALL updDatosProceso(?,?,?,?,?,?)', array(
                    $procesoid,
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
                $result['mensaje'] = $nombre . ' actualizado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = $nombre . ' NO se actualizó correctamente' . $e;
        }
        return json_encode($result);

    }

    /**
     * Metodo que edita el estado de una imagen de la galeria
     *
     * @param $rq
     * @return string
     */
    public function postEditarEstadoGaleria($rq)
    {
        $result = [];

        $id = $rq->input('id');
        $estado = $rq->input('estado');

        try {
            $transaction = \DB::select('CALL updEstadoGaleria(?,?)',
                array(
                    $id,
                    $estado
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
     * Metodo que edita la informacion de una imagen de la galeria
     *
     * @param $rq
     * @return string
     */
    public function postEditarInfoGaleria($rq)
    {
        $result = [];

        $id = $rq->input('id');
        $titulo = $rq->input('titulo');
        $descripcion = $rq->input('descripcion');

        try {
            $transaction = \DB::select('CALL updInfoGaleria(?,?,?)', array(
                    $id,
                    $titulo,
                    $descripcion
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
            $result['mensaje'] = 'NO se actualizó correctamente' . $e;
        }
        return json_encode($result);

    }

    /**
     * Metodo que edita la informacion de una imagen de la galeria
     *
     * @param $rq
     * @return string
     */
    public function postEditarEstadoSolicitud($rq, $idUsuario)
    {
        $result = [];

        $tipo = $rq->input('tipo');

        //Si el tipo es 4 es porque la solicitud se va a cancelar, ya que el usuario loggeado es el solicitante
        if ($tipo == 4) {
            $usuario_id_solicitante = $idUsuario;
            $usuario_id_solicitado = $rq->input('usuarioid');

            //Si el tipo es 2 o 3 es porque la solicitud se va a aceptar/rechazar, ya que el usuario loggeado es el solicitado
        } else {
            $usuario_id_solicitante = $rq->input('usuarioid');
            $usuario_id_solicitado = $idUsuario;
        }

        try {
            $transaction = \DB::select('CALL upsEstadoSolicitud(?,?,?)', array(
                    $usuario_id_solicitante,
                    $usuario_id_solicitado,
                    $tipo
                )
            );
            if ($transaction) {
                $result['estado'] = "fatal";
                $result['mensaje'] = $transaction[0]->MESSAGE;

            } else {
                $result['estado'] = "success";
                $result['mensaje'] = 'Estado Registrado correctamente';
            }
        } catch (Exception $e) {
            $result['estado'] = "error";
            $result['mensaje'] = 'El estado NO se registró correctamente' . $e;
        }
        return json_encode($result);

    }

}