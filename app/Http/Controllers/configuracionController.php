<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Utils;

use AquaWebBL;

class configuracionController extends Controller
{

    protected $auth;

    /**
     * Constructor de la clase que recibe las variables de autenticacion
     *
     * configuracionController constructor.
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
     *  Metodo del controlador que retorna la vista de configuracion de usuarios
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionUsuarios()
    {
        return view('configuracion.configuracionUsuarios');
    }

    /**
     *  Metodo del controlador que retorna la vista de configuracion de informacion personal de usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionPersonal()
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $data = $dataBL[0];

        return view('configuracion.configuracionPersonal', compact('data'));

    }

    /**
     *  Metodo del controlador que retorna la vista de configuracion de plantas
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionPlantas()
    {
        return view('configuracion.configuracionPlantas');
    }

    /**
     *  Metodo del controlador que retorna la vista de configuracion de peces
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionPeces()
    {
        return view('configuracion.configuracionPeces');
    }

    /**
     *  Metodo del controlador que retorna la vista de configuracion de plantas por el usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionMisPlantas()
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $data = $dataBL[0];

        return view('configuracion.configuracionMisPlantas', compact('data'));
    }

    /**
     *  Metodo del controlador que retorna la vista de configuracion de peces registrados por el usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuracionMisPeces()
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $data = $dataBL[0];

        return view('configuracion.configuracionMisPeces', compact('data'));
    }

    /**
     * Metodo del controlador que retorna la vista para la edicion de la galeria del especimen
     *
     * @param $idPlanta
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editargaleriaplanta($idPlanta)
    {

        $Bl = new AquaWebBL();

        $dataUsuario = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $dataPlanta = $Bl->getInfoPlantaById($idPlanta);

        $data = (object)array_merge((array)$dataUsuario[0], (array)$dataPlanta[0]);

        return view('configuracion.editarGaleriaPlanta', compact('data'));

    }

    /**
     * Metodo del controlador que retorna la vista para la edicion de la galeria del especimen
     *
     * @param $idPez
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editargaleriapez($idPez)
    {

        $Bl = new AquaWebBL();

        $dataUsuario = $Bl->getInfoUsuarioById($this->auth->user()->id);

        $dataPez = $Bl->getInfoPezById($idPez);

        $data = (object)array_merge((array)$dataUsuario[0], (array)$dataPez[0]);

        return view('configuracion.editarGaleriaPez', compact('data'));

    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR MODALES *********************************************************
     *******************************************************************************************
     */

