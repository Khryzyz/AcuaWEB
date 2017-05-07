

<div id="modaldetallevideo">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3 class="panel-title"> {{ $datos[0]->nombre }}</h3>
  </div>
  <div class="modal-body">
 
     
    <iframe class="youtube-player" type="text/html" width="100%" height="385" src="http://www.youtube.com/embed/{{ $datos[0]->urlyoutube }}" frameborder="0">
    </iframe>

    <div>
        <h3>Descripción:</h3>
        {{ $datos[0]->descripcion }}
    </div>
  </div>
  <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
 </div>
</div>

