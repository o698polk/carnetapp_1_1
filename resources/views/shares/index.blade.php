<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ARCHIVOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
   <form id="formularioSubida" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="archivo" id="archivoInput">
    <button type="submit">Subir Archivo</button>
</form>

<div class="progress">
    <div class="progress-bar" id="barraProgreso" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#formularioSubida').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var porcentaje = (evt.loaded / evt.total) * 100;
                        $('#barraProgreso').width(porcentaje + '%').attr('aria-valuenow', porcentaje);
                    }
                }, false);
                return xhr;
            },
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('Subida completada:', response);
                // Aquí puedes realizar acciones adicionales después de la subida del archivo
            },
            error: function(xhr, status, error) {
                console.error('Error de subida:', error);
            }
        });
    });
});
</script>




</div>



@endsection