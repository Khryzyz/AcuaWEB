<div id="InfoPlanta">

    <div class="modal-header bg-danger">
        <h4>{{strtoupper($data->nombre)}}</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-gear"></i> Información de {{$data->nombre}}</h4>
            </div>
            <div class="panel-body">

                <!-- Información del proceso -->
                <div class="panel-group">

                    <!-- Datos -->

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
                            <strong>Descripción:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$data->descripcion}}
                        </div>
                    </div>

                    <div class="row margin-bottom-10">
                        <div class="col-md-4">
                            <strong>Estado:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$data->estado}}
                        </div>
                    </div>

                    <div class="row margin-bottom-10">
                        <div class="col-md-4">
                            <strong>Tipo de Acceso:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$data->tipoacceso}}
                        </div>
                    </div>

                    <div class="row margin-bottom-10">
                        <div class="col-md-4">
                            <strong>Area del Cultivo:</strong>
                        </div>
                        <div class="col-md-2">
                            {{$data->areacultivo}}
                        </div>
                        <div class="col-md-4">
                            <strong>Volumen del Cultivo:</strong>
                        </div>
                        <div class="col-md-2">
                            {{$data->volumencultivo}}
                        </div>
                    </div>

                    <!-- FIN Datos -->
                </div>

            </div>

        </div>

        <!-- FIN Información del proceso -->

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>

    </div>
