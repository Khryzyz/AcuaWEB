<div id="Galeriapez">

    <div class="modal-header bg-info">
        <h4>Galeria</h4>
    </div>
    <div class="modal-body">

        <div id="blueimp-gallery" class="blueimp-gallery">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>

        <div id="links">
            <?php
            foreach ($data as $dataPlanta) {
            ?>
            <a href="{{url('/img/gallery/'.$dataPlanta->imagen)}}" title="{{$dataPlanta->titulo}}">
                <img src="{{url('/img/gallery/'.$dataPlanta->imagen)}}" class="img-responsive img-thumbnail"
                     width="200px" height="200px"
                     alt="Imagen no disponible"/>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar</button>
    </div>

</div>
<script>
    document.getElementById('links').onclick = function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement,
            link = target.src ? target.parentNode : target,
            options = {index: link, event: event},
            links = this.getElementsByTagName('a');
        blueimp.Gallery(links, options);
    };
</script>