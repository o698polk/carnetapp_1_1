<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'POLICIA NACIONAL')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h2>PANEL DE CONTROL</h2>
<img class="logo_banner"src="img/LO3.png" alt="Image 2">
</center>
<style>
.square-button {
  display: inline-block;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  color: #000000;
  background-color: white;
  border: 1px solid #000000;
  border-radius: 0;
  cursor: pointer;
}
.img-st-icon{
  width:60px;
  height:60px; 
}

</style>

<div class="container">
  <div class="row">

  <?php  $user = session('user') ?>
  <?php  if ($user->__get('rol') == 2)
  {?>
    <div class="col-sm square-button">
       
    <a href="{{route('usuarios.index')}}" class="btn_modulos"> <img src="img/user.png" class="img-st-icon">USUARIOS</a>
    </div>
    <div class="col-sm square-button">
      <div class="col-sm square-button">

    <a href="file" class="btn_modulos"><img src="img/file.png" class="img-st-icon">ARCHIVOS</a>
    </div>
      
  <?php }?>
  <?php  if ($user->__get('rol') == 0 || $user->__get('rol') == 1 )
  {?>
    <div class="col-sm square-button">
      <img src="img/file.png" class="img-st-icon">
    <a href="file" class="btn_modulos">ARCHIVOS</a>
    </div>
       <div class="col-sm square-button">
              <img src="img/imgfile.png" class="img-st-icon">
    <a href="multimedia" class="btn_modulos">MULTIMEDIA</a>
    </div>
    <?php }?>
   
  </div>
</div>
</div>
@endsection



