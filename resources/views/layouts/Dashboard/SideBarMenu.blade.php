<div class="p-l-0 p-r-0 collapse in" id="sideAcuaponia">

    <div class="panel-body text-center">
        <!-- Imagen -->
        <?php if(Auth::user()->avatar){ ?>
        <img src="{{url('/img/avatar/'.Auth::user()->avatar.".".Auth::user()->extension)}}"
             class="img-responsive img-thumbnail"
             alt="Avatar"
             width="200em"/>
        <?php
        }else{
        ?>
        <img src="{{url('/img/sin_avatar.png')}}" class="img-responsive img-thumbnail"
             alt="Avatar"
             width="200em"/>
    <?php
    }
    ?>
    <!-- FIN Imagen -->
    </div>

    <div class="list-group panel">


        <a href="{{route('home')}}" class="list-group-item collapsed" data-parent="#sideAcuaponia">
            <i class="fa fa-home"></i>
            <span class="hidden-sm-down"> <strong>Inicio</strong></span>
        </a>

        <a href="#menuColegas" class="list-group-item collapsed" data-toggle="collapse"
           data-parent="#sideAcuaponia"
           aria-expanded="false">
            <i class="fa fa-users"></i>
            <span class="hidden-sm-down"> <strong>Colegas</strong></span>
        </a>
        <div class="collapse" id="menuColegas">
            <a href="{{route('socialSolicitudes')}}" class="list-group-item" data-parent="#menuColegas">
                <i class="fa fa-bars"></i>
                <span class="hidden-sm-down">Listado de solicitudes</span>
            </a>
            <a href="{{route('socialColegas')}}" class="list-group-item" data-parent="#menuColegas">
                <i class="fa fa-comments"></i>
                <span class="hidden-sm-down">Listado de colegas</span>
            </a>
            <a href="{{route('comparativaProcesos')}}" class="list-group-item" data-parent="#menuColegas">
                <i class="fa fa-gears"></i>
                <span class="hidden-sm-down">Comparativa de procesos</span>
            </a>
        </div>

        <a href="{{route('procesos')}}" class="list-group-item collapsed" data-parent="#sideAcuaponia">
            <i class="fa fa-line-chart"></i>
            <span class="hidden-sm-down"> <strong>Procesos</strong></span>
        </a>

        <a href="#menuConfiguracion" class="list-group-item collapsed" data-toggle="collapse"
           data-parent="#sideAcuaponia"
           aria-expanded="false">
            <i class="fa fa-gears"></i>
            <span class="hidden-sm-down"> <strong>Configuración</strong></span>
        </a>
        <div class="collapse" id="menuConfiguracion">

            <?php if(Auth::user()->tusuario_id == 2 || Auth::user()->tusuario_id == 3) { ?>

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

            <?php } ?>

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

    </div>
</div>