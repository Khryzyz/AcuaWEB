<div id="AgregarProceso">
    {!!Form::open()!!}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>Agregar Proceso</h4>
    </div>
    <div class="modal-body" style="padding:40px 50px;">
        <form role="form">
            <div class="form-group">
                <div col-md-4>
                    {!!Form::label('nombre', 'Nombre Del Proceso: (*)')!!}
                </div>
                <div col-md-3>
                    {!!Form::text('nombre',null,['class'=>'form-control', 'required',  'placeholder'=>'Nombre del proceso'])!!}
                </div>
            </div>
            <div class="form-group">
                <div col-md-4>
                    {!!Form::label('descripcion', 'Descripcion Del Proceso: (*)')!!}
                </div>
                <div col-md-3>
                    {!!Form::text('descripcion',null,['class'=>'form-control', 'required',  'placeholder'=>'Descripción del proceso'])!!}
                </div>
            </div>
            <div class="form-group">
                <div col-md-4>
                    {!!Form::label('area', 'Area cultivo: (*)')!!}
                </div>
                <div col-md-3>
                    {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'placeholder'=>'Area cultivo'])!!}
                </div>
            </div>
            <div class="form-group">
                <div col-md-4>
                    {!!Form::label('volumen', 'Volumen de cultivo: (*)')!!}
                </div>
                <div col-md-3>
                    {!!Form::number('volumen',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'placeholder'=>'Volumen del cultivo'])!!}
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
    {!!Form::close()!!}
</div>