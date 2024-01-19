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
    

    <h2>ARCHIVOS QUE TE COMPARTIERON</h2>

 <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Nombre del Archiv</th>
                <th>Detalles sobre el Archivo</th>
                <th>Estado</th>
                <th>Fecha Creacion</th>
                <th>Fecha Ultima Edicion</th>
                <th>Ver</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($matriz['customer'] as $dato)
             
            <tr>
                
                <td>{{ $dato->files['id'] }}</td>
                 <td>{{ $dato->supplier['nombre_apellido'] }}</td>
                <td>{{ $dato->files['name_file'] }}</td>
                <td>{{ $dato->files['detalles'] }}</td>
                <td>{{ $dato->files['state']}}</td>
                <td>{{ $dato->files['created_at']}}</td>
                 <td>{{ $dato->files['updated_at']}}</td>
                 <td><a class="btn btn-primary" href="{{route('showfile',$dato->files['id'])}}"> <img class="icontpx" src="../../iconos/eye-outline.svg" alt="Image 2"></a></td>
               
                
               
            </tr>
        
            @endforeach
        </tbody>
    </table>
{{ $matriz['customer']->links() }}

   <h2>ARCHIVOS QUE  COMPARTISTE</h2>

 <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Nombre del Archiv</th>
                <th>Detalles sobre el Archivo</th>
                <th>Estado</th>
                <th>Fecha Creacion</th>
                <th>Fecha Ultima Edicion</th>
                <th>Ver</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($matriz['supplier'] as $dato)
           
            <tr>
                
                <td>{{ $dato->files['id'] }}</td>
                <td>{{ $dato->customer['nombre_apellido'] }}</td>
                <td>{{ $dato->files['name_file'] }}</td>
                <td>{{ $dato->files['detalles'] }}</td>
                <td>{{ $dato->files['state']}}</td>
                <td>{{ $dato->files['created_at']}}</td>
                 <td>{{ $dato->files['updated_at']}}</td>
                 <td><a class="btn btn-primary" href="{{route('showfile',$dato->files['id'])}}"> <img class="icontpx" src="../../iconos/eye-outline.svg" alt="Image 2"></a></td>
               
                <td>
                    <form class="deleteForm"id="deleteForm" action="{{route('destroyshare',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"onclick="confirmDelete(event)"><img class="icontpx" src="../../iconos/trash-sharp.svg" alt="Image 2"></button>
                    </form>
                 </td>
               
            </tr>
         
            @endforeach
        </tbody>
    </table>


</div>
<?php }?>

{{ $matriz['supplier']->links() }}
@endsection