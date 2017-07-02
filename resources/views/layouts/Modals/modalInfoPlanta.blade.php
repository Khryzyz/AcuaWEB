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
                        <img src="data:image/jpeg;base64,{{base64_encode($data->imagen)}}"
                             class="img-responsive img-rounded"
                             alt="Imagen no disponible"/>
                        <?php
                        }else {
                        ?>
                        <img src="{{url('/img/sin_imagen.jpg')}}" class="img-responsive img-rounded"
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
                                Nombre:
                            </div>
                            <div class="col-md-8">
                                {{$data->nombre}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Estado:
                            </div>
                            <div class="col-md-8">
                                {{$data->estado}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                pH Min:
                            </div>
                            <div class="col-md-2">
                                {{$data->phmin}}
                            </div>
                            <div class="col-md-4">
                                pH Max:
                            </div>
                            <div class="col-md-2">
                                {{$data->phmax}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Plantas por m² Min:
                            </div>
                            <div class="col-md-2">
                                {{$data->plantmin}}
                            </div>
                            <div class="col-md-4">
                                Plantas por m² Max:
                            </div>
                            <div class="col-md-2">
                                {{$data->plantmax}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Tiempo Germinación Min:
                            </div>
                            <div class="col-md-2">
                                {{$data->tiempogermmin}} día
                            </div>
                            <div class="col-md-4">
                                Tiempo Germinación Max:
                            </div>
                            <div class="col-md-2">
                                {{$data->tiempogermax}} día
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Tiempo Crecimiento Min:
                            </div>
                            <div class="col-md-2">
                                {{$data->tiempocrecmin}} día
                            </div>
                            <div class="col-md-4">
                                Tiempo Crecimiento Max:
                            </div>
                            <div class="col-md-2">
                                {{$data->tiempocrecmax}} día
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Temperatura Min:
                            </div>
                            <div class="col-md-2">
                                {{$data->tempmin}}°C
                            </div>
                            <div class="col-md-4">
                                Temperatura Max:
                            </div>
                            <div class="col-md-2">
                                {{$data->tempmax}}°C
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Exposicion Solar:
                            </div>
                            <div class="col-md-8">
                                {{$data->expsolar}}
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