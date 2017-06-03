<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i> {!! Auth::user()->primer_nombre .' '. Auth::user()->segundo_nombre .' '. Auth::user()->primer_apellido .' '. Auth::user()->segundo_apellido  !!}
        <i class="fa fa-caret-down"> </i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li>
            <a href="../main/modalformulario" data-modal=""><i class="fa fa-user fa-fw"></i>Perfil de Usuario</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-wrench fa-fw"></i>Configuración</a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="auth/logout"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
        </li>
    </ul>
</li>