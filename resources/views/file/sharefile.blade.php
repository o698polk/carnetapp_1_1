<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR BLOQUE DE ARCHIVOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="container page_style">
    <center>
        <h1 class="WhiteCol">ARCHIVOS</h1>
        <img class="logo_banner" src="../../img/LO6.png" alt="Image 2">
    </center>
</div>
<br><br>
<?php  $user = session('user') ?>
  <?php  if ($user->__get('rol') == 0 || $user->__get('rol') == 1 || $user->__get('rol') == 2)
  {?>
<div class="container">
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                           @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
               <?php  $user = session('user') ?>
                        <form method="post" action="{{ route('storeshare') }}"enctype="multipart/form-data">
                            @method('POST')
                            @csrf

                            <div class="form-group">
                                <label for="id_filedata">Archivo</label>

                                <select class="form-control" id="id_filedata" name="id_filedata" required>
                                    <option value="{{$matriz['datos']->id}}">{{$matriz['datos']->name_file}}</option>
                                    
                                </select>
                            </div>
         
                
                                             <div class="form-group">
                                <label for="id_customer">Usuario</label>
                                   <input  class="form-control" type="text" id="busquedacliente" placeholder="Buscar...">
                                <select class="form-control" id="id_customer" name="id_customer" required>
                                    

                                   
                                    @foreach ($matriz['usuarios'] as $dato)
                                   
                               <?php  if( $dato->id != $user->id ){ ?>
                                <option  required></option>
                                        <option value="{{ $dato->id }}">
                                     
                                            {{ $dato->nombre_apellido }}
                                       
                                        </option>
                                        <?php }?>  
                                    @endforeach
                                      
                               
                                </select>

                            </div>
                           
                           
                            <div class="form-group">
                                <input type="hidden" id="id_supplier" name="id_supplier" class="form-control" value="<?php  
                                echo $user->id;  ?>" required style="display: none;" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary"><img class="icontpx" src="../../iconos/arrow-redo-circle.svg" alt="Image 2"></button>
                        </form>
                        <a href="{{route('file.index')}}" class="btn btn-default">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php }?>
@endsection
