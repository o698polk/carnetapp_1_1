

<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'INSTITUCIONES')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1 class="WhiteCol">INSTITUCIONES</h1>
<img class="logo_banner"src="../../img/LO6.png" alt="Image 2">
</center>
</div>
<form method="POST"  action="{{route('buscarinstitution')}}" >
  @csrf
  <div class="form-group">

      <input type="text" name="filtro_nombre" placeholder="Correo"class="form-control" >
  </div>

  <!-- Agrega más campos de filtro según tus necesidades -->
  <button type="submit" class="btn btn-info">Buscar</button>
</form>
<a href="{{route('failed_job.create')}} " class="btn btn-primary">Crear Instituciòn</a>
@if(session('user')->rol==2)
<div class="container scrollable-div ">
<table class="table boder_bar btn_modulos">
  <thead>
    <tr>
      <th>Editar</th>
      <th>Eliminar</th>
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>DNI</th>
      <th>Web</th>
      <th>Estado</th>
      <th>Representante </th>
      <th>Imagen Logo</th>
      <th>Imagen BkM</th>
      <th>Imagen BkF</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
    <tr>
      
      <td><a  class="btn btn-primary" href="{{route('failed_job.edit',$dato['id'])}}">Editar</a></td>
      <td>
        <form class="deleteForm" id="deleteForm" action="{{route('failed_job.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"onclick="confirmDelete(event)">Eliminar</button>
        </form>
      </td>
      <td>{{ $dato['id'] }}</td>
      <td>{{ $dato['nombre_institution'] }}</td>
      <td>{{ $dato['correo_institution'] }}</td>
      <td>{{ $dato['dni_institution'] }}</td>
      <td>{{ $dato['web_institution'] }} </td>
      <td>{{ $dato['state_institution'] }}  </td>
      <td>{{ $dato['representative_inst'] }} </td>
      <td> <img src="{{ $dato['img_logo'] }}" style="width:60px;height: 60px; border-radius: 10px; "> </td>
      <td> <img src="{{ $dato['bgk_institution_m'] }}" style="width:60px;height: 60px; border-radius: 10px; "> </td>
      <td> <img src="{{ $dato['bgk_institution_f'] }}" style="width:60px;height: 60px; border-radius: 10px; "> </td>
    
    </tr>
    @endforeach
  </tbody>
</table>
{{ $datos->links() }}
</div>

@endif


@endsection
