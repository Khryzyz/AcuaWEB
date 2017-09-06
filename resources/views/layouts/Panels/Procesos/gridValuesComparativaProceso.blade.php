<div class="panel-body">
    <?php

    //Inicializamos el Data Source de Transporte de lectura
    $readValueProcesos = new \Kendo\Data\DataSourceTransportRead();

    //Agregamos atributos al datasource de transporte de lectura
    $readValueProcesos
        ->url(route('getValuesComparativaProcesoByIdForGrid',
            ['idProcesoUsuario' => $procesoUsuario, 'idProcesoColega' => $procesoColega, 'idTipoSensor' => $idTipoSensor,]
        ))
        ->contentType('application/json')
        ->data(['_token' => csrf_token()])
        ->type('POST');

    //Inicializamos el Data Source de Transporte
    $transportValueProcesos = new \Kendo\Data\DataSourceTransport();

    //Agregamos atributos al datasource de transporte
    $transportValueProcesos
        ->read($readValueProcesos)
        ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

    //Inicializamos el esquema de la grid
    $schemaValueProcesos = new \Kendo\Data\DataSourceSchema();

    //Agregamos los aributos del esquema de l grid
    $schemaValueProcesos
        ->data('data')
        ->total('total');

    //Inicializamos el Data Source
    $dataSourceValueProcesos = new \Kendo\Data\DataSource();

    //Agregamos atributos al datasource
    $dataSourceValueProcesos
        ->transport($transportValueProcesos)
        ->pageSize(10)
        ->schema($schemaValueProcesos)
        ->serverFiltering(true)
        ->serverSorting(true)
        ->serverPaging(true);

    //Inicializamos la grid
    $gridValueProcesos = new \Kendo\UI\Grid('Grid' . $idTipoSensor);

    //Inicializamos las columnas de la grid
    $fecha = new \Kendo\UI\GridColumn();
    $fecha->field('fecha')->title('Fecha')->width(50);

    $valorUsuario = new \Kendo\UI\GridColumn();
    $valorUsuario->field('valorUsuario')->title('Valor ' . ' (' . $unidadSensor . ') Usuario')->width(50)->format('{0:n2}');

    $valorColega = new \Kendo\UI\GridColumn();
    $valorColega->field('valorColega')->title('Valor ' . ' (' . $unidadSensor . ') Colega')->width(50)->format('{0:n2}');


    //Se agregan columnas y atributos al grid
    $gridValueProcesos
        ->addColumn($fecha, $valorUsuario, $valorColega)
        ->dataSource($dataSourceValueProcesos)
        ->sortable(true)
        ->dataBound('handleAjaxModal')
        ->pageable(true);

    //renderizamos la grid
    echo $gridValueProcesos->render();
    ?>
</div>