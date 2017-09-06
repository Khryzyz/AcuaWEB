@extends('layouts.Dashboard.Main')

@section('content')

    {!!Form::open(['url' => route('comparativaProcesos'), 'method' => 'POST', 'role'=>"form"])!!}

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-exchange"></i> Comparativa de Procesos</h3>
        </div>

        <div class="panel-body">

            <div class="panel panel-yellow">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-users"></i> Información de proceso de colega</h3>
                </div>

                <div class="panel-body">
                    <div class="row margin-bottom-10">
                        <div class="col-md-3">
                            {!!Form::label('listColegas', 'Listado de Colegas:')!!}
                        </div>
                        <div class="col-md-9">
                            <?php
                            $readDropDown = new \Kendo\Data\DataSourceTransportRead();

                            $readDropDown
                                ->url(route('getListColegasByUsuarioId'))
                                ->contentType('application/json')
                                ->type('POST');
                            $transportDropDown = new \Kendo\Data\DataSourceTransport();

                            $transportDropDown->read($readDropDown)
                                ->parameterMap('function(data) {
              return kendo.stringify(data);
           }');

                            $dataSourceDropDown = new \Kendo\Data\DataSource();

                            $dataSourceDropDown->transport($transportDropDown);

                            $dropDownList = new \Kendo\UI\DropDownList('listColegas');

                            $dropDownList->dataSource($dataSourceDropDown)
                                ->dataValueField('idusuario')
                                ->dataTextField('nombreusuario')
                                ->change('onChange')
                                ->optionLabel('Seleccione...')
                                ->attr('style', 'width: 100%')
                                ->attr('required', 'required');

                            echo $dropDownList->render();

                            ?>
                        </div>
                    </div>

                    <div class="row margin-bottom-10">
                        <div class="col-md-3">
                            {!!Form::label('listProcesos', 'Listado de procesos:')!!}
                        </div>
                        <div class="col-md-9">
                            <?php
                            $readDropDown = new \Kendo\Data\DataSourceTransportRead();

                            $readDropDown
                                ->contentType('application/json')
                                ->type('POST');
                            $transportDropDown = new \Kendo\Data\DataSourceTransport();

                            $transportDropDown->read($readDropDown)
                                ->parameterMap('function(data) {
              return kendo.stringify(data);
           }');

                            $dataSourceDropDown = new \Kendo\Data\DataSource();

                            $dataSourceDropDown->transport($transportDropDown);

                            $dropDownList = new \Kendo\UI\DropDownList('listProcesosColega');

                            $dropDownList->dataSource($dataSourceDropDown)
                                ->dataValueField('idproceso')
                                ->dataTextField('nombreproceso')
                                ->optionLabel('Seleccione...')
                                ->attr('style', 'width: 100%')
                                ->attr('required', 'required');

                            echo $dropDownList->render();

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-green">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-user"></i> Información de mi proceso</h3>
                </div>

                <div class="panel-body">
                    <div class="row margin-bottom-10">
                        <div class="col-md-3">
                            {!!Form::label('listProcesos', 'Mi listado de procesos:')!!}
                        </div>
                        <div class="col-md-9">
                            <?php
                            $readDropDown = new \Kendo\Data\DataSourceTransportRead();

                            $readDropDown
                                ->url(route('getListProcesoByColegaId', ['idColega' => Auth::user()->id]))
                                ->contentType('application/json')
                                ->type('POST');
                            $transportDropDown = new \Kendo\Data\DataSourceTransport();

                            $transportDropDown->read($readDropDown)
                                ->parameterMap('function(data) {
              return kendo.stringify(data);
           }');

                            $dataSourceDropDown = new \Kendo\Data\DataSource();

                            $dataSourceDropDown->transport($transportDropDown);

                            $dropDownList = new \Kendo\UI\DropDownList('listProcesosUsuario');

                            $dropDownList->dataSource($dataSourceDropDown)
                                ->dataValueField('idproceso')
                                ->dataTextField('nombreproceso')
                                ->optionLabel('Seleccione...')
                                ->attr('style', 'width: 100%')
                                ->attr('required', 'required');

                            echo $dropDownList->render();

                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary" id="comparativa">
                <i class="fa fa-exchange"></i> Realizar comparativa
            </button>
        </div>

    </div>
    {!!Form::close()!!}
@endsection


@section('scripts')
    <script>

        $(document).ready(function () {

            validarFormulario();


            var dropDownProcesosColega = $("#listProcesosColega").data("kendoDropDownList");

            var dropDownProcesosUsuario = $("#listProcesosUsuario").data("kendoDropDownList");

            var botonComparativa = document.getElementById("comparativa");

            //Deshabilitar DropDownList de procesos de colegas y vaciar los datos
            dropDownProcesosColega.dataSource.data([]);
            dropDownProcesosColega.enable(false);

            //Deshabilitar DropDownList de procesos de usuario
            dropDownProcesosUsuario.enable(false);

            botonComparativa.setAttribute("disabled", "disabled")

        });

        function onChange() {

            var dropDownColegas = $("#listColegas").data("kendoDropDownList");

            var dropDownProcesosColega = $("#listProcesosColega").data("kendoDropDownList");

            var dropDownProcesosUsuario = $("#listProcesosUsuario").data("kendoDropDownList");

            var botonComparativa = document.getElementById("comparativa");

            dato = dropDownColegas.value();

            if (dato) {
                //Cambiar el URL de el DropDownList de procesos de colega y recargar los datos
                dropDownProcesosColega.dataSource.options.transport.read.url = "/social/getListProcesoByColegaId/" + dato;
                dropDownProcesosColega.dataSource.read();
                dropDownProcesosColega.refresh();

                //Habilitar DropDownList de procesos de colegas
                dropDownProcesosColega.enable(true);

                //Habilitar DropDownList de procesos de usuario
                dropDownProcesosUsuario.enable(true);

                //Habilitar el Boton para realizar la comparativa
                botonComparativa.removeAttribute("disabled")

            } else {

                //Deshabilitar DropDownList de procesos de colegas y vaciar los datos
                dropDownProcesosColega.dataSource.data([]);
                dropDownProcesosColega.enable(false);

                //Deshabilitar DropDownList de procesos de usuario
                dropDownProcesosUsuario.enable(false);

                //Deshabilitar el Boton para realizar la comparativa
                botonComparativa.setAttribute("disabled", "disabled")
            }
        }

        function validarFormulario() {
            var container = $('form');

            kendo.init(container);

            container.kendoValidator({
                //organiza los mensajes personalizados
                messages: {
                    required: "Este campo es obligatorio"
                },
                //define reglas si necesita tener mas  de solo el campo requerido
                rules: {}
            });
        }
    </script>
@endsection