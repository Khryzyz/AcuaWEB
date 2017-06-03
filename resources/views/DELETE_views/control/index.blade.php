@extends('layouts.Dashboard.Main')

@section('content')

<?php
$Utils = new Utils();
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Control de cambio</h3>
	</div>
	<div class="panel-body">


		<div class="panel panel-info col-md-6" style="padding: 0">
			<div class="panel-heading">
				<h3 class="panel-title">Control de flujo</h3>
			</div>
			<div class="panel-body">
				<p>
					<select id="prueba" class="form-control">
						<option value="">.....</option>
						<option value="0">0</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="75">75</option>
						<option value="100">100</option>
					</select>
				</p>
				<button type="button" class="btn btn-primary" id="ncaudal">Enviar</button>
			</div>
		</div>

		<div class="panel panel-info col-md-6" style="padding: 0">
			<div class="panel-heading">
				<h3 class="panel-title">Alimentar peces</h3>
			</div>
			<div class="panel-body">
				<button type="button" class="btn btn-danger" id="send-btn">Alimentar</button>
			</div>
		</div>

	</div>
	<div class="panel-footer">
	</div>
</div>

@endsection

@section('scripts')




<script language="javascript" type="text/javascript">  
$(document).ready(function(){
	//create a new WebSocket object.
	var wsUri = "ws://192.168.0.245:7070"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		//$('#message_box').append("<div class=\"system_msg\">Connected!</div>"); //notify user
		console.log('usuario conectado');
	}

	$('#send-btn').click(function(){ //use clicks message send button	
		websocket.send('ON');
	});
	
	$('#cerrar').click(function(){ //use clicks message send button	
		websocket.send('cerrar');
	});
	
	$('#ncaudal').click(function(){
		var valor = $("#prueba").val();
		if(valor!=""){
			console.log(valor);
			websocket.send(valor);
		}
	})
	
	//#### Message received from server?
	websocket.onmessage = function(ev) {
		var msg = JSON.parse(ev.data); //PHP sends Json data
		//console.log(msg.message);
		if(msg.message == 'alimento')
		{
			document.getElementById("send-btn").style.backgroundColor ='green';
		}

		
	};
	
	websocket.onerror	= function(ev){$('#message_box').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");}; 
	websocket.onclose 	= function(ev){$('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");}; 
});
</script>
@endsection