<div id="ModalEditarEspecimenesProceso">
    {!!Form::open(['url' => route('modalEditarEspecimenesProcesos'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-default">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-gear"></i> Editar espécimenes {{$data->nombre}}</h4>
    </div>
    <div class="modal-body">

        <?php

        $transport = new \Kendo\Data\DataSourceTransport();

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(route('getPlantasByUsuarioIdByList'))
            ->contentType('application/json')
            ->type('POST');

        $transport->read($read)
            ->parameterMap('function(data) {
                return kendo.stringify(data); }');

        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
            ->total('total');

        $dataSource = new \Kendo\Data\DataSource();

        $dataSource->transport($transport)
            ->schema($schema)
            ->pageSize(15);

        $listview = new \Kendo\UI\ListView('listView');
        $listview->dataSource($dataSource)
            ->templateId('template')
            ->selectable('multiple')
            ->pageable(true);

        echo $listview->render();
        ?>
    </div>

    <div class="box wide">
        <h4>Console Log</h4>
        <div class="console"></div>
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

<script type="text/x-kendo-tmpl" id="template">
    <div class="product">
        <h3>#:nombre#</h3>
    </div>

</script>

<script>
    function onDataBound() {
        kendoConsole.log("ListView data bound");
    }

    function onChange() {
        var data = this.dataSource.view(),
            selected = $.map(this.select(), function (item) {
                return data[$(item).index()].ProductName;
            });

        kendoConsole.log("Selected: " + selected.length + " item(s), [" + selected.join(", ") + "]");
    }
</script>

<style>
    .product {
        float: left;
        width: 220px;
        height: 110px;
        margin: 0;
        padding: 5px;
        cursor: pointer;
    }

    .product img {
        float: left;
        width: 110px;
        height: 110px;
    }

    .product h3 {
        margin: 0;
        padding: 10px 0 0 10px;
        font-size: .9em;
        overflow: hidden;
        font-weight: normal;
        float: left;
        max-width: 100px;
        text-transform: uppercase;
    }

    .k-pager-wrap {
        border-top: 0;
    }

    .demo-section .k-listview:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
    }
</style>