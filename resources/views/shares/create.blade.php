<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR CIRCUITO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>GUARDAR ARCHIVOS</h1>
        <img class="logo_banner" src="../img/LO3.png" alt="Image 2">
    </center>


<div class="container">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form method="POST" action="{{route('file.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name_file">Nombres Del Archivo</label>
                                <input type="text" name="name_file" id="name_file" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="file_st">Archivo</label>
                                <input type="file" name="file_st[]" id="file_st" class="form-control" placeholder="" multiple>
                            </div>
                            <div class="form-group">
                                <label for="detalles">Detalles</label>
                                <input type="text" id="detalles" name="detalles" class="form-control"  required >
                            </div>
                             <div class="form-group">
                                <label for="state">Estado</label>
                                
                                <select class="form-control" id="state" name="state" required>
                                    <option value=""></option>
                                    <option value="PRIVATE">PRIVATE</option>
                                    <option value="PUBLIC">PUBLIC</option>

                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('file.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
