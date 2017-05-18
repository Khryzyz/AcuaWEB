@extends('layouts.admin.principal')

@section('content')

    <h1>Vista Modal</h1>

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title">Vista Modal</h3>
        </div>

        <div class="panel-body">
            <p>Cuepor del panel</p>
            <a href="../test/getModalTest" class="btn btn-primary" data-modal="">Test modal pequeño</a>
            <a href="../test/getModalTest" class="btn btn-primary" data-modal="modal-lg">Test modal grande</a>
            <a href="../test/getModalFormTest/1" class="btn btn-primary" data-modal="">Test modal formulario</a>

        </div>

        <div class="panel-footer">
        </div>

    </div>

@endsection