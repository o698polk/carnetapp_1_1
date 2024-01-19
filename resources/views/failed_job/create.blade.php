<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR USUARIOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1 class="WhiteCol" >CREAR USUARIOS</h1>
        <img class="logo_banner" src="../img/LO6.png" alt="Image 2">

    </center>
@if(session('user')->rol==2)

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

                        <form method="POST" action="{{route('failed_job.store')}}" enctype="multipart/form-data">
                            @csrf
                              @method('POST')
                            <div class="form-group">
                                <label for="nombre_institution">Nombre de la instituciòn </label>
                                <input type="text" name="nombre_institution" id="nombre_institution" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="dni_institution">DNI de la instituciòn  </label>
                                <input type="text" name="dni_institution" id="dni_institution" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="correo_institution">Email de la instituciòn </label>
                                <input type="email" id="correo_institution" name="correo_institution" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="representative_inst">Representante de la instituciòn  </label>
                                <input type="text" name="representative_inst" id="representative_inst" class="form-control" placeholder="" required> 
                            </div>
                            <div class="form-group">
                                <label for="web_institution">Web de la instituciòn  </label>
                                <input type="text" name="web_institution" id="web_institution" class="form-control" placeholder="" required> 
                            </div>
                           
                     <div class="form-group">
                        
                                <label for="state_institution">Selecciona una opción(Tipo de instituciòn):</label>
                                <select class="form-control" id="state_institution" name="state_institution" required>
                                    <option value=""> </option>
                                    <option value="Fiscales"> Fiscales</option>
                                    <option value="Fiscomisionales">Fiscomisionales</option>
                                    <option value="municipales">Municipales</option>
                                    <option value="particulares">Particulares</option>

                                </select>
                            </div>
                                <div class="form-group">
                                <label for="img_logo">Logo de la instituciòn</label>
                                <input type="file" name="img_logo" id="img_logo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <a href="https://www.canva.com/design/DAF239d-dA8/Di4yNYVqexjUaHRl3K-Aog/edit">GENERAR DISEÑO DE FONDOS</a><BR>
                                    <label for="bgk_institution_m">Fondo Masculino de la instituciòn</label>
                                    <input type="file" name="bgk_institution_m" id="bgk_institution_m" class="form-control"required >
                                 </div>
                                 <div class="form-group">
                                        <label for="bgk_institution_f">Fondo Femenino de la instituciòn</label>
                                        <input type="file" name="bgk_institution_f" id="bgk_institution_f" class="form-control"required >
                                </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('failed_job.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif
</div>
@endsection
