


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR USUARIO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1 class="WhiteCol">USUARIOS</h1>
<img class="logo_banner"src="../../img/LO6.png" alt="Image 2">
</center>


@if(session('user')->rol==2)
<div class="container ">
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
                        <form method="post" action="{{ route('usuarios.update',$matriz['datos']->id) }}"enctype="multipart/form-data">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['datos']->id}}">
                            <div class="form-group">
                                <label for="nombre_apellido">Nombres y Apellidos</label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" value="{{$matriz['datos']->nombre_apellido }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Nombre de Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control" value="{{$matriz['datos']->usuario }}">
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control" value="{{$matriz['datos']->dni }}">
                            </div>
                            <div class="form-group">
                                <label for="correo">Email</label>
                                <input type="email" id="correo" name="correo" class="form-control" value="{{$matriz['datos']->correo }}" required>
                            </div>

                            <div class="form-group">
                                <label for="clave">Password</label>
                                <input type="password" id="clave" name="clave" class="form-control" value="{{$matriz['datos']->clave }}" required>
                            </div>

                            <div class="form-group">
                                <label for="department">Área de trabajo </label>
                                <input type="text" name="department" id="department" class="form-control" value="{{$matriz['datos']->department }}" >
                            </div>
                            <div class="form-group">
                                <label for="occupation">Cargo designado</label>
                                <input type="text" name="occupation" id="occupation" class="form-control" value="{{$matriz['datos']->occupation }}" >
                            </div>

                            <div class="form-group">
                                <label for="state">Selecciona una opción estado:</label>
                                <select class="form-control" id="state" name="state">
                                  
                                        <option value="{{$matriz['datos']->state}}">{{$matriz['datos']->state}}</option>
                                      
                                     

                                    <option value="PRIVATE">PRIVATE</option>
                                    <option value="PUBLIC">PUBLIC</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="st_verifi">Selecciona una opción verificar:</label>
                                <select class="form-control" id="st_verifi" name="st_verifi">
                                    @if($matriz['datos']->st_verifi==0)
                                        <option value="0">NO</option>
                                        @endif
                                     @if($matriz['datos']->st_verifi==2)
                                        <option value="2">SI</option>
                                     @endif

                                    <option value="0">NO</option>
                                    <option value="2">SI</option>
                                  
                                </select>
                            </div>
                          <div class="form-group">
                                <label for="rol">Selecciona una opción rol:</label>
                                <select class="form-control" id="rol" name="rol">
                                    @if($matriz['datos']->rol=='2')
                                        <option value="2">Tecnico Administrativo</option>
                                        @endif
                                     @if($matriz['datos']->rol=='0')
                                        <option value="0">Usuario</option>
                                     @endif

                                    <option value="0">Usuario</option>
                                    <option value="2">Tecnico Administrativo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="blotype">Selecciona una opción,Tipo de Sangre:</label>
                                <select class="form-control" id="blotype" name="blotype">
                                   
                                    <option value="{{$matriz['datos']->blotype}}">{{$matriz['datos']->blotype}}</option>
                                    <option value=""></option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>

                                </select>
                            </div>
                            <div class="form-group">
                              <label for="genero">Selecciona una opción,Genero:</label>
                              <select class="form-control" id="genero" name="genero">
                                 
                                  <option value="{{$matriz['datos']->genero}}">{{$matriz['datos']->genero}}</option>
                                  <option value=""></option>
                                  <option value="MASCULINO">MASCULINO</option>
                                  <option value="FEMENINO">FEMENINO</option>
                                  <option value="LGTBIQ+">LGTBIQ+</option>
                                 

                              </select>
                          </div>
                          <div class="form-group">
                              <label for="typecrd">Selecciona una opción,Tipo de Credencial:</label>
                              <select class="form-control" id="typecrd" name="typecrd">
                                 
                                  <option value="{{$matriz['datos']->typecrd}}">{{$matriz['datos']->typecrd}}</option>
                                  <option value=""></option>
                                  <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                  <option value="DOCENTE">DOCENTE</option>
                                  <option value="ESTUDIANTE">ESTUDIANTE</option>
                                  <option value="EMPLEADO">EMPLEADO</option>

                              </select>
                          </div>
                            <div class="form-group">
                                <label for="level">Selecciona una opción,Nivel:</label>
                                <select class="form-control" id="level" name="level">
                                   
                                    <option value="{{$matriz['datos']->level}}">{{$matriz['datos']->level}}</option>
                                    <option value=""></option>
                                    <option value="1ro">1ro</option>
                                    <option value="2do">2do</option>
                                    <option value="3ro">3ro</option>
                                    <option value="4to">4to</option>
                                    <option value="5to">5to</option>
                                    <option value="6to">6to</option>
                                    <option value="7mo">7mo</option>
                                    <option value="8vo">8vo</option>
                                    <option value="9no">9no</option>
                                    <option value="10mo">10mo</option>
                                    <option value="1roB">1roB</option>
                                    <option value="2doB">2doB</option>
                                    <option value="3roB">3roB</option>
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="course">Selecciona una opción,Paralelo:</label>
                                <select class="form-control" id="course" name="course">
                                    <option value="{{$matriz['datos']->course}}">{{$matriz['datos']->course}}</option>
                                    <option value=""></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_customer">Selecciona una opción,Institución:</label>
                                   <input  class="form-control" type="text" id="busquedacliente" placeholder="Buscar...">
                                   <select class="form-control" id="id_customer" name="id_failed_jobs" >
                                    <option  required></option>
                                    @foreach ( $matriz['intitu'] as $dato)
                               
                                        @if($dato->id==$matriz['datos']->id_failed_jobs)
                                        
                                            <option value="{{ $dato->id }}" selected>
                                                {{ $dato->nombre_institution }}
                                                </option>
                                            @endif
                                        <option value="{{ $dato->id }}">
                                        {{ $dato->nombre_institution }}
                                        </option>
                                       
                                        @endforeach 
                                </select>
                            </div>


                             <div class="form-group">
            <label for="imgprofile">Imgprofile</label>
            <input type="file" name="imgprofile" id="imgprofile" class="form-control" >
        </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('usuarios.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




  </tbody>
</table>
</div>
</div>
@endif


@endsection
