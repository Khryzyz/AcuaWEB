<div id="modaeditarvideo">
 {!!Form::model($datos, array('route' => array('user.update', $datos->idvideos)))!!}
 <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4> Editar información del cideo </h4>
</div>
<div class="modal-body">

  <div class="form-group">

    {!!Form::hidden('idvideos',null,['class'=>'form-control', 'required', 'id'=>'idvideos'])!!}
  </div>

  <div class="form-group">
    {!!Form::label('Nombre del video*')!!}
    {!!Form::text('nombre',null,['class'=>'form-control', 'required', 'id'=>'nombre'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('Descripcion')!!}
    {!!Form::textarea('descripcion',null,['class'=>'form-control', 'id'=>'descripcion', 'style'=>'resize:none'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('Id youtube*')!!}
    {!!Form::text('urlyoutube',null,['class'=>'form-control', 'required', 'id'=>'urlyoutube'])!!}
  </div>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
 <input type="submit" class="btn btn-primary" value="Guardar">
</div>
</div>
{!!Form::close()!!}


<script type="text/javascript">

var modal = $('#modaeditarvideo');

$(function(){
    validarFormulario();// validar forularios con kendo
    EventoFormularioModal(modal, onSuccess)
  });

function validarFormulario(){
  /*metodo de kendo para validar los formulario*/
  $('form').kendoValidator({
      //organiza los mensajes personalizados
      messages: {
       required: "Este campo es obligatorio",
     },
         //define reglas si necesita tener mas  de solo el campo requerido
         rules: {

         }
       });
}

function onSuccess(result) {
  result = JSON.parse(result)
  if(result.estado=true){
    $.msgbox(result.mensaje, { type: 'success' }, function(){
      $("#grid").data("kendoGrid").dataSource.read();
      modalBs.modal('hide');
    });
  }
}

</script>