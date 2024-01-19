


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ARCHIVOS ')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style ">
<center>
<h1>ARCHIVOS</h1>
<img class="logo_banner"src="../../img/file.png" alt="Image 2">
</center>
                      @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
</div>
<form method="POST"  action="{{route('buscarfilerute',$matriz['datos']->id) }}" >
    @csrf

    <input type="hidden" name="id" value="{{$matriz['datos']->id}}">
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Nombre del archivo"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
<?php  $user = session('user') ?>
@if ($user->rol == 0 || $user->rol == 1 || $user->rol == 2)
<div class="container scrollable-div">
    <h1 class="mt-4">Visor de Archivos</h1>
      @php
      $detalles= $matriz['datos']->detalles;
                    $nombreregsitro= $matriz['datos']->name_file;
                    $fechadecreacion= $matriz['datos']->created_at ;
                     $fechadeactualiza= $matriz['datos']->updated_at ;

      @endphp
       <h2>{{$nombreregsitro}}</h2>
                 <p><strong>Descripcion:</strong>{{$detalles}}</p>
         <p><strong>Fecha de actualizacion:</strong>{{ $fechadeactualiza}}</p>
                  <p><strong>Fecha de creacion:</strong>{{$fechadecreacion}}</p>

    <div class="row">
    @foreach ($matriz['archivos'] as $arch)
        @if (session('user')->id == $matriz['datos']->id_usuario)
            @php
                $ruta = $arch['rutas'];
                $rutadiv = explode('/', $ruta);
                $nombreArchivo = end($rutadiv);
                // Obtén el nombre del archivo desde la ruta
                $nombreoriginal1 = explode('_._', $nombreArchivo);
                $nombreoriginal2 = end($nombreoriginal1);
                $fechacreate = $arch['created_at'];
                // Obtén la extensión del archivo
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

                // Define un arreglo de correspondencias entre extensiones y nombres de iconos
                $iconos = [
                    'pdf' => 'pdf.png',
                    'jpg' => 'jpg.png',
                    'png' => 'png.png',
                    'docx' => 'doc.png',
                    'xlsx' => 'excel.png',
                    // Agrega más extensiones y nombres de iconos según tus necesidades
                ];

                // Verifica si la extensión tiene una correspondencia en el arreglo de iconos
                $icono = isset($iconos[$extension]) ? $iconos[$extension] : 'arc.png';
            @endphp

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="file-card">
                   

                 <form class="deleteForm"id="deleteForm" action="{{route('destroyfiledat',$arch['id'])}}" id_eliminar="{{$arch['id']}}"method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"onclick="confirmDelete(event)"><img src="{{ asset('img/borrar.png') }}" alt="Documento" width="20"></button>
                    </form>
                    <a class="btn btn-primary" href="{{route('editafile',$arch['id'])}}"><img src="{{ asset('img/editar.png') }}" alt="Documento" width="20"></a>
                    <a href="{{ $arch['rutas'] }}" target="_blank">
                        <img src="{{ asset('img/' . $icono) }}" alt="Documento" width="100">
                    </a>
                    <p>{{$nombreoriginal2}}/{{$fechacreate}}</p>
                </div>
            </div>
        @endif
    @endforeach
    <!-- Agregar más columnas según sea necesario -->
</div>

</div>
{{ $matriz['archivos']->links() }}
@endif




@endsection


