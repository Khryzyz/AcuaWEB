@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>

    <h1>Grid Datatables</h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Grid Obtenida en Datatables</h3>
        </div>
        <div class="panel-body">
            <table id="GridDatatables" class="table table-hover">
                <thead>
                <tr>
                    <th>Id Proceso</th>
                    <th>Codigo</th>
                    <th>Fecha Implementacion</th>
                    <th>Area Cultivo</th>
                    <th>Volumen Cultivo</th>
                    <th>Estado</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="panel-footer">
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(function () {
            $('#GridDatatables').DataTable({
                processing: false,
                serverSide: false,
                ajax: {
                    url: '{!!route("getGridDataTables") !!}',
                    "type": "POST"
                },
                columns: [
                    {data: 'idproceso'},
                    {data: 'codigo'},
                    {data: 'fechaimplementacion'},
                    {data: 'areacultivo'},
                    {data: 'volumencultivo'},
                    {data: 'estado'}
                ]
            });
        });
    </script>
@endsection