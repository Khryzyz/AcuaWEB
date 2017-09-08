@extends('layouts.Dashboard.Report')

@section('content')
    <table style="width:100%" class="titulo-reporte">
        <tr class="titulo-reporte">
            <td width="10%" class="texto-centro titulo-reporte">
                <img src="{{url('/img/AcuaponiaLOGO.png')}}" alt="Image" height="60em" width="60em"/>
            </td>
            <td width="90%" class="titulo-reporte">
                <h2>Sistema AquaWEB</h2>
                <h4>Reporte resumen de proceso</h4>
            </td>
        </tr>
    </table>

    <h3 class="padding-bottom-10">1. Información del proceso</h3>
    <ul>
        <li><strong>Codigo:</strong> {{strtoupper($dataProceso->codigo)}}</li>
        <li><strong>Tipo de Acceso:</strong> {{strtoupper($dataProceso->tipoacceso)}}</li>
        <li><strong>Nombre:</strong> {{strtoupper($dataProceso->nombre)}}</li>
        <li><strong>Descripción:</strong> {{$dataProceso->descripcion}}</li>
        <li><strong>Fecha Implementación:</strong> {{$dataProceso->fechaimplementacion}}</li>
        <li><strong>Area Cultivo:</strong> {{$dataProceso->areacultivo}} m²</li>
        <li><strong>Volumen Cultivo:</strong> {{$dataProceso->volumencultivo}} m³</li>
        <li><strong>Estado:</strong> {{$dataProceso->estado}}</li>
    </ul>
    <h3 class="padding-bottom-10">2. Especimenes asociados</h3>
    <h4>2.1 Plantas</h4>
    <?php
    if(count((array)$dataPlanta) > 0){
    ?>
    <table style="width:100%">
        <tr class="header-tabla">
            <th>Elemento</th>
            <th>Nombre</th>
            <th>Porcentaje</th>
            <th>Fecha Actualización</th>
        </tr>
        <?php
        for ($i = 0;$i < count((array)$dataPlanta);$i++){
        $planta = (array)$dataPlanta[$i];
        ?>
        <tr <?php if (($i % 2) != 0) echo "class='celda-par'";?>>
            <td class="texto-centro" width="15%">{{$i+1}}</td>
            <td width="35%">{{$planta['nombre']}}</td>
            <td class="texto-derecha" width="25%">{{$planta['porcentaje']}}</td>
            <td class="texto-derecha" width="25%">{{$planta['actualizacion']}}</td>
        </tr>
        <?php
        }?>
    </table>
    <?php
    }else {
    ?>
    <p>No hay plantas asociadas al proceso</p>
    <?php
    }
    ?>

    <h4>2.2 Peces</h4>
    <?php
    if(count((array)$dataPlanta) > 0){
    ?>
    <table style="width:100%">
        <tr class="header-tabla">
            <th>Elemento</th>
            <th>Nombre</th>
            <th>Porcentaje</th>
            <th>Fecha Actualización</th>
        </tr>
        <?php
        for ($i = 0;$i < count((array)$dataPez);$i++){
        $pez = (array)$dataPez[$i];
        ?>
        <tr <?php if (($i % 2) != 0) echo "class='celda-par'";?>>
            <td class="texto-centro" width="15%">{{$i+1}}</td>
            <td width="35%">{{$pez['nombre']}}</td>
            <td class="texto-derecha" width="25%">{{$pez['porcentaje']}}</td>
            <td class="texto-derecha" width="25%">{{$pez['actualizacion']}}</td>
        </tr>
        <?php
        }?>
    </table>
    <?php
    }else {
    ?>
    <p>No hay peces asociados al proceso</p>
    <?php
    }
    ?>
    <h3 class="padding-bottom-10">3. Valores del proceso</h3>
    <?php
    for ($i = 0; $i < count($data); $i++) {
    $registroSensor = $data[$i];
    $sensor = $registroSensor[0];
    $valorSensor = $registroSensor[1];
    ?>
    <h4>3.{{$i+1}} {{$sensor['nombre']}}</h4>
    <table style="width:100%">
        <tr class="header-tabla">
            <?php
            if(count($valorSensor) < 15)
            {
            ?>
            <th width="50%">Fecha</th>
            <th width="50%">Valor ({{$sensor['unidad']}})</th>
            <?php
            }else{
            ?>
            <th width="25%">Fecha</th>
            <th width="25%">Valor ({{$sensor['unidad']}})</th>
            <th width="25%">Fecha</th>
            <th width="25%">Valor ({{$sensor['unidad']}})</th>
            <?php
            }
            ?>
        </tr>
        <?php
        if(count($valorSensor) < 15){
        for ($j = 0; $j < count($valorSensor); $j++) {
        $tomaSensor = (array)$valorSensor[$j];
        ?>
        <tr <?php if (($j % 2) != 0) echo "class='celda-par'";?>>
            <td class="texto-centro" width="50%">{{$tomaSensor['fecha']}}</td>
            <td class="texto-derecha" width="50%">{{$tomaSensor['valor']}}</td>
        </tr>
        <?php
        }
        }else{
        for ($j = 0; $j < 15; $j++) {
        $tomaSensor = (array)$valorSensor[$j];
        ?>
        <tr <?php if (($j % 2) != 0) echo "class='celda-par'";?>>
            <td class="texto-centro" width="25%">{{$tomaSensor['fecha']}}</td>
            <td class="texto-derecha" width="25%">{{$tomaSensor['valor']}}</td>
            <?php if(isset($valorSensor[$j + 15])){
            $tomaSensorDos = (array)$valorSensor[$j + 15];
            ?>
            <td class="texto-centro" width="25%">{{$tomaSensor['fecha']}}</td>
            <td class="texto-derecha" width="25%">{{$tomaSensor['valor']}}</td>
            <?php
            }?>

        </tr>
        <?php
        }
        }
        ?>
    </table>
    <?php
    }
    ?>
@endsection
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    table {
        padding-bottom: 0.5cm;
    }

    table.titulo-reporte, tr.titulo-reporte, td.titulo-reporte {
        border: none;
    }

    .padding-bottom-10 {
        padding-bottom: 0.1cm;
    }

    .header-tabla {
        background-color: black;
        color: white;
    }

    .celda-par {
        background-color: lightgray;
    }

    .texto-centro {
        text-align: center;
    }

    .texto-derecha {
        text-align: right;
    }
</style>