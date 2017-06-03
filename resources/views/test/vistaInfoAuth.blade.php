@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>

    <h1>Info Auth</h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Info Obtenida en la autenticacion</h3>
        </div>
        <div class="panel-body">
            <p>Id de usuario: {{Auth::user()->id}}</p>
            <p>Nombre de usuario: {{Auth::user()->username}}</p>
            <p>Email de usuario: {{Auth::user()->email}}</p>
            <p>Rol de usuario: {{Auth::user()->role}}</p>
            <p>Primer Nombre: {{Auth::user()->primer_nombre}}</p>
            <p>Segundo Nombre: {{Auth::user()->segundo_nombre}}</p>
            <p>Primer Apellido: {{Auth::user()->primer_apellido}}</p>
            <p>Segundo Apelido: {{Auth::user()->segundo_apellido}}</p>
            <p>Estado: {{Auth::user()->estado}}</p>
            <p>Creado: {{Auth::user()->created_at}}</p>
            <p>Actualizado: {{Auth::user()->updated_at}}</p>
        </div>
        <div class="panel-footer">
        </div>
    </div>
@endsection

@section('scripts')

@endsection