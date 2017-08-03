<div id="InfoPlanta">

    <div class="modal-header bg-success">
        <h4>{{strtoupper($data->nombre)}}</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-leaf"></i> Información de {{$data->nombre}}</h4>
            </div>
            <div class="panel-body">

                <!-- Información de la planta -->
                <div class="panel-group">

                    <!-- Imagen -->
                    <div class="col-md-4">
                        <?php
                        if($data->imagen){
                        ?>
                        <img src="{{url('/img/gallery/'.$data->imagen)}}"
                             class="img-responsive img-rounded"
                             alt="Imagen no disponible"/>
                        <?php
                        }else {
                        ?>
                        <img src="{{url('/img/sin_imagen.png')}}" class="img-responsive img-rounded"
                             alt="Imagen no disponible"/>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- FIN Imagen -->

                    <!-- Datos -->
                    <div class="col-md-8">

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Nombre:</strong>
                            </div>
                            <div class="col-md-8">
                                {{$data->nombre}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Estado:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->estado}}
                            </div>
                            <div class="col-md-4">
                                <strong>Tipo de Acceso:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tipoacceso}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>pH Min:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->phmin}}
                            </div>
                            <div class="col-md-4">
                                <strong>pH Max:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->phmax}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Plantas por m² Min:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->plantmin}}
                            </div>
                            <div class="col-md-4">
                                <strong>Plantas por m² Max:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->plantmax}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Tiempo Germinación Min:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tiempogermmin}} día
                            </div>
                            <div class="col-md-4">
                                <strong>Tiempo Germinación Max:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tiempogermax}} día
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Tiempo Crecimiento Min:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tiempocrecmin}} día
                            </div>
                            <div class="col-md-4">
                                <strong>Tiempo Crecimiento Max:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tiempocrecmax}} día
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Temperatura Min:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tempmin}}°C
                            </div>
                            <div class="col-md-4">
                                <strong>Temperatura Max:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tempmax}}°C
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Exposicion Solar:</strong>
                            </div>
                            <div class="col-md-8">
                                {{$data->expsolar}}
                            </div>
                        </div>

                        <div class="row margin-bottom-5">
                            <div class="col-md-12 text-info">
                                <?php switch ($data->relacion) {
                                case 0:
                                ?>
                                <strong>Espécimen No vinculado procesos activos.</strong>
                                <?php
                                break;
                                case 1:
                                ?>
                                <strong>Espécimen vinculado a un proceso activo.</strong>
                                <?php
                                break;
                                default:
                                ?>
                                <strong>Espécimen vinculado a {{$data->relacion}} procesos activos.</strong>
                                <?php
                                break;
                                }?>

                            </div>
                        </div>

                    </div>
                    <!-- FIN Datos -->

                </div>

                <!-- FIN Información de la planta -->

            </div>

        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>

</div>