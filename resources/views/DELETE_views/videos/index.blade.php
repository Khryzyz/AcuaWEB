@extends('layouts.Dashboard.Main')

@section('content')

<?php
$Utils = new Utils();
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Lista de videos</h3>
	</div>
	<div class="panel-body">
		<?php
		$transport = new \Kendo\Data\DataSourceTransport();

		$read = new \Kendo\Data\DataSourceTransportRead();

		$read->url('videos/GetDatosVideosGrid')
		->contentType('application/json')
		->type('POST');

		$transport->read($read)
		->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

		$model = new \Kendo\Data\DataSourceSchemaModel();

		$idvideosField = new \Kendo\Data\DataSourceSchemaModelField('idvideos');
		$idvideosField->type('number');

		$nombreField = new \Kendo\Data\DataSourceSchemaModelField('nombre');
		$nombreField->type('string');


		$fechaField = new \Kendo\Data\DataSourceSchemaModelField('fecha');
		$fechaField->type('date');



		$model->addField($idvideosField)
		->addField($nombreField)
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

		$idvideosID = new \Kendo\UI\GridColumn();
		$idvideosID->field('idvideos')
		->filterable(false)
		->Hidden('true')
		->title('Id');

		$nombre = new \Kendo\UI\GridColumn();
		$nombre->field('nombre')
		->title('Nombre');


		$fecha = new \Kendo\UI\GridColumn();
		$fecha->field('fecha')
		->format('{0:MM/dd/yyyy HH:mm:ss}')
		->title('Fecha');

		$Column = new \Kendo\UI\GridColumn();
		$Column->field('ColumnName')
		->title('Accion')
		->templateId('ColumnTemplate');


		$gridFilterable = new \Kendo\UI\GridFilterable();
		$gridFilterable->mode("row");

		$grid->addColumn($idvideosID, $nombre, $fecha, $Column)
		->dataSource($dataSource)
		->sortable(true)
		->filterable($gridFilterable)
		->dataBound('handleAjaxModal')
		->pageable(true)
		->toolbarTemplateId('toolbar');

		echo $grid->render();
		?>

	</div>
	<div class="panel-footer">
	</div>
</div>

@endsection

@section('scripts')

<script id="ColumnTemplate" type="text/x-kendo-tmpl">
	<a href="../videos/modaldetallevideo/#=idvideos #" class="btn btn-primary" data-modal="modal-lg">Ver video</a>
	@if(Auth::user()->rol =='admin')
		<a href="../videos/modaleditavideo/#=idvideos #" class="btn btn-success" data-modal="modal-lg">Editar</a>
		<button class="btn btn-danger" onClick="Eliminavideo(#=idvideos #)">Eliminar</button>
	@endif
</script>

<script id="toolbar" type="text/x-kendo-tmpl">
@if(Auth::user()->rol =='admin')
<a href="../videos/modalinsertarvideo" class="btn btn-primary" data-modal="modal-lg">Agregar video</a>
@endif
</script>


<script type="text/javascript"> 


function Eliminavideo(id){

	$.msgbox('¿Esta seguro que que desea eliminar este video?', { type: 'confirm' }, function(result){
		if(result == 'Aceptar'){
			$.post('video/delVideo',{"id":id},function(data){
				data = JSON.parse(data);
				if(data.estado){
					$.msgbox(data.mensaje, { type: 'success' }, function(){
						$("#grid").data("kendoGrid").dataSource.read();
						modalBs.modal('hide');
					});
				}
			}).error(function(data){
				$.msgbox('error al eliminar el video', { type: 'error' }, function(){
					modalBs.modal('hide');
				});
			})
		}
	});


}


</script>
@endsection