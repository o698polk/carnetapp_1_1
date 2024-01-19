


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA       --->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/styleappxx.css') }}">
<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA         --->
@section('title', 'CREDENCIAL')
<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA --->
@section('content')
<br><br><br><br><br><br><br>
<div class="container ">
<h1>HORIZONTAL</h1>
<?php     if (session()->has('user')) { ?>
<div class="carnet" id="carnetid" >

 <?php  $fondo="";
  if($datos->genero=="FEMENINO"){
    $fondo='bgk_institution_f';
  }else{
    $fondo='bgk_institution_m';
  }
  ?>
  <style>
    .barralogo {
  display: flex;
  align-items: center;
}

.barralogo img {
  /* Ajusta el tamaño de la imagen si es necesario */
  width: 100px; /* Por ejemplo */
  height: auto; /* Para mantener la proporción */
  margin-right: 20px; /* Espacio entre la imagen y el texto */
}
#text_titulo {
  /* Alinea el texto junto a la imagen */
  text-align: left; /* O cambia a "right" si deseas alinear a la derecha */
}

  </style>

<div class="content" id="carnetfondo" style="background-image: url(../{{ $datos->failed_jobs[$fondo] }});">
  <div class="barralogo">
    <img src="../{{ $datos->failed_jobs['img_logo'] }}" loading="lazy" id="logout" alt="Mi Foto">
    <span id="text_titulo"> <p id="LetrasSn">{{ $datos->failed_jobs['nombre_institution'] }} </p></span>
  </div>
    
     <img src="../{{ $datos->imgprofile }}" id="perfilimg" alt="Mi Foto"> 
    <h1 class="textmayu">{{$datos->nombre_apellido}} </h1>
    <h2><strong> ID:</strong> {{$datos->dni}}</h2>
    
    <div class="datos" id="fondodata">
   
        <strong id="trabaj_id textmayu">{{$datos->typecrd}}</strong>
        <!--@if(!empty($datos->department)) <p class="textmayu" ><strong > Área:</strong> {{$datos->department}}</p> @endif-->
        @if(!empty($datos->occupation)) <p class="textmayu" ><strong > Rol:</strong> {{$datos->occupation}}</p> @endif
        @if(!empty($datos->level)) <p  id="Facultades" nfacul="@ViewBag.types"><strong class="textmayu"> Curso:</strong> {{$datos->level}}</p>@endif
      <!-- @if(!empty($datos->course)) <p class="textmayu" ><strong > Paralelo:</strong> {{$datos->course}}</p> @endif-->
      <!-- @if(!empty($datos->genero)) <p class="textmayu"><strong > Genero:</strong> {{$datos->genero}}</p> @endif-->
     <!--  @if(!empty($datos->correo)) <p class="conatainer correo_cont texto-minusculas"><strong class="textmayu">Correo:</strong>  {{$datos->correo}}</p>@endif-->
        @if(!empty($datos->blotype))
        <h2 class="tiposangre textmayu"><strong> {{$datos->blotype}}</strong>@endif </h2>
        <div id="qrcode">{{ QrCode::size(115)->generate('https://rpgad.elpeloteotv.com/credencialespr/'.$datos->id)}}</div>
        
       <!-- <div id="qrcode"></div>  <p id="qrcode"> <img src="../{{ $datos->failed_jobs['img_logo']}}" id="qrcodeimg" alt="Mi Foto"></p>-->


    </div>
    <p id="link" class="texto-minusculas" style=" color:#000000;">{{ $datos->failed_jobs['web_institution'] }}</p>
    
</div>
</div>
<br />

<!--  <input type="button" class="button-arounder" value="CAMBIAR" onclick="ElegirFaultadColor()" />  // flores creo este formato de imprewsion
-->
   <center>  
<div id="contenedorCanvas" > </div>
<div class="card__content">
<div class="card__date"> GENERADO </div>
<time datetime="2023-03-10" id="div-hora" class="card__date"></time>
<span class="card__title"> El Carnet listo para Imprimir!! </span>

    <br>
   





  <button class="btn btn-success" onclick="capturar()">Imprimir</button>


<!-- Script JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script>
    function capturar() {
      const divParaCapturar = document.getElementById('carnetid');

      const options = {
        width: 560, // 210mm (A4 width) converted to pixels at 96dpi
        height:710 // 297mm (A4 height) converted to pixels at 96dpi
      };

      html2canvas(divParaCapturar, options).then(canvas => {
        // Crea un elemento <a> para descargar la imagen
        const link = document.createElement('a');
        link.download = 'captura_div.png';
        link.href = canvas.toDataURL();
        link.click();

        // Crea un nuevo elemento de imagen para imprimir
        const imgParaImprimir = new Image();
        imgParaImprimir.src = canvas.toDataURL();

        // Abre una ventana emergente para imprimir la imagen
        const ventanaImpresion = window.open('', '_blank');
        ventanaImpresion.document.write('<img src="' + imgParaImprimir.src + '" style="width:100%;">');
        ventanaImpresion.document.close();

        // Imprimir automáticamente la imagen después de cargarla
        imgParaImprimir.onload = function() {
          ventanaImpresion.print();
          ventanaImpresion.close();
        };
      });
    }
  </script>
</center>
</div>

<?php }else{ ?>


  <div class="barralogo2" > <img src="../{{ $datos->failed_jobs['img_logo'] }}" loading="lazy" id="logout2"alt="Mi Foto"><br>{{ $datos->failed_jobs['nombre_institution'] }}  <br><h3 style="color:#00ff00; ">Perfil Verificado </h3></div>
  <div class="carnet" id="carnetid" >

    <div class="content" id="carnetfondo" style="background-image: url(../{{ $datos->failed_jobs['bgk_institution_m'] }});">
       
        
         <img src="../{{ $datos->imgprofile }}" id="perfilimg" alt="Mi Foto"> 
        <h1 class="textmayu">{{$datos->nombre_apellido}} </h1>
      
        <div class="datos" id="fondodata">
   
          <strong id="trabaj_id textmayu">{{$datos->typecrd}}</strong>
          @if(!empty($datos->department)) <p class="textmayu" ><strong > Área:</strong> {{$datos->department}}</p> @endif
          @if(!empty($datos->occupation)) <p class="textmayu" ><strong > Rol:</strong> {{$datos->occupation}}</p> @endif
          @if(!empty($datos->level)) <p  id="Facultades" nfacul="@ViewBag.types"><strong class="textmayu"> Curso:</strong> {{$datos->level}}</p>@endif
         @if(!empty($datos->course)) <p class="textmayu" ><strong > Paralelo:</strong> {{$datos->course}}</p> @endif
         @if(!empty($datos->genero)) <p class="textmayu"><strong > Genero:</strong> {{$datos->genero}}</p> @endif
         @if(!empty($datos->correo)) <p class="conatainer correo_cont texto-minusculas"><strong class="textmayu">Correo:</strong>  {{$datos->correo}}</p>@endif
          @if(!empty($datos->blotype))
          <h2 class="tiposangre textmayu"><strong> {{$datos->blotype}}</strong>@endif </h2>
        
          
         <!-- <div id="qrcode"></div>  <p id="qrcode"> <img src="../{{ $datos->failed_jobs['img_logo']}}" id="qrcodeimg" alt="Mi Foto"></p>-->
  
  
      </div>
      <p id="link" class="texto-minusculas" style=" color:#000000;">{{ $datos->failed_jobs['web_institution'] }}</p>
      
  </div>
      
        
    </div>
    </div>
    <br />


  <?php }  ?>

</div>

@endsection


