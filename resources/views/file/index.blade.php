<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ARCHIVOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1 class="WhiteCol">ARCHIVOS</h1>
        <img class="logo_banner" src="../../img/LO6.png" alt="Image 2">
    </center>
</div>
<br>
<form method="POST"  action="{{route('buscarfile')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Nombre del archivo"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
<a href="{{route('file.create')}} " class="btn btn-primary"><img class="icontpx" src="../../iconos/cloud-upload-sharp.svg" alt="Image 2"></a>
<a href="{{route('shareindex')}} " class="btn btn-primary"><img class="icontpx" src="../../iconos/infinite-sharp.svg" alt="Image 2"></a>

<!--<button onclick="imprimirPagina()"  class="btn btn-success">Imprimir</button>

<script>
    function imprimirPagina() {
        window.print();
    }
</script>-->
<?php  $user = session('user') ?>
  <?php  if ($user->__get('rol') == 0 || $user->__get('rol') == 1 || $user->__get('rol') == 2)
  {?>
<div class="container scrollable-div" id="reportid">
    
 <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Archiv</th>
                <th>Detalles sobre el Archivo</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Fecha Creacion</th>
                <th>Fecha Ultima Edicion</th>
                <th>Ver</th>
                <th>Compartir</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            @if(session('user')->id==$dato->Usuario['id'])
            <tr>
                
                <td>{{ $dato['id'] }}</td>
                <td>{{ $dato['name_file'] }}</td>
                <td>{{ $dato['detalles'] }}</td>
                <td>{{ $dato['state']}}</td>
                <td>{{ $dato->Usuario['nombre_apellido']  }}</td>
                <td>{{ $dato['created_at']}}</td>
                 <td>{{ $dato['updated_at']}}</td>
                 <td><a class="btn btn-primary" href="{{route('showfile',$dato['id'])}}"> <img class="icontpx" src="../../iconos/eye-outline.svg" alt="Image 2"></a></td>
                
                <td>@if($dato['state']=='PUBLIC')<a class="btn btn-primary" href="{{route('sharefile',$dato['id'])}}"><img class="icontpx" src="../../iconos/arrow-redo-circle.svg" alt="Image 2"></a> @endif</td>
 
                 <td><a class="btn btn-primary" href="{{route('file.edit',$dato['id'])}}"><img class="icontpx" src="../../iconos/create-sharp.svg" alt="Image 2"></a></td>
                <td>
                    <form class="deleteForm" id="deleteForm" action="{{route('file.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"onclick="confirmDelete(event)"><img class="icontpx" src="../../iconos/trash-sharp.svg" alt="Image 2"></button>
                    </form>
                 </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>



    {{ $datos->links() }}
</div>
<?php }?>


@endsection