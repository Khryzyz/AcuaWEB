@extends('layouts.Dashboard.Main')

@section('content')

<?php
$Utils = new Utils();
?>


<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Graficas</h3>
	</div>
	<div class="panel-body">
		<?php
		$caudalf = new \Kendo\Dataviz\UI\ChartSeriesItem();
		$caudalf->field('caudal')
		->color('blue')
		->name('Caudal');

		$temperaturaf = new \Kendo\Dataviz\UI\ChartSeriesItem();
		$temperaturaf->field('temperatura')
		->color('red')
		->name('Temperatura');

		$amoniof = new \Kendo\Dataviz\UI\ChartSeriesItem();
		$amoniof->field('amonio')
		->color('#FF9500')
		->name('Amonio');

		$phf = new \Kendo\Dataviz\UI\ChartSeriesItem();
		$phf->field('ph')
		->color('#836B49')
		->name('Ph');

		$valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();

		$valueAxis->labels(array('format' => 'N0'));
		//->majorUnit(50);

		$categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();

		$categoryAxis->field('fecha')
		->labels(array('rotation' => -90))
		->crosshair(array('visible' => true));

		$tooltip = new \Kendo\Dataviz\UI\ChartTooltip();
		$tooltip->visible(true)
		->format('N0')
		->shared(true);

		$transport = new \Kendo\Data\DataSourceTransport();
		$transport->read(array('url' => 'muestras/GetDataGrafi', 'type' => 'POST', 'dataType' => 'json'));

		$dataSource = new \Kendo\Data\DataSource();

		$dataSource->transport($transport)
		->addSortItem(array('field' => 'fecha', 'dir' => 'asc'));

		$chart = new \Kendo\Dataviz\UI\Chart('chart');
		$chart->title(array('text' => 'Graficas de muestreo de los sensores'))
		->dataSource($dataSource)
		->legend(array('position' => 'top'))
		->addSeriesItem($temperaturaf, $caudalf, $amoniof, $phf)
		->addValueAxisItem($valueAxis)
		->addCategoryAxisItem($categoryAxis)
		->seriesDefaults(array('type' => 'line', 'style' => 'smooth'))
		->tooltip($tooltip)
		->transitions(false)
		->renderAs('svg');

		echo $chart->render();

		?>
	</div>
</div>



<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Registros de los diferentes sensores</h3>
	</div>
	<div class="panel-body">
		<?php
		$transport = new \Kendo\Data\DataSourceTransport();

		$read = new \Kendo\Data\DataSourceTransportRead();

		$read->url('muestras/GetDatosMuestraGrid')
		->contentType('application/json')
		->type('POST');

		$transport->read($read)
		->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

		$model = new \Kendo\Data\DataSourceSchemaModel();

		$idmsensoresField = new \Kendo\Data\DataSourceSchemaModelField('idmsensores');
		$idmsensoresField->type('number');

		$caudalField = new \Kendo\Data\DataSourceSchemaModelField('caudal');
		$caudalField->type('number');


		$temperaturaField = new \Kendo\Data\DataSourceSchemaModelField('temperatura');
		$temperaturaField->type('number');


		$amonioField = new \Kendo\Data\DataSourceSchemaModelField('amonio');
		$amonioField->type('number');

		$phField = new \Kendo\Data\DataSourceSchemaModelField('ph');
		$phField->type('number');


		$fechaField = new \Kendo\Data\DataSourceSchemaModelField('fecha');
		$fechaField->type('string');



		$model->addField($idmsensoresField)
		->addField($caudalField)
		->addField($temperaturaField)
		->addField($amonioField)
		->addField($phField)
		->addField($fechaField);


		$schema = new \Kendo\Data\DataSourceSchema();
		$schema->data('data')
		->model($model)
		->total('total');

		$dataSource = new \Kendo\Data\DataSource();

		$dataSource->transport($transport)
		->pageSize(10)
		->schema($schema)
		->serverFiltering(true)
		->serverSorting(true)
		->serverPaging(true);

		$grid = new \Kendo\UI\Grid('grid');

		$idmsensoresID = new \Kendo\UI\GridColumn();
		$idmsensoresID->field('idmsensores')
		->filterable(false)
		->Hidden('true')
		->title('Id');

		$caudal = new \Kendo\UI\GridColumn();
		$caudal->field('caudal')
		->format('{0:n2}')
		->title('Caudal');

		$temperatura = new \Kendo\UI\GridColumn();
		$temperatura->field('temperatura')
		->format('{0:n2}')
		->title('Temperatura');

		$amonio = new \Kendo\UI\GridColumn();
		$amonio->field('amonio')
		->format('{0:n2}')
		->title('Amonio');

		$ph = new \Kendo\UI\GridColumn();
		$ph->field('ph')
		->format('{0:n2}')
		->title('Ph');

		$fecha = new \Kendo\UI\GridColumn();
		$fecha->field('fecha')
		->format('{0:MM/dd/yyyy HH:mm:ss}')
		->title('Fecha');


		$gridFilterable = new \Kendo\UI\GridFilterable();
		$gridFilterable->mode("row");

		$grid->addColumn($idmsensoresID, $caudal, $temperatura, $amonio, $ph, $fecha)
		->dataSource($dataSource)
		->sortable(true)
			//->filterable($gridFilterable)
		->dataBound('handleAjaxModal')
		->pageable(true)
		->toolbarTemplateId('toolbar');

		echo $grid->render();
		?>
		<div id="grid2"></div>

	</div>
	<div class="panel-footer">
	</div>
</div>

@endsection

@section('scripts')

<script id="toolbar" type="text/x-kendo-tmpl">
	@if(Auth::user()->rol =='admin')
   		<a href="../muestras/excel" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Exportar excel</a>
   	@endif
</script>

<script type="text/javascript"> 

var timestamp = null;
var data;
function cargar_push() 
{ 
	datosgrid = $("#chart").data("kendoChart").dataSource.data();
	cuantos = datosgrid.length;
	prejson = JSON.stringify(datosgrid[0]);
	$.post('muestras/GetBideoData',prejson,function(data){
		data = JSON.parse(data);
		if(data.estado){
			$("#chart").data("kendoChart").dataSource.data(data.result);
			$("#chart").data("kendoChart").refresh();
			$("#grid").data("kendoGrid").dataSource.read();
		}
		setTimeout('cargar_push()',1000);
	})
}

$(document).ready(function()
{
	setTimeout('cargar_push()',3000);
});	

</script>
@endsection