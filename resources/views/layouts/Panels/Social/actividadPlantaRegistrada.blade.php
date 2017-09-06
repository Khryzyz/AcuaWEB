<div class="w3-card margin-bottom-10">
    <div class="w3-container bg-success margin-bottom-05">
        <h5><i class="fa fa-leaf"></i> Nueva Planta</h5>
    </div>
    <div class="w3-container">
        <div class="row margin-bottom-05">
            <div class="col-md-3">
                <!-- Imagen -->
                <?php if($imagen){
                ?>
                <img src="{{url('/img/gallery/'.$imagen)}}" class="img-responsive img-thumbnail text-center"
                     alt="Imagen"
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
            <div class="col-md-9">
                <h6>Nombre: {{$nombre}}</h6>
                <h6>Registrado por: {{$nombreusuario}}</h6>
                <a href="{{route('modalInfoPlantaById',['idPlanta'=>$id])}}"
                   class="btn-sm"
                   data-modal="modal-xl" style="color: black">
                    <i class="fa fa-leaf"></i> Ver Planta</a></br>
            </div>
        </div>
    </div>
</div>