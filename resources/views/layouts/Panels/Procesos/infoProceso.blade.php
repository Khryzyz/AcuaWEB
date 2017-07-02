<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title">Información del proceso</h4>
    </div>
    <div class="panel-body">

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <i class="fa fa-code"></i>
                Codigo:
            </div>
            <div class="col-md-9">
                {{strtoupper($data->codigo)}}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <i class="fa fa-terminal"></i>
                Nombre:
            </div>
            <div class="col-md-9">
                {{strtoupper($data->nombre)}}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <i class="fa fa-comments"></i>
                Descripción:
            </div>
            <div class="col-md-9">
                {{$data->descripcion}}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <i class="fa fa-calendar"></i>
                Fecha Implementación:
            </div>
            <div class="col-md-9">
                {{$data->fechaimplementacion}}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <i class="fa fa-th"></i>
                Area Cultivo:
            </div>
            <div class="col-md-9">
                {{$data->areacultivo}} m²
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <i class="fa fa-align-justify"></i>
                Volumen Cultivo:
            </div>
            <div class="col-md-9">
                {{$data->volumencultivo}} m³
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <i class="fa fa-power-off"></i>
                Estado:
            </div>
            <div class="col-md-9 margin-bottom-10 <?php
            if ($data->estado == "Activo")
                echo "text-success";
            else
                echo "text-danger";
            ?>">
                {{$data->estado}}

            </div>
        </div>

    </div>
</div>