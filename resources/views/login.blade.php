
@extends('layouts.general.principal')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Formulario de ingreso</h3>
                    </div>
                    {!!Form::open()!!}
                    <div class="panel-body">
                        <form role="form">

                            <fieldset>
                                <div class="form-group">
                                    {!!Form::email('email',null,['class'=>'form-control', 'required', 'data-email-msg'=>'Formato de correo no valido', 'placeholder'=>'Usuario'])!!}
                                </div>
                                <div class="form-group">
                                	{!!Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña'])!!}
                                </div>
                                <div class="checkbox">
                                    <!--<label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>-->
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>
                                <a href="facebook" class="btn btn-primary btn-lg  btn-block">Iniciar sesion con Facebook</a>

                            </fieldset>
                        </form>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

@endsection