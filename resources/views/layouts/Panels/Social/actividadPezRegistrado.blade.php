<div class="w3-card margin-bottom-05">
    <div class="w3-container bg-info">
        <h6><i class="fa fa-tint"></i> Pez: {{$nombreusuario}}</h6>
    </div>
    <div class="w3-container">
        <div class="row">
            <div class="col-md-3">
                <!-- Imagen -->
                <?php if($avatar){
                ?>
                <img src="{{url('/img/avatar/'.$data->avatar)}}" class="img-responsive img-thumbnail text-center"
                     alt="Avatar"
                     width="80em"/>
                <?php
                }else{
                ?>
                <img src="{{url('/img/sin_imagen.png')}}" class="img-responsive img-thumbnail text-center"
                     alt="Imagen"
                     width="80em"/>
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
                <a href="{{route('modalInfoPezById',['idPlanta'=>$idusuario])}}"
                   class="btn-sm"
                   data-modal="modal-xl" style="color: black">
                    <i class="fa fa-tint"></i> Ver Pez</a></br>
            </div>
        </div>
    </div>
</div>