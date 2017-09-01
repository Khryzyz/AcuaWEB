<div class="w3-card margin-bottom-05">
    <div class="w3-container bg-primary">
        <h6><i class="fa fa-user"></i> {{$nombreusuario}}</h6>
    </div>
    <div class="w3-container">
        <div class="row">
            <div class="col-md-3">
                <!-- Imagen -->
                <?php if($avatar){
                ?>
                <img src="{{url('/img/avatar/'.$avatar)}}"
                     class="img-thumbnail"
                     alt="Avatar"
                     height="70em"
                     width="70em"/>
                <?php
                }else{
                ?>
                <img src="{{url('/img/sin_avatar.png')}}"
                     class="img-rounded"
                     alt="Avatar"
                     height="70em"
                     width="70em"/>
            <?php
            }
            ?>
            <!-- FIN Imagen -->
            </div>
            <div class="col-md-4">
                <h6>Procesos: {{$procesos}}</h6>
                <h6>Peces: {{$peces}}</h6>
                <h6>Plantas: {{$plantas}}</h6>
            </div>
            <div class="col-md-5">
                <a href="{{route('modalInfoUsuarioPublicoById',['idUsuario'=>$idusuario])}}"
                   class="btn-sm"
                   data-modal="modal-xl" style="color: black">
                    <i class="fa fa-user"></i> Ver Usuario</a></br>
                <a href="/social/modalAgregarColega/{{$idusuario}}"
                   class="btn-sm"
                   data-modal="modal-sm" style="color: black">
                    <i class="fa fa-plus-square"></i> Agregar a colegas</a>
            </div>
        </div>
    </div>
</div>