<div id="ModalEditarEspecimenesProceso">
    {!!Form::open(['url' => route('modalEditarEspecimenesProcesos'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-default">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-gear"></i> Editar espécimenes {{$data->nombre}}</h4>
    </div>
    <div class="modal-body">
        <div class="row margin-bottom-10">
            <div class="col-md-12">
                {!!Form::label('especimenPlanta', 'Espécimen planta:')!!}
            </div>
            <div class="col-md-12">
                <?php
                $readPlanta = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPlanta
                    ->url(route('getPlantasByUsuarioIdForProceso', ['idProceso' => $data->id]))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportPlanta = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportPlanta
                    ->read($readPlanta)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');


                //Inicializamos el esquema de la grid
                $schemaPlanta = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema del grid
                $schemaPlanta
                    ->data('data')
                    ->total('total');

                //Inicializamos el Data Source
                $dataSourcePlanta = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourcePlanta
                    ->transport($transportPlanta)
                    ->pageSize(100)
                    ->schema($schemaPlanta)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                $multiSelectPlanta = new \Kendo\UI\MultiSelect('especimenPlanta');

                $multiSelectPlanta->dataSource($dataSourcePlanta)
                    ->placeholder('Selecciones espécimen...')
                    ->dataTextField('nombre')
                    ->dataValueField('idplanta')
                    ->headerTemplateId('headerEspecimen')
                    ->itemTemplateId('itemEspecimen')
                    ->tagTemplateId('tagEspecimen')
                    ->attr('style', 'width:100%')
                    ->height(400);

                echo $multiSelectPlanta->render();
                ?>
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-12">
                {!!Form::label('especimenPez', 'Espécimen pez:')!!}
            </div>
            <div class="col-md-12">
                <?php
                $readPez = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPez
                    ->url(route('getPecesByUsuarioIdForProceso', ['idProceso' => $data->id]))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportPez = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportPez
                    ->read($readPez)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');


                //Inicializamos el esquema de la grid
                $schemaPez = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema del grid
                $schemaPez
                    ->data('data')
                    ->total('total');

                //Inicializamos el Data Source
                $dataSourcePez = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourcePez
                    ->transport($transportPez)
                    ->pageSize(100)
                    ->schema($schemaPez)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                $multiSelectPez = new \Kendo\UI\MultiSelect('especimenPez');

                $multiSelectPez->dataSource($dataSourcePez)
                    ->placeholder('Selecciones espécimen...')
                    ->dataTextField('nombre')
                    ->dataValueField('idpez')
                    ->headerTemplateId('headerEspecimen')
                    ->itemTemplateId('itemEspecimen')
                    ->tagTemplateId('tagEspecimen')
                    ->attr('style', 'width:100%')
                    ->height(400);

                echo $multiSelectPez->render();
                ?>
            </div>
        </div>

        @include('layouts.Panels.Annotations.someFieldsRequired')

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
    {!!Form::close()!!}
</div>
<script type="text/javascript">
    var modal = $('#ModalEditarEspecimenesProceso');

    $(function () {

        // validar forularios con kendo
        validarFormulario();

        // Respuesta del evento retorno del formulario
        eventResultForm(modal, onSuccess)

    });

    // validar forularios con kendo
    function validarFormulario() {
        var container = $('form');

        kendo.init(container);

        container.kendoValidator({
            //organiza los mensajes personalizados
            messages: {
                required: "Este campo es obligatorio"
            }
        });
    }

    // Respuesta del evento retorno del formulario
    function onSuccess(result) {

        result = JSON.parse(result)

        switch (result.estado) {
            case "success":
                $.msgbox(result.mensaje, {type: 'success'}, function () {
                    modalBs.modal('hide');
                    $('#GridProceso').data('kendoGrid').dataSource.read();
                    $('#GridProceso').data('kendoGrid').refresh();
                });
                break;
            case "error":
                $.msgbox(result.mensaje, {type: 'warning'});
                break;
            case "fatal":
                $.msgbox(result.mensaje, {type: 'error'});
                break;
            default:
                $.msgbox("Error desconocido", {type: 'error'});
        }

    }
</script>
<script id="headerEspecimen" type="text/x-kendo-tmpl">
    <div class="dropdown-header k-widget k-header">
        <span>Foto</span>
        <span>Especimen</span>
    </div>


</script>

<script id="itemEspecimen" type="text/x-kendo-tmpl">
    <span class="k-state-default" style="background-image: url(/img/gallery/#: data.imagen #")></span>
    <span class="k-state-default"><h3>#: data.nombre #</h3><p>#: data.usuario #</p></span>


</script>

<script id="tagEspecimen" type="text/x-kendo-tmpl">
    <span class="selected-value" style="background-image: url(/img/gallery/#: data.imagen #") />
    <span>#:data.nombre#</span>


</script>

<style>
    .dropdown-header {
        border-width: 0 0 1px 0;
        text-transform: uppercase;
    }

    .dropdown-header > span {
        display: inline-block;
        padding: 10px;
    }

    .dropdown-header > span:first-child {
        width: 50px;
    }

    .selected-value {
        display: inline-block;
        vertical-align: middle;
        width: 18px;
        height: 18px;
        background-size: 100%;
        margin-right: 5px;
        border-radius: 50%;
    }

    #especimenPlanta-list .k-item, #especimenPez-list .k-item {
        line-height: 1em;
        min-width: 300px;
    }

    /* Material Theme padding adjustment*/

    .k-material #especimenPez-list .k-item,
    .k-material #especimenPez-list .k-item.k-state-hover,
    .k-materialblack #especimenPez-list .k-item,
    .k-materialblack #especimenPez-list .k-item.k-state-hover,
    .k-material #especimenPlanta-list .k-item,
    .k-material #especimenPlanta-list .k-item.k-state-hover,
    .k-materialblack #especimenPlanta-list .k-item,
    .k-materialblack #especimenPlanta-list .k-item.k-state-hover {
        padding-left: 5px;
        border-left: 0;
    }

    #especimenPez-list .k-item > span,
    #especimenPlanta-list .k-item > span {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: inline-block;
        vertical-align: top;
        margin: 20px 10px 10px 5px;
    }

    #especimenPez-list .k-item > span:first-child,
    #especimenPlanta-list .k-item > span:first-child {
        -moz-box-shadow: inset 0 0 30px rgba(0, 0, 0, .3);
        -webkit-box-shadow: inset 0 0 30px rgba(0, 0, 0, .3);
        box-shadow: inset 0 0 30px rgba(0, 0, 0, .3);
        margin: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    #especimenPez-list h3,
    #especimenPlanta-list h3 {
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 1px 0;
        padding: 0;
    }

    #especimenPez-list p,
    #especimenPlanta-list p {
        margin: 0;
        padding: 0;
        font-size: .8em;
    }

</style>