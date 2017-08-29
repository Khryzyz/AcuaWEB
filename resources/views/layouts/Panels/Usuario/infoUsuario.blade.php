<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-users"></i> Información del usuario</h4>
    </div>
    <div class="panel-body">
        <div class="row margin-bottom-10">
            <div class="col-md-2">
                <i class="fa fa-book"></i>
                Nombre:
            </div>
            <div class="col-md-10">
                {{$data->nombreusuario}}
            </div>
        </div>
        <div class="row margin-bottom-10">
            <div class="col-md-2">
                <i class="fa fa-user"></i>
                Usuario:
            </div>
            <div class="col-md-10">
                {{$data->usuario}}
            </div>
        </div>
        <div class="row margin-bottom-10">
            <div class="col-md-2">
                <i class="fa fa-certificate"></i>
                Tipo de Usuario:
            </div>
            <div class="col-md-10">
                {{$data->rol}}
            </div>
        </div>
        <div class="row margin-bottom-10">
            <div class="col-md-2">
                <i class="fa fa-envelope-o"></i>
                Correo:
            </div>
            <div class="col-md-10">
                {{$data->correo}}
            </div>
        </div>
    </div>
</div>