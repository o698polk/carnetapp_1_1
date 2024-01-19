<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'LOGIN')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1 class="WhiteCol">LOGIN</h1>
<img class="logo_banner"src="img/LO6.png" alt="Image 2">
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
                        <form method="POST" action="/login">
                            @csrf

                            <div class="form-group">
                                <label for="correo">Email</label>
                                <input type="email" id="correo" name="correo" class="form-control" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="clave">Password</label>
                                <input type="password" id="clave" name="clave" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
