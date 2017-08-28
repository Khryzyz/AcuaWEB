<div id="InfoPlanta">

    <div class="modal-header bg-success">
        <h5 class="modal-title">Galeria</h5>
    </div>
    <div class="modal-body">
        <div class="panel-body">

            <!-- Información del Planta -->
            <div class="panel-group">
                <div class="col-md-3 pre-scrollable" align="right">
                    <?php
                    $i = 1;
                    foreach ($data as $dataImagen) {
                    ?>
                    <div class="thumbnail">
                        <img class="tabsGallery w3-opacity w3-hover-opacity-off portrait"
                             src="{{url('/img/gallery/'. $dataImagen->imagen)}}"
                             onclick="currentDiv({{$i}})">
                    </div>
                    <?php $i++;
                    } ?>
                </div>

                <div class="col-md-8">
                    <?php foreach ($data as $dataImagen) { ?>
                    <div class="slidesGallery">
                        <div class="row margin-bottom-5">
                            <div class="col-md-4">
                                <strong>Nombre:</strong>
                            </div>
                            <div class="col-md-8">
                                {{$dataImagen->titulo}}
                            </div>
                        </div>
                        <div class="row margin-bottom-5">
                            <div class="col-md-4">
                                <strong>Descripción:</strong>
                            </div>
                            <div class="col-md-8">
                                {{$dataImagen->descripcion}}
                            </div>
                        </div>
                        <div class="row margin-bottom-5">
                            <div class="col-md-3">
                                <strong>Creación:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$dataImagen->creacion}}
                            </div>
                            <div class="col-md-3">
                                <strong>Actualización:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$dataImagen->actualizacion}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <img class=" img-responsive img-rounded"
                                     src="{{url('/img/gallery/' . $dataImagen->imagen)}}"
                                     style="height: 400px">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

    </div>
</div>
<script>
    var slideIndex = 1;

    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {

        var i;

        var x = document.getElementsByClassName("slidesGallery");

        var dots = document.getElementsByClassName("tabsGallery");

        if (n > x.length) {
            slideIndex = 1
        }

        if (n < 1) {
            slideIndex = x.length
        }

        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }

        x[slideIndex - 1].style.display = "inline";

        dots[slideIndex - 1].className += " w3-opacity-off";

    }
</script>
