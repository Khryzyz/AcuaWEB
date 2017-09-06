<div class="w3-card margin-bottom-10">
    <div class="w3-container bg-danger margin-bottom-05">
        <h5><i class="fa fa-gear"></i> Nuevo Proceso</h5>
    </div>
    <div class="w3-container">
        <div class="row margin-bottom-05">
            <div class="col-md-12">
                <h6>Nombre: {{$nombre}}</h6>
                <h6>Registrado por: {{$nombreusuario}}</h6>
                <a href="{{route('modalInfoProcesoById',['idProceso'=>$id])}}"
                   class="btn-sm"
                   data-modal="modal-md" style="color: black">
                    <i class="fa fa-gear"></i> Ver Proceso</a>
            </div>
        </div>
    </div>
</div>