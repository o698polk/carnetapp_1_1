<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'REGISTER')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1 class="WhiteCol">REGISTER</h1>
        <img class="logo_banner" src="img/LO6.png" alt="Image 2">
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
                           @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                        <form method="POST" action="/registrar_usuario">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_apellido">Nombres y Apellidos</label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Nombre de Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="correo">Email</label>
                                <input type="email" id="correo" name="correo" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="clave">Password</label>
                                <input type="password" id="clave" name="clave" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="rol">Selecciona una opción:</label>
                                <select class="form-control" id="rol" name="rol">
                                    <option value="0">Usuario</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
