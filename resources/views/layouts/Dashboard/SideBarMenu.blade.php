<div class="p-l-0 p-r-0 collapse in" id="sideAcuaponia">

    <div class="panel-body text-center">
        <!-- Imagen -->
        <?php if(Auth::user()->avatar){
        ?>
        <img src="{{url('/img/avatar/'.Auth::user()->avatar.".".Auth::user()->extension)}}"
             class="img-responsive img-thumbnail" alt="Avatar"
             height="100em"/>
        <?php
        }else{
        ?>
        <img src="{{url('/img/sin_avatar.png')}}" class="img-responsive img-thumbnail" alt="Avatar" height="100em"/>
    <?php
    }
    ?>
    <!-- FIN Imagen -->
    </div>

    <div class="list-group panel">

        <a href="{{route('procesos')}}" class="list-group-item collapsed" data-parent="#sideAcuaponia">
            <i class="fa fa-line-chart"></i>
            <span class="hidden-sm-down">Procesos</span>
        </a>

        <a href="#menuConfiguracion" class="list-group-item collapsed" data-toggle="collapse"
           data-parent="#sideAcuaponia"
           aria-expanded="false">
            <i class="fa fa-gears"></i>
            <span class="hidden-sm-down">Configuración</span>
        </a>
        <div class="collapse" id="menuConfiguracion">
            <a href="{{route('configUsuarios')}}" class="list-group-item" data-parent="#menuConfiguracion">
                <i class="fa fa-users"></i>
                <span class="hidden-sm-down">Usuarios</span>
            </a>
            <a href="{{route('configPlantas')}}" class="list-group-item" data-parent="#menuConfiguracion">
                <i class="fa fa-leaf"></i>
                <span class="hidden-sm-down">Plantas</span>
            </a>
            <a href="{{route('configPeces')}}" class="list-group-item" data-parent="#menuConfiguracion">
                <i class="fa fa-anchor"></i>
                <span class="hidden-sm-down">Peces</span>
            </a>
            <a href="{{route('configPersonal')}}" class="list-group-item" data-parent="#menuConfiguracion">
                <i class="fa fa-user"></i>
                <span class="hidden-sm-down">Información Personal</span>
            </a>

            <a href="{{route('configMisPlantas')}}" class="list-group-item" data-parent="#menuConfiguracion">
                <i class="fa fa-leaf"></i>
                <span class="hidden-sm-down">Mis Plantas</span>
            </a>
            <a href="{{route('configMisPeces')}}" class="list-group-item" data-parent="#menuConfiguracion">
                <i class="fa fa-anchor"></i>
                <span class="hidden-sm-down">Mis Peces</span>
            </a>
        </div>
        <a href="#menuReportes" class="list-group-item collapsed" data-parent="#sideAcuaponia">
            <i class="fa fa-area-chart"></i>
            <span class="hidden-sm-down">Reportes</span>
        </a>
    </div>
</div>