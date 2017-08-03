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
                                <strong>Temperatura Vital Min:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tempvitalmin}}°C
                            </div>
                            <div class="col-md-4">
                                <strong>Temperatura Vital Max:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tempvitalmax}}°C
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Temperatura Optima Min:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tempoptimamin}}°C
                            </div>
                            <div class="col-md-4">
                                <strong>Temperatura Optima Max:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->tempoptimamax}}°C
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Porcentaje Proteinico Min:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->porcprotmin}}%
                            </div>
                            <div class="col-md-4">
                                <strong>Porcentaje Proteinico Max:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->porcprotmax}}%
                            </div>
                        </div>


                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Peso Max Crecimiento:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->crecpeso}}gr
                            </div>
                            <div class="col-md-4">
                                <strong>Tiempo Max Crecimiento:</strong>
                            </div>
                            <div class="col-md-2">
                                {{$data->crectiempo}}mes
                            </div>
                        </div>


                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Nitrogeno:</strong>
                            </div>
                            <div class="col-md-8">
                                {{$data->nitrogeno}}mg/l
                            </div>
                        </div>


                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Nitrito:</strong>
                            </div>
                            <div class="col-md-8">
                                {{$data->nitrito}}mg/l
                            </div>
                        </div>


                        <div class="row margin-bottom-10">
                            <div class="col-md-4">
                                <strong>Oxigeno:</strong>
                            </div>
                            <div class="col-md-8">
                                {{$data->oxigeno}}mg/l
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

                <!-- FIN Información de la pez -->

            </div>

        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>

</div>