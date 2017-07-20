<div id="Infopez">

    <div class="modal-header bg-info">
        <h4>{{strtoupper($data->nombre)}}</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-tint"></i> Información de {{$data->nombre}}</h4>
            </div>
            <div class="panel-body">

                <!-- Información del pez -->
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
                                Temperatura Vital Min:
                            </div>
                            <div class="col-md-2">
                                {{$data->tempvitalmin}}°C
                            </div>
                            <div class="col-md-4">
                                Temperatura Vital Max:
                            </div>
                            <div class="col-md-2">
                                {{$data->tempvitalmax}}°C
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Temperatura Optima Min:
                            </div>
                            <div class="col-md-2">
                                {{$data->tempoptimamin}}°C
                            </div>
                            <div class="col-md-4">
                                Temperatura Optima Max:
                            </div>
                            <div class="col-md-2">
                                {{$data->tempoptimamax}}°C
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Porcentaje Proteinico Min:
                            </div>
                            <div class="col-md-2">
                                {{$data->porcprotmin}}%
                            </div>
                            <div class="col-md-4">
                                Porcentaje Proteinico Max:
                            </div>
                            <div class="col-md-2">
                                {{$data->porcprotmax}}%
                            </div>
                        </div>


                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Peso Max Crecimiento:
                            </div>
                            <div class="col-md-2">
                                {{$data->crecpeso}}gr
                            </div>
                            <div class="col-md-4">
                                Tiempo Max Crecimiento:
                            </div>
                            <div class="col-md-2">
                                {{$data->crectiempo}}mes
                            </div>
                        </div>


                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Nitrogeno:
                            </div>
                            <div class="col-md-8">
                                {{$data->nitrogeno}}mg/l
                            </div>
                        </div>


                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Nitrito:
                            </div>
                            <div class="col-md-8">
                                {{$data->nitrito}}mg/l
                            </div>
                        </div>


                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                Oxigeno:
                            </div>
                            <div class="col-md-8">
                                {{$data->oxigeno}}mg/l
                            </div>
                        </div>

                    </div>
                    <!-- FIN Datos -->

                </div>

                <!-- FIN Información de la pez -->

            </div>

        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>

</div>