    /**
     * Metodo del controlador que retorna el modal para agregar una variedad de planta
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarPlanta()
    {

        return view('configuracion.modalAgregarPlanta');

    }

    /**
     * Metodo del controlador que recibe la informacion para agregar una variedad de planta
     *
     * @param Request $rq
     * @return string
     */
    public function postModalAgregarPlanta(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postInsertarPlanta($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     * Metodo del controlador que retorna el modal para agregar una variedad de pez
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarPez()
    {

        return view('configuracion.modalAgregarPez');

    }

    /**
     * Metodo del controlador que recibe la informacion para agregar una variedad de pez
     *
     * @param Request $rq
     * @return string
     */
    public function postModalAgregarPez(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postInsertarPez($rq, $this->auth->user()->id);

        return $result;
    }

    /**
     * Metodo del controlador que retorna el modal para agregar un usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarUsuario()
    {

        return view('configuracion.modalAgregarUsuario');

    }

    /**
     * Metodo del controlador que recibe la informacion para agregar un usuario
     *
     * @param Request $rq
     * @return string
     */
    public function postModalAgregarUsuario(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postInsertarUsuario($rq);

        return $result;
    }

    /**
     * Metodo del controlador que retorna el modal para agregar un usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalRegistrarUsuario()
    {

        return view('auth.registrarUsuario');

    }

    /**
     * Metodo del controlador que recibe la informacion para agregar un usuario
     *
     * @param Request $rq
     * @return string
     */
    public function postModalRegistrarUsuario(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postRegistrarUsuario($rq);

        return $result;
    }

    /**
     * Metodo del controlador que retorna el modal para agregar una imagen a la galeria
     *
     * @param $id
     * @param $tipo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalAgregarImagen($id, $tipo)
    {

        $data = array(
            "id" => $id,
            "tipo" => $tipo,
            "idusuario" => $this->auth->user()->id
        );

        $data = (object)$data;

        return view('configuracion.modalAgregarImagen', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para agregar una imagen a la galeria
     *
     * @param $rq
     * @return string
     */
    public function postModalAgregarImagen(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postInsertarImagenGaleria($rq);

        $result_decode = json_decode($result);

        if ($result_decode->codigo) {

            $file = $rq->file('imagen');

            $extension = pathinfo($rq->file('imagen')->getClientOriginalName(), PATHINFO_EXTENSION);

            $file->move('img/gallery', $result_decode->codigo . "." . $extension);
        }

        return $result;

    }

    /**
     * Metodo del controlador que retorna el modal para cambiar el estado de una imagen
     *
     * @param $idGaleria
     * @param $estado
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEstadoGaleria($idGaleria, $estado)
    {

        $data = array(
            "idGaleria" => $idGaleria,
            "estado" => $estado
        );

        $data = (object)$data;

        return view('configuracion.modalEstadoGaleria', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para cambiar el estado de una imagen
     *
     * @param Request $rq
     * @return string
     */
    public function postModalEstadoGaleria(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postEditarEstadoGaleria($rq);

        return $result;

    }

    /**
     * Metodo del controlador que retorna el modal para editar la informacion de una imagen
     *
     * @param $idGaleria
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModalEditarInfoGaleria($idGaleria)
    {

        $Bl = new AquaWebBL();

        $dataBL = $Bl->getInfoGaleriaById($idGaleria);

        $data = $dataBL[0];

        return view('configuracion.modalEditarInfoGaleria', compact('data'));

    }

    /**
     * Metodo del controlador que recibe la informacion para editar la informacion de una imagen
     *
     * @param Request $rq
     * @return string
     */
    public function postModalEditarInfoGaleria(Request $rq)
    {

        $Bl = new AquaWebBL();

        $result = $Bl->postEditarInfoGaleria($rq);

        return $result;

    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR GRID ************************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta las variedades de plantas registradas en el sistema
     *
     * @return array
     */
    public function getPlantas()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPlantas();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registrados en el sistema
     *
     * @return array
     */
    public function getPeces()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPeces();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta los usuarios registrados en el sistema
     *
     * @return array
     */
    public function getUsuarios()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getUsuarios();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de plantas registradas en el sistema por el id del usuario
     *
     * @return array
     */
    public function getPlantasByUsuarioId()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPlantasByUsuarioId($this->auth->user()->id);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de plantas registradas en el sistema por el id del proceso
     *
     * @param $idProceso
     * @return array
     */
    public function getPlantasByUsuarioIdForProceso($idProceso)
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPlantasByUsuarioIdForProceso($this->auth->user()->id, $idProceso);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registrados en el sistema por el id del usuario
     *
     * @return array
     */
    public function getPecesByUsuarioId()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPecesByUsuarioId($this->auth->user()->id);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registrados en el sistema por el id del proceso
     *
     * @return array
     */
    public function getPecesByUsuarioIdForProceso($idProceso)
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getPecesByUsuarioIdForProceso($this->auth->user()->id, $idProceso);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registrados en el sistema por el id del especimen
     *
     * @return array
     */
    public function getInfoGaleriaPlantaById($idPlanta)
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getInfoGaleriaPlantaById($this->auth->user()->id, $idPlanta);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     * Metodo que consulta las variedades de peces registrados en el sistema por el id del especimen
     *
     * @return array
     */
    public function getInfoGaleriaPezById($idPez)
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getInfoGaleriaPezById($this->auth->user()->id, $idPez);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($data, $input);

    }

    /**
     *******************************************************************************************
     * AREA METODOS USADOS POR DROPDOWN ********************************************************
     *******************************************************************************************
     */

    /**
     * Metodo que consulta los tipos de usuario registrados en el sistema
     *
     * @return mixed
     */
    public function getTiposUsuario()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getTiposUsuario();

        return $data;
    }

    /**
     * Metodo que consulta los tipos de acceso registrados en el sistema
     *
     * @return mixed
     */
    public function getTiposAcceso()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getTiposAcceso();

        return $data;
    }

    /**
     * Metodo que consulta los tipos de exposicion solar registrados en el sistema
     * Usado en DropDown
     *
     * @return mixed
     */
    public function getTiposExpoSolar()
    {

        $Bl = new AquaWebBL();

        $data = $Bl->getTiposExpoSolar();

        return $data;
    }

}
