<!DOCTYPE html>

<html lang="es">

<head>

    <!-- Espacio para etiquetas meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="christhian torres">
    <meta name='csrf-param' content='authenticity_token'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Titulo de la aplicacion-->
    <title>Aquaweb</title>

    <!------------------------------------------------------------------------------------------------------------------
    -- AREA DE CARGA CSS -----------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------->

    <!-- Bootstrap Core CSS -->
    {!!Html::style('css/bootstrap.min.css')!!}
    <!-- Datatables CSS -->
    {!!Html::style('css/plugin/datatables/dataTables.bootstrap.css')!!}
    {!!Html::style('css/plugin/datatables/dataTables.bootstrap.min.css')!!}
    <!-- MetisMenu CSS -->
    {!!Html::style('css/metisMenu.min.css')!!}
    <!-- Timeline CSS -->
    {!!Html::style('css/timeline.css')!!}
    <!-- Custom CSS -->
    {!!Html::style('css/sb-admin-2.css')!!}
    <!-- Custom Fonts -->
    {!!Html::style('css/font-awesome.min.css')!!}
    <!-- MsgBox css-->
    {!!Html::style('css/msgbox/jquery.msgbox.css')!!}
    <!-- Kendo css-->
    {!!Html::style('css/kendo/kendo.common.min.css')!!}
    {!!Html::style('css/kendo/kendo.bootstrap.min.css')!!}

    <!------------------------------------------------------------------------------------------------------------------
    -- FIN AREA DE CARGA CSS -------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------->

    <!------------------------------------------------------------------------------------------------------------------
    -- AREA DE CARGA JAVASCRIPT ----------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------->

    <!-- jQuery -->
    {!!Html::script('js/jquery.min.js')!!}
    <!-- Datatables JavaScript -->
    {!!Html::script('js/plugin/datatables/jquery.dataTables.min.js')!!}
    {!!Html::script('js/plugin/datatables/dataTables.bootstrap.min.js')!!}
    <!-- Bootstrap Core JavaScript -->
    {!!Html::script('js/bootstrap.min.js')!!}
    <!-- Metis Menu Plugin JavaScript -->
    {!!Html::script('js/metisMenu.min.js')!!}
    <!-- Morris Charts JavaScript -->
    {!!Html::script('js/raphael-min.js')!!}
    <!-- Custom Theme JavaScript -->
    {!!Html::script('js/sb-admin-2.js')!!}
    <!-- MsgBox JavaScript -->
    {!!Html::script('js/msgbox/jquery.msgbox.js')!!}
    <!-- Kendo JavaScript -->
    {!!Html::script('js/kendo/kendo.all.min.js')!!}
    {!!Html::script('js/kendo/cultures/kendo.culture.es-ES.min.js')!!}
    {!!Html::script('js/kendo/lang/kendo.es-ES.js')!!}

    <!------------------------------------------------------------------------------------------------------------------
    -- FIN AREA DE CARGA JAVASCRIPT ------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------->

    <!--Configuracion textos Kendo-->
    <script type="text/javascript">
        kendo.culture("es-ES");
    </script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


@yield('content')


<!-- Modal Bootstrap-->
<div id='modalBs' class='modal fade bs-example-modal-lg'>
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>


{!!Html::script('js/inicio.js')!!}


@yield('scripts')

</body>

</html>