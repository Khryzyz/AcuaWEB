@extends('layouts.admin.principal')

@section('content')




<div class="panel panel-primary">
	<div class="panel-heading">
		Titulo del panel
	</div>
	<div class="panel-body">
		<p>Cuepor del panel</p>
		<a href="../main/modaltest" class="btn btn-primary" data-modal="">Test modal pequeño</a>
		<a href="../main/modaltest" class="btn btn-primary" data-modal="modal-lg">Test modal grande</a>

		<a href="../main/modalformulario" class="btn btn-primary" data-modal="">Test modal formulario</a>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">


		{!! Form::open(array('url' => 'main/subiralgo')) !!}


		<?php
		$upload = new \Kendo\UI\Upload('files');
		$upload->select('onSelect');
		echo $upload->render();
		?>


		<button type="button" class="btn btn-default" onclick='mostar()'>button</button>
		{!! Form::close() !!}



		<audio controls id="pru" />



	</div>
	<div class="panel-footer">
		el footer del panel
	</div>
</div>

@endsection

<script type="text/javascript">

DatosImagen = [];
var numIma = 0;
var TotalImagenes;
var conten;
var siguiente = 0;
var imagen;
var ancho;
var totaolDocumentos = 0;

function onSelect(evt) {
	DatosImagen = [];
    var files = evt.files; // lista de archivos

    // Loop que recorre la lista de archivo y me carga una variable json con todos los datos para luego usarse para indexar.
    for (var i = 0, f; f = files[i]; i++) {

        //determino lo que cargue fue un archivo de tipo imagen
        /*if (!f.rawFile.type.match('image.*')) {
        	continue;
        } */

        totaolDocumentos++;
        var reader = new FileReader();

        // Obtengo los datos del archivo cargado.
        reader.onload = (function (theFile) {
        	return function (e) {

        		DatosImagen[numIma] = {
        			"ruta": e.target.result,
        			"nombre": theFile.name.replace(" ", ""),
        			"tipoArchivo": theFile.rawFile.type
        		}
        		
        	};
        })(f);

        var ancho = $("#list").width();
        $('.thumb').width(ancho);
        // Read in the image file as a data URL.
        reader.readAsDataURL(document.getElementById("files").files[i]);
        // reader.readAsDataURL(f);
    }
    //setTimeout(onComplete, 5000);
}

function mostar(){
	console.log(DatosImagen);

	$('#pru').attr('src', DatosImagen[0].ruta);
	$('#pru').attr('type', DatosImagen[0].tipoArchivo);
	audio = $('#pru')[0];
	audio.play();
}


</script>