<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CARNETAPP')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">


<center>


<div class="fondos-sing">
   
 <style>
  .carnetapp-container {
    background-color: rgba(255, 255, 255, 0.95);
    text-align: justify;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    font-family: 'Roboto', sans-serif;
    color: #333;
  }

  .carnetapp-title {
    font-size: 44px;
    font-weight: bold;
    color: #1a73e8;
    text-align: center;
    margin-bottom: 20px;
    transition: transform 0.3s ease-in-out;
  }

  .carnetapp-title:hover {
    transform: scale(1.1);
  }

  .carnetapp-text {
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 15px;
  }

  .carnetapp-motivation {
    font-size: 20px;
    font-style: italic;
    text-align: center;
    margin-bottom: 20px;
    color: #4CAF50;
  }

  .carnetapp-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #1a73e8;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    margin-bottom: 20px;
  }

  .carnetapp-button:hover {
    background-color: #155698;
  }

  .contact-section {
    margin-top: 30px;
    text-align: center;
  }

  .contact-title {
    font-size: 22px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
  }

  .contact-email {
    font-size: 18px;
    color: #1a73e8;
    margin-bottom: 20px;
  }

  .email-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
  }

  .email-button:hover {
    background-color: #45a049;
  }
  
  h1 .typed-words {
    position: relative;
}
h1 .typed-words:before {
        position: absolute;
        height: 7px;
        background-color: #B1D0E0;
        bottom: 0;
        left: 0;
        right: 0;
        content: "";
    }
  .intro-wrap {
    position: relative;
    z-index: 1;
}
  .slides {
 
    max-width: 800px;
    left: -100px;
    z-index: 0;
    position: relative;
    border-radius: 200px;
    -webkit-box-shadow: 0 25px 50px -10px rgba(26, 55, 77, 0.4);
    box-shadow: 0 25px 50px -10px rgba(26, 55, 77, 0.4);
    height: 608px;
    margin-bottom: -200px;
}
.slides img {
 
    border-radius: 40px;
    opacity: 0;
    -webkit-transition: 4s opacity ease;
    -o-transition: 4s opacity ease;
    transition: 4s opacity ease;
    width: 80%;

}
.slides img.active {
        opacity: 1;
        z-index: 1;
    }

    @media (max-width: 991.98px) {
     .slides {
        left: 0;
    }
}
.d-block{
  color: white;
}
</style>
<div class="container">
	<div class="row align-items-center">
		<div class="col-lg-7">
			<div class="intro-wrap">
		<center>	<h1 class="mb-5"><span class="d-block">Imprime tu Carnet Institucional.</span> <span class="typed-words"></span></h1>
				</center>

			</div>
		</div>
		<div class="col-lg-5">
			<div class="slides"> 
				<img src="../images/examp2.PNG" alt="Image" class="img-fluid active">
			</div>
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br>
<div class="carnetapp-container">
  <h1 class="carnetapp-title" style="text-align:center;">Bienvenido a Carnetapp</h1>

  <p class="carnetapp-text">Bienvenido a la revolución en la gestión de credenciales institucionales. Con Carnetapp, la generación de identificaciones para empleados y estudiantes es tan fácil como un clic. Automatizamos este proceso, permitiendo a empresas y unidades educativas identificar a su personal o estudiantes de manera eficiente mediante códigos QR personalizados.</p>

  <p class="carnetapp-text">Pero eso no es todo. Carnetapp va más allá al proporcionar un espacio de almacenamiento seguro y conveniente para todos tus archivos. Nuestro exclusivo apartado de archivos, vinculado a cada usuario, facilita el acceso y la gestión de documentos de todo tipo. Desde informes importantes hasta archivos multimedia, Carnetapp se convierte en tu aliado confiable para el almacenamiento y la organización eficiente de información.</p>

  <p class="carnetapp-motivation">"¡Simplifica tu vida institucional! Inicia sesión ahora y descubre el poder de Carnetapp."</p>

  <a href="https://rpgad.elpeloteotv.com/login" class="carnetapp-button">Iniciar Sesión</a>

  <div class="contact-section">
    <p class="contact-title">¿Tienes preguntas o necesitas más información?</p>
    <p class="contact-email">Contáctanos enviándonos un correo a: <a href="mailto:orsicen@gmail.com" class="email-button">Enviar Correo</a></p>
  </div>
</div>



<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><b
</div>
</center>
</div>
@endsection
