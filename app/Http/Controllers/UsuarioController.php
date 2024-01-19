<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HelpFuntionController;
use Illuminate\Support\Facades\File;
use App\Models\Ruta;
use App\Models\Filedata;
use  App\Mail\EnviarCorreo;
use App\Models\Failed_job;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{

    public function Index()
    {
        try {
            $this->sessionstar();
            $datos = Usuario::paginate(10);
            

            return view('usuarios.index', compact('datos'));
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
    public  function Sessionstar()
    {
        if (empty(session('user'))) {
            return redirect()->route('home');
        }
    }



    public function buscar(Request $request)
    {
        try{
    $query = Usuario::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('correo', 'like', "%$filtro_nombre%");
    }

  
    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('usuarios.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }
    // Esta funcion llama a la vista crear usuarios

    // esta funcion llama a la creacion de un registro nuevo desde la seccion de registrar usuarios
    public function Registrar_usuario(Request $request)
    {
        try {
        $userData = Usuario::where('correo', $request->input('correo'))->first();

        if ($userData !== null) {
            return redirect()->back()->with('error', 'Correo duplicado, ingrese otro correo');
        } else {
        $user = new Usuario();
        $user->nombre_apellido = $request->input('nombre_apellido');
        $user->correo = $request->input('correo');
        $user->usuario = $request->input('usuario');
        $user->rol = $request->input('rol');
        $user->state = "PRIVATE";
        $user->imgprofile = "";
        $user->clave = Hash::make($request->input('clave'));
        $user->code_verifi = rand(890393094093, 9037478294375);
        $user->st_verifi = 0;
        if ($user->save()) {
            UsuarioController::enviarcorreo($user->correo, $user->id);
            return redirect()->back()->with('success', 'Creado con éxito,Verifica tu cuenta, revisa tu correo electrincio');
        }
    }
        return   redirect()->back()->with('error', 'Error al Crear');
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
    }
    }
    public function Login(Request $request)
    {
        try {
            $correo = $request->input('correo');
            $clave = $request->input('clave');

            // Busca el usuario en la base de datos
            $user = Usuario::where('correo', $correo)->first();

            // Verifica si se encontró un usuario y si la contraseña es correcta
            if ($user->st_verifi >= 2) {


                if ($user && Hash::check($clave, $user->clave)) {
                    // Inicia la sesión para el usuario
                    session(['user' => $user]);

                    // Redirecciona a la página de inicio después del inicio de sesión exitoso
                    return redirect()->route('dashboard');
                }
            } else {
                UsuarioController::enviarcorreo($user->correo, $user->id);
                return   redirect()->back()->with('success', 'Verifica tu cuenta, revisa tu correo electrincio');
            }
            // Si las credenciales son inválidas, redirecciona de vuelta al formulario de inicio de sesión con un mensaje de error
            return redirect()->back()->with('error', 'Credenciales inválidas');
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

    public function enviarcorreodestino($id)
    {
        try {
            if (session()->has('user')) {

                $dato = Usuario::findOrFail($id);

                UsuarioController::enviarcorreo($dato->cliente->correo, $id);
                return   redirect()->back()->with('success', 'Enviado');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
    public function enviarcorreo($correo, $id)
    {
        Mail::to($correo)->send(new EnviarCorreo($id));
    }

    public function create()
    {
        try {
            $datos = Failed_job::all();

            return view('usuarios.create', compact('datos'));
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
    public function store(Request $request)
    {
        try {
            $userData = Usuario::where('correo', $request->input('correo'))->first();

if ($userData !== null) {
    return redirect()->back()->with('error', 'Correo duplicado, ingrese otro correo');
} else {

          
            $user = new Usuario();
            $user->nombre_apellido = $request->input('nombre_apellido');
            $user->correo = $request->input('correo');
            $user->usuario = $request->input('usuario');
            $user->rol = $request->input('rol');
            $user->clave = Hash::make($request->input('clave'));
            $user->state = $request->input('state');
            $user->code_verifi = rand(890393094093, 9037478294375);
            $user->dni = $request->input('dni');
            $user->st_verifi = $request->input('st_verifi');
            $user->blotype = $request->input('blotype');
            $user->level = $request->input('level');
            $user->course = $request->input('course');
            $user->genero = $request->input('genero');
            $user->typecrd = $request->input('typecrd');
            $user->occupation = $request->input('occupation');
            $user->department = $request->input('department');
            $user->id_failed_jobs = $request->input('id_failed_jobs');
            if ($request->hasFile('imgprofile') && $request->file('imgprofile')->isValid()) {

                $file = $request->file('imgprofile');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/' . $user->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
                $user->imgprofile = 'uploads/' . $user->correo . '/' . $fileName;
            }
            if ($user->save()) {
                UsuarioController::enviarcorreo($user->correo, $user->id);
                return redirect()->back()->with('success', 'Creado con éxito');
            }

        }
            return   redirect()->back()->with('error', 'Error al Crear');
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar'.$e);
        }
    }
    // esta funcion llama a la vista editar
    public function credencialespr($id)
    {
       
        try {
            $datos = Usuario::with('failed_jobs')->has('failed_jobs')->latest()->findOrFail($id);

            return view('usuarios.credencialespr', compact('datos'));
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

     // esta funcion llama a la vista editar
     public function credencialesprhorizontal($id)
     {
        
         try {
             $datos = Usuario::with('failed_jobs')->has('failed_jobs')->latest()->findOrFail($id);
 
             return view('usuarios.credencialesprhorizontal', compact('datos'));
         } catch (Exception $e) {
             return   redirect()->back()->with('error', 'Error al Cargar');
         }
     }
    public function edit($id)
    {
        try {

            $datos = Usuario::findOrFail($id);
            $intitu = Failed_job::all();
            $matriz=compact('datos','intitu');
            return view('usuarios.edit', compact('matriz'));
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

    // esta funcion actualiza los datos en la base d
    public function update(Request $request, $id)
    {
        try {
            $userdata = session('user');
            $user = Usuario::findOrFail($id);
            $user->nombre_apellido = $request->input('nombre_apellido');

            if (!empty($request->input('rol')) || $request->input('rol') == 0 && !empty($request->input('correo'))) {
                $user->rol = $request->input('rol');
                $user->correo = $request->input('correo');
            }
            $user->usuario = $request->input('usuario');
            $clave = $request->input('clave');
            $user->state = $request->input('state');
            if($user->st_verifi==0){
                $user->st_verifi = $request->input('st_verifi');
            }
          
            $user->dni = $request->input('dni');
            $user->genero = $request->input('genero');
            $user->typecrd = $request->input('typecrd');
            $user->occupation = $request->input('occupation');
            $user->department = $request->input('department');
            $user->blotype = $request->input('blotype');
            $user->level = $request->input('level');
            $user->course = $request->input('course');
           
            $user->id_failed_jobs = $request->input('id_failed_jobs');

            if ($request->hasFile('imgprofile') && $request->file('imgprofile')->isValid()) {
                if (!empty($user->imgprofile)) {
                    $rutaImagen = public_path($user->imgprofile);
                    if (File::exists($rutaImagen)) {
                        File::delete($rutaImagen); // Elimina la imagen

                    }
                }
                $file = $request->file('imgprofile');
                $fileName = time() . '_' . $file->getClientOriginalName();
                if ($userdata->rol == '2') {
                    $file->move(public_path('uploads/' . $user->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
                    $user->imgprofile = 'uploads/' . $user->correo . '/' . $fileName;
                } else {
                    $file->move(public_path('uploads/' . $userdata->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
                    $user->imgprofile = 'uploads/' . $userdata->correo . '/' . $fileName;
                }
            }

            if ($clave == $user->clave) {
                $user->clave = $request->input('clave');
                if ($user->save()) {
                    if (session('user')->rol != 2) {
                        $user = Usuario::findOrFail($id);
                        session(['user' => $user]);
                        return   redirect()->back()->with('success', 'Actualizado con exito, Clave no editada');
                    } else {
                        if (session('user')->rol == 2 && session('user')->id == $user->id) {
                            $user = Usuario::findOrFail($id);
                            session(['user' => $user]);
                            return   redirect()->back()->with('successr', 'Actualizado con exito, Clave  no editada');
                        } else {
                            return   redirect()->back()->with('success', 'Actualizado con exito, Clave no editada');
                        }
                    }
                }
            } else {
                $user->clave = Hash::make($request->input('clave'));
                if ($user->save()) {
                    if (session('user')->rol != 2) {
                        $user = Usuario::findOrFail($id);
                        session(['user' => $user]);
                        return   redirect()->back()->with('success', 'Actualizado con exito, Clave editada');
                    } else {
                        if (session('user')->rol == 2 && session('user')->id == $user->id) {
                            $user = Usuario::findOrFail($id);
                            session(['user' => $user]);
                            return   redirect()->back()->with('success', 'Actualizado con exito, Clave no editada');
                        } else {
                            return   redirect()->back()->with('success', 'Actualizado con exito, Clave  editada');
                        }
                    }
                }
            }

            return   redirect()->back()->with('error', 'Error al Actualizar');
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

    // esta funcion elimina datos de la tabla
    public function destroy($id)
    {



        $rutas = Ruta::where('id_usuario', $id)->get();
        foreach ($rutas as $key => $value) {
            $frutas = explode("/", $value['rutas']);

            $rutafile =   $frutas[1] . '/' . $frutas[2] . '/' . $frutas[3] . '/' . $frutas[4] . '/' . $frutas[5];
            //return   $rutafile;


            $rutafile2 = public_path($rutafile); // Ruta completa al archivo en la carpeta 'public'

            if (File::exists($rutafile2)) {
                File::delete($rutafile2); // Elimina el archivo
            }

            Ruta::where('id_usuario', $id)->delete();
        }
        // Buscar y eliminar el registro en la tabla File
        Filedata::where('id_usuario', $id)->delete();



        $user = Usuario::findOrFail($id);
        $rutaImagen = public_path($user->imgprofile);
        if (File::exists($rutaImagen)) {
            File::delete($rutaImagen); // Elimina la imagen

        }
        if (!empty($user->id)) {
            $user->delete();
        }

        return redirect()->route('usuarios.index');
    }

    // login
    // esta funcion realiza una verificacion y un login





}
