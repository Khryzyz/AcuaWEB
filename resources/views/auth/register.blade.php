@extends('layouts.general.principal')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Formulario de Registro</h3>
                </div>
                {!!Form::open()!!}
                <div class="panel-body">
                    <form role="form">

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('username', 'Usuario: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('username',null,['class'=>'form-control', 'required',  'placeholder'=>'Usuario'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('password', 'Contraseña: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('password_confirmation', 'Confirme su Contraseña: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::password('password_confirmation',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('primer_nombre', 'Primer Nombre: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('primer_nombre',null,['class'=>'form-control', 'required',  'placeholder'=>'Primer Nombre'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('segundo_nombre', 'Segundo Nombre: ')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('segundo_nombre',null,['class'=>'form-control',  'placeholder'=>'Segundo Nombre'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('primer_apellido', 'Primer Apellido: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('primer_apellido',null,['class'=>'form-control', 'required',  'placeholder'=>'Primer Apellido'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('segundo_apellido', 'Segundo Apellido: ')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('segundo_apellido',null,['class'=>'form-control',  'placeholder'=>'Segundo Apellido'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('email', 'Correo Electronico: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::email('email',null,['class'=>'form-control', 'required', 'data-email-msg'=>'Formato de correo no valido', 'placeholder'=>'Correo Electronico'])!!}
                            </div>
                        </div>

                        <?php
                        $numeroTelefonico = new \Kendo\UI\MaskedTextBox('numeroTelefonico');
                        $numeroTelefonico->value("");
                        $numeroTelefonico->mask("(0) 000 00 00");
                        ?>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('numeroTelefonico', 'Telefono:')!!}
                            </div>
                            <div col-md-3>
                                {!!$numeroTelefonico->render()!!}
                            </div>
                        </div>

                        <?php
                        $numeroCelular = new \Kendo\UI\MaskedTextBox('numeroCelular');
                        $numeroCelular->value("");
                        $numeroCelular->mask("000 000 00 00");
                        $numeroCelular->attr('data-validmask-msg', 'Número celular incompleto');
                        ?>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('numeroCelular', 'Numero Celular: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!$numeroCelular->render()!!}
                            </div>
                        </div>

                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Registrar"/>
                    </form>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>


    <script type="text/javascript">

        $(function () {
            validarFormulario();// validar forularios con kendo
        });

        function validarFormulario() {
            var container = $('form');

            kendo.init(container);

            container.kendoValidator({
                //organiza los mensajes personalizados
                messages: {
                    confirmaPasswords: "Contraseñas no coinciden",
                    required: "Este campo es obligatorio"
                },
                //define reglas si necesita tener mas  de solo el campo requerido
                rules: {
                    confirmaPasswords: function (input) {
                        if (input.is("[name=password_confirmation]") || input.is("[name=password]")) {
                            if (input.is("[name=password_confirmation]" )) {
                                return input.val() === $("#password").val();
                            }
                            if (input.is("[name=password]")) {
                                return input.val() === $("#password_confirmation").val();
                            }
                        }
                        return true;
                    }
                }
            });
        }

    </script>
@endsection
