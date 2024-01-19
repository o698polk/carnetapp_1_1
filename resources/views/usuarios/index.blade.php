

<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'USUARIOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1 class="WhiteCol">USUARIOS</h1>
<img class="logo_banner"src="../../img/LO6.png" alt="Image 2">
</center>
</div>
<form method="POST"  action="{{route('buscaruser')}}" >
  @csrf
  <div class="form-group">

      <input type="text" name="filtro_nombre" placeholder="Correo"class="form-control" >
  </div>

  <!-- Agrega más campos de filtro según tus necesidades -->
  <button type="submit" class="btn btn-info">Buscar</button>
</form>

<a href="{{route('usuarios.create')}} " class="btn btn-primary">Crear Usuario</a>
@if(session('user')->rol==2)
<div class="container scrollable-div">
<table class="table boder_bar btn_modulos">
  <thead>
    <tr>
      <th>Editar</th>
      <th>Eliminar</th>
      <th>Ver</th>
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Usuario</th>
      <th>Rol</th>
      <th>Estado</th>
      <th>Verificar</th>
      <th>Imagen</th>
      <th>Cedula</th>
      <th>Tipo de Sangre</th>
      <th>Curso</th>
      <th>Paralelo</th>
      <th>Institucion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
    <tr>
      <td><a  class="btn btn-primary" href="{{route('usuarios.edit',$dato['id'])}}">Editar</a></td>
      <td>
        <form id="deleteForm" class="deleteForm" action="{{route('usuarios.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"onclick="confirmDelete(event)">Eliminar</button>
        </form>
      </td>
       <td> <a  href="{{route('credencialespr',$dato['id'])}}" class="btn btn-primary">Ver</a></td>
      <td>{{ $dato['id'] }}</td>
      <td>{{ $dato['nombre_apellido'] }}</td>
      <td>{{ $dato['correo'] }}</td>
      <td>{{ $dato['usuario'] }}</td>
      <td>{{ $dato['rol'] }}
            @if($dato['rol']==2)
            Tecnico Administrativo
            @endif
            @if($dato['rol']==0)
            Usuario
            @endif
      </td>
      <td>{{ $dato['state'] }}  </td>
      <td>{{ $dato['st_verifi'] }}
        @if($dato['st_verifi']==2)
        SI
        @endif
        @if($dato['st_verifi']==0)
        NO
        @endif
  </td>
       <td> <img src="{{ $dato['imgprofile'] }}" style="width:60px;height: 60px; border-radius: 10px; "> </td>
       <td>{{ $dato['dni'] }}</td>
       <td>{{ $dato['blotype'] }}</td>
       <td>{{ $dato['level'] }}</td>
       <td>{{ $dato['course'] }}</td> 
       <td>{{ $dato['id_failed_jobs'] }}</td> 
    </tr>
    @endforeach
  </tbody>
</table>
{{ $datos->links() }}
</div>

@endif


@endsection
