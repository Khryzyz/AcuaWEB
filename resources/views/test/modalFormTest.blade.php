<?php
    $Utils = new Utils();
?>

<div id="modalForm">
    {!!Form::open()!!}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Titulo del modal</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            {!!Form::label('Usuario*')!!}
            {!!Form::text('usuario',null,['class'=>'form-control', 'required', 'id'=>'usuario'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('E-mail*')!!}
            {!!Form::email('email',null,['class'=>'form-control', 'required', 'data-email-msg'=>'Formato de correo no valido'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Contraseña*')!!}
            {!!Form::password('contra',['class'=>'form-control', 'required'])!!}
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
{!!Form::close()!!}


<script type="text/javascript" src='{{ url($Utils->getRouteJs())}}'></script>
