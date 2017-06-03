@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>

    <h1>Dropdown Kendo</h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Dropdown Obtenido en Kendo</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <p>Dropdown sin argumento</p>
                    <?php

                    //Inicializamos el Data Source de Transporte de lectura
                    $read = new \Kendo\Data\DataSourceTransportRead();

                    //Agregamos atributos al datasource de transporte de lectura
                    $read->url('getDropDownKendo')
                        ->contentType('application/json')
                        ->type('POST');

                    //Inicializamos el Data Source de Transporte
                    $transport = new \Kendo\Data\DataSourceTransport();

                    //Agregamos atributos al datasource de transporte
                    $transport->read($read)
                        ->parameterMap('function(data) { return kendo.stringify(data); }');

                    //Inicializamos el Data Source
                    $dataSource = new \Kendo\Data\DataSource();

                    $dataSource->transport($transport);

                    //Inicializamos el Dropdown
                    $dropDownList = new \Kendo\UI\DropDownList('DropdownKendo');

                    $dropDownList->dataSource($dataSource)
                        ->dataTextField('nombre')
                        ->dataValueField('id')
                        ->attr('style', 'width: 100%');

                    echo $dropDownList->render();

                    ?>
                </div>
                <div class="col-md-4">
                    <p>Dropdown con argumento 1</p>
                    <?php

                    //Inicializamos el Data Source de Transporte de lectura
                    $read = new \Kendo\Data\DataSourceTransportRead();

                    //Agregamos atributos al datasource de transporte de lectura
                    $read->url('getDropDownArgKendo/1')
                        ->contentType('application/json')
                        ->type('POST');

                    //Inicializamos el Data Source de Transporte
                    $transport = new \Kendo\Data\DataSourceTransport();

                    //Agregamos atributos al datasource de transporte
                    $transport->read($read)
                        ->parameterMap('function(data) { return kendo.stringify(data); }');

                    //Inicializamos el Data Source
                    $dataSource = new \Kendo\Data\DataSource();

                    $dataSource->transport($transport);

                    //Inicializamos el Dropdown
                    $dropDownList = new \Kendo\UI\DropDownList('DropdownKendoArgUno');

                    $dropDownList->dataSource($dataSource)
                        ->dataTextField('nombre')
                        ->dataValueField('id')
                        ->attr('style', 'width: 100%');

                    echo $dropDownList->render();

                    ?>
                </div>
                <div class="col-md-4">
                    <p>Dropdown con argumento 2</p>
                    <?php

                    //Inicializamos el Data Source de Transporte de lectura
                    $read = new \Kendo\Data\DataSourceTransportRead();

                    //Agregamos atributos al datasource de transporte de lectura
                    $read->url('getDropDownArgKendo/2')
                        ->contentType('application/json')
                        ->type('POST');

                    //Inicializamos el Data Source de Transporte
                    $transport = new \Kendo\Data\DataSourceTransport();

                    //Agregamos atributos al datasource de transporte
                    $transport->read($read)
                        ->parameterMap('function(data) { return kendo.stringify(data); }');

                    //Inicializamos el Data Source
                    $dataSource = new \Kendo\Data\DataSource();

                    $dataSource->transport($transport);

                    //Inicializamos el Dropdown
                    $dropDownList = new \Kendo\UI\DropDownList('DropdownKendoArgDos');

                    $dropDownList->dataSource($dataSource)
                        ->dataTextField('nombre')
                        ->dataValueField('id')
                        ->attr('style', 'width: 100%');

                    echo $dropDownList->render();

                    ?>
                </div>
            </div>
        </div>
        <div class="panel-footer">
        </div>
    </div>
@endsection

@section('scripts')

@endsection