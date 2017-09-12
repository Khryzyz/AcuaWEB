@extends('layouts.Dashboard.MainLogin')

@section('content')
    {!!Form::open()!!}
    <div class="container">

        <div class="row">

            <div class="col-md-6 col-md-offset-3">

                <div class="login-panel panel panel-info">

                    <div class="panel-heading">
                        <h1 class="panel-title text-center"><strong>Sistema Aquaweb</strong></h1>
                        <h5 class="panel-title text-center">Formulario de ingreso</h5>
                    </div>


                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">

                                <img src="{{url('/img/AcuaponiaLOGO.png')}}"
                                     alt="Image"
                                     height="100%"
                                     width="100%"/>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text" class="form-control" name="username"
                                           value="{{ old('username') }}">
                                </div>

                                <div class="form-group">
                                    {!!Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña'])!!}
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recuerdame
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>
                                </div>
                                <div class="form-group text-center">
                                    <a href="{{route('registrarUsuario')}}" data-modal="modal-md">
                                        Registrate</a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    {!!Form::close()!!}
@endsection

@section('scripts')

@endsection