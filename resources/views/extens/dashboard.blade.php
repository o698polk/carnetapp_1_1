<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'PERFIL')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<br> <br><br> <br>

<img class="logo_banner"src="img/LO6.png" alt="Image 2">
</center>
<style>
.square-button {
  display: inline-block;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  color: #000000;
  background-color: white;
  border: 1px solid #000000;
  border-radius: 0;
  cursor: pointer;
}
</style>

<div class="container">
  <div class="row">

  <?php  $user = session('user');
         $personal = session('personal');

  ?>
  
  


  <?php  if ($user->__get('rol') >= 0){?>

    <section style="background-color: blue; border-radius:16px;" class="colorfondo">
  <div class="container py-5" >
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <style>
        .perfil {
            width: 100px; /* Ancho de la imagen */
            height: 100px; /* Altura de la imagen */
            border-radius: 50%; /* Hace que el borde sea circular */
            overflow: hidden; /* Oculta cualquier parte de la imagen que se salga del círculo */
        }
    </style>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{$user->imgprofile}}" alt="avatar"
              class="rounded-circle img-fluid  perfil" >
            <h5 class="my-3">{{$user->usuario}}</h5>
            <p class="text-muted mb-1">{{$user->nombre_apellido}}</p>
            <p class="text-muted mb-4">{{$user->correo}}</p>
            <div class="d-flex justify-content-center mb-2">
              <a  href="{{route('credencialespr',$user->id)}}" class="btn btn-primary">Ver Credencial</a>
              <a  href="{{route('credencialesprhorizontal',$user->id)}}" class="btn btn-primary">Ver Credencial</a>
            </div>
          </div>
        </div>
      
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            
                      <div class="row">
                     

                      <div class="col-sm square-button">

                      <a href="file" class="btn_modulos"><img src="img/file.png" class="img-st-icon"></a>
                      </div>
             <?php  if ($user->__get('rol') ==2){?>
                
                <div class="col-sm square-button">

                <a href="{{route('usuarios.index')}}" class="btn_modulos"> <img src="img/user.png" class="img-st-icon"></a>
                </div>
                <div class="col-sm square-button">

                  <a href="{{route('failed_job.index')}}" class="btn_modulos"> <img src="img/institu.png" class="img-st-icon"></a>
                  </div>
    <?php }?>
        
            </div>
           
          </div>
        </div>
        <div class="row">
      
          <div class="col-md-6">
          <div class="card">

<div class="card-body">
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
       @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
    <h2>EDITAR</h2>
    <form method="POST" action="{{ route('editar_usuario',$user->id) }}" enctype="multipart/form-data">
    @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="hidden" name="id_failed_jobs" value="{{$user->id_failed_jobs}}">
        <input type="hidden" name="typecrd" value="{{$user->typecrd}}">
        <input type="hidden" name="dni" id="dni"  value="{{$user['dni'] }}">
        <div class="form-group">
            <label for="nombre_apellido">Nombres y Apellidos</label>
            <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control"  value="{{$user->nombre_apellido}}">
        </div>
       
        <div class="form-group">
            <label for="usuario">Nombre de Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" value="{{$user->usuario}}">
        </div>
        @if( $user->typecrd=='EMPLEADO' || $user->typecrd=='ADMINISTRATIVO') 
        <div class="form-group">
        <label for="department">Área de trabajo </label>
        <input type="text" name="department" id="department" class="form-control" value="{{$user->department }}" required>
        </div>
        <div class="form-group">
        <label for="occupation">Cargo designado</label>
        <input type="text" name="occupation" id="occupation" class="form-control" value="{{$user->occupation }}" required>
        </div>
        @endif
      <!--   <div class="form-group">
          <label for="dni">DNI</label>
          <input type="text" name="dni" id="dni" class="form-control" value="{{$user['dni'] }}">
      </div>
       <div class="form-group">
            <label for="correo">Email</label>
            <input type="email" id="correo" name="correo" class="form-control" value="{{$user->correo}}">
        </div>-->

        <div class="form-group">
            <label for="clave">Password</label>
            <input type="password" id="clave" name="clave" class="form-control" value="{{$user->clave}}">
        </div>
               <div class="form-group">
                                <label for="state">Selecciona una opción:</label>
                                <select class="form-control" id="state" name="state">
                                    @if($user->state=='PRIVATE')
                                        <option value="PRIVATE">PRIVATE</option>
                                        @endif
                                     @if($user->state=='PUBLIC')
                                        <option value="PUBLIC">PUBLIC</option>
                                     @endif

                                    <option value="PRIVATE">PRIVATE</option>
                                    <option value="PUBLIC">PUBLIC</option>
                                </select>
                            </div>
                           
                            <div class="form-group">
                              <label for="blotype">Selecciona una opción,Tipo de Sangre:</label>
                              <select class="form-control" id="blotype" name="blotype">
                                 
                                  <option value="{{$user['blotype']}}">{{$user['blotype']}}</option>
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
                                 
                                  <option value="{{$user['genero']}}">{{$user['genero']}}</option>
                                  <option value="MASCULINO">MASCULINO</option>
                                  <option value="FEMENINO">FEMENINO</option>
                                  <option value="LGTBIQ+">LGTBIQ+</option>
                                 

                              </select>
                          </div>
                          @if(!empty($user->typecrd) && $user->typecrd=='ESTUDIANTE' ) 
                          <div class="form-group">
                              <label for="level">Selecciona una opción,Nivel:</label>
                              <select class="form-control" id="level" name="level">
                                 
                                  <option value="{{$user['level']}}">{{$user['level']}}</option>
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
                                  <option value="{{$user['course']}}">{{$user['course']}}</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                              </select>
                          </div>
                          @endif
                        <!--  <div class="form-group">
                            <label for="id_customer">Selecciona una opción,Institución:</label>
                               <input  class="form-control" type="text" id="busquedacliente" placeholder="Buscar...">
                               <select class="form-control" id="id_customer" name="id_failed_jobs" >
                                    @foreach ($institu as $dato)
                           
                                    @if($dato->id==$user->id)
                                    {
                                        <option value="{{ $dato->id }}" selected>
                                            {{ $dato->nombre_institution }}
                                            </option>
                                    }
                                    <option value="{{ $dato->id }}">
                                    {{ $dato->nombre_institution }}
                                    </option>
                                    @endif
                                    @endforeach 
                            </select>
                        </div>-->

        <div class="form-group">
            <label for="imgprofile">Imgprofile</label>
            <input type="file" name="imgprofile" id="imgprofile" class="form-control" value="{{$user->imgprofile}}">
        </div>
    
      
        <div class="form-group">
        <button type="submit" class="btn btn-primary">EDITAR</button>
        </div>
    </form>
</div>
</div>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  
    <?php }?>
  </div>
</div>
</div>
@endsection



