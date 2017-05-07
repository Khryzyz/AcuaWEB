@extends('layouts.admin.principal')

@section('content')

    <?php
    $Utils = new Utils();
    ?>

    <h1>Procesos</h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Registro de procesos del usuario</h3>
        </div>
        <div class="panel-body">
            <div class="container">
                <table id="ProcesosUsuario" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>Id Proceso</th>
                        <th>Codigo</th>
                        <th>Fecha Implementacion</th>
                        <th>Area Cultivo</th>
                        <th>Volumen Cultivo</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            Datos recogidos en tiempo real desde los procesos de acuaponia.
        </div>
    </div>
    <p>
        <?php
        //var_dump(Auth::user());
        ?>
    </p>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(function() {
            $('#ProcesosUsuario').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url('procesos/getProcesosByIdUsuario') !!}',
                columns: [
                    {data: 'username', name: 'username'},
                    {data: 'password', name: 'password'},
                    {data: 'email', name: 'email'},
                    {data: 'role', name: 'role'}
                ]
            });
        });
    </script>


    <!--
    <script id="toolbar" type="text/x-kendo-tmpl">
	@if(Auth::user()->rol =='admin')
        <a href="../muestras/excel" class="btn btn-primary"><i class="fa fa-file-excel-o"></i>Exportar excel</a>
    @endif
    </script>
    -->
@endsection