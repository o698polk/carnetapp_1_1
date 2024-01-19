<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR BLOQUE DE ARCHIVOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="container page_style">
    <center>
        <h1>ARCHIVOS</h1>
        <img class="logo_banner" src="../../img/LO1.png" alt="Image 2">
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

                        <form method="post" action="{{ route('file.update',$datos['id']) }}"enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="id" value="{{$datos['id']}}">

                            <div class="form-group">
                                <label for="name_file">Nombres Del Archivo</label>
                                <input type="text" name="name_file" id="name_file" class="form-control" value="{{$datos['name_file']}}" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="file_st">Archivo</label>
                                <input type="file" name="file_st[]" id="file_st" class="form-control" value="{{$datos['name_file']}}" placeholder="" multiple>
                            </div>

                            <div class="form-group">
                                <label for="detalles">Detalles</label>
                                <input type="text" id="detalles" name="detalles" class="form-control" value="{{$datos['detalles']}}" required >
                            </div>
                             <div class="form-group">
                                <label for="state">Estado</label>

                                <select class="form-control" id="state" name="state" required>
                                    <option value="{{$datos['state']}}">{{$datos['state']}}</option>
                                    <option value="PRIVATE">PRIVATE</option>
                                    <option value="PUBLIC">PUBLIC</option>
                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">
                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="{{$datos['id_usuario']}}" required style="display: none;" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
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
