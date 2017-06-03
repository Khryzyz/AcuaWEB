@extends('layouts.Dashboard.Main')

@section('content')

    <div class="container">
        <div class='col-md-12'> 
            <br/>
        <div>
        <div class="col-md-8 col-md-offset-1">
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
                                {!!Form::text('name',null,['class'=>'form-control', 'required',  'placeholder'=>'Usuario'])!!}
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
                                {!!Form::label('Rol', 'Rol: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('rol',null,['class'=>'form-control', 'required',  'placeholder'=>'Rol'])!!}
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
