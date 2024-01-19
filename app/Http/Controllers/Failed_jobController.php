<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Failed_job;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HelpFuntionController;
use Illuminate\Support\Facades\File;
use App\Models\Ruta;
use App\Models\Filedata;
use  App\Mail\EnviarCorreo;
use Illuminate\Support\Facades\Mail;
class Failed_jobController extends Controller
{
    public function Index()
    {
         try {
            $this->sessionstar();
            
                $datos = Failed_job::paginate(10);
                return view('failed_job.index', compact('datos'));


          } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
         }
    }
    public  function Sessionstar(){
        if (empty(session('user'))) {
            return redirect()->route('home');
        }
    }
 

    public function buscar(Request $request)
    {
        try{
    $query = Failed_job::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('correo_institution', 'like', "%$filtro_nombre%");
    }

  
    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('failed_job.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }

public function enviarcorreodestino($id)
    {
        try {
            if (session()->has('user')) {
  
                $dato = Usuario::findOrFail($id);
                
                
                return   redirect()->back()->with('success', 'Enviado');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
      public function enviarcorreo($correo,$id){
        Mail::to($correo)->send(new EnviarCorreo($id) );

    }

    public function create()
    {
        try {

        return view('failed_job.create');
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }


    }
    public function store(Request $request){
       try {
            $user= session('user');
            $Failed_job = new Failed_job();
            $Failed_job->nombre_institution =$request->input('nombre_institution');
            $Failed_job->correo_institution =$request->input('correo_institution');
            $Failed_job->dni_institution =$request->input('dni_institution');
            $Failed_job->representative_inst =$request->input('representative_inst');
            $Failed_job->web_institution = $request->input('web_institution');
            $Failed_job->state_institution=$request->input('state_institution');
            $Failed_job->representative_inst=$request->input('representative_inst');

           
           
   
        if ($request->hasFile('img_logo') && $request->file('img_logo')->isValid()) {

    
        $file = $request->file('img_logo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('institute/'.$user->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
        $Failed_job->img_logo='institute/'.$user->correo.'/'.$fileName;
      
       }
       if ($request->hasFile('bgk_institution_m') && $request->file('bgk_institution_m')->isValid()) {

    
        $file = $request->file('bgk_institution_m');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('institute/'.$user->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
        $Failed_job->bgk_institution_m='institute/'.$user->correo.'/'.$fileName;
      
       }
       if ($request->hasFile('bgk_institution_f') && $request->file('bgk_institution_f')->isValid()) {

    
        $file = $request->file('bgk_institution_f');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('institute/'.$user->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
        $Failed_job->bgk_institution_f='institute/'.$user->correo.'/'.$fileName;
      
       }
             
            if ($Failed_job->save()) {
             
                return redirect()->back()->with('success', 'Creado con éxito');
            }


       return   redirect()->back()->with('error', 'Error al Crear');
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
// esta funcion llama a la vista editar
    public function edit($id)
    {
        try {
            if (session()->has('user')) {
        $datos = Failed_job::findOrFail($id);
        return view('failed_job.edit', compact('datos'));
            }else{
                return   redirect()->back()->with('error', 'Error al Crear');
            }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

// esta funcion actualiza los datos en la base d
    public function update(Request $request, $id)
    {
           try {
            $user= session('user');
            $Failed_job = Failed_job::findOrFail($id);
            $Failed_job->nombre_institution =$request->input('nombre_institution');
            $Failed_job->correo_institution =$request->input('correo_institution');
            $Failed_job->dni_institution =$request->input('dni_institution');
            $Failed_job->representative_inst =$request->input('representative_inst');
            $Failed_job->web_institution = $request->input('web_institution');
            $Failed_job->state_institution=$request->input('state_institution');
            $Failed_job->representative_inst=$request->input('representative_inst');

           
           
   
        if ($request->hasFile('img_logo') && $request->file('img_logo')->isValid()) {

    
        $file = $request->file('img_logo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('institute/'.$user->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
        $Failed_job->img_logo='institute/'.$user->correo.'/'.$fileName;
      
       }
       if ($request->hasFile('bgk_institution_m') && $request->file('bgk_institution_m')->isValid()) {

    
        $file = $request->file('bgk_institution_m');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('institute/'.$user->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
        $Failed_job->bgk_institution_m='institute/'.$user->correo.'/'.$fileName;
      
       }
       if ($request->hasFile('bgk_institution_f') && $request->file('bgk_institution_f')->isValid()) {

    
        $file = $request->file('bgk_institution_f');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('institute/'.$user->correo), $fileName); // Copiar el archivo a la carpeta "public/uploads"
        $Failed_job->bgk_institution_f='institute/'.$user->correo.'/'.$fileName;
      
       }
             
            if ($Failed_job->save()) {
             
                return redirect()->back()->with('success', 'Creado con éxito');
            }
            
        return   redirect()->back()->with('error', 'Error al Actualizar');
   } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

// esta funcion elimina datos de la tabla
    public function destroy($id)
    {
   
        if (session()->has('user')) {
        $Failed_job = Failed_job::findOrFail($id);

        if(!empty($Failed_job->img_logo)){
      

       
         $rutaImagen = public_path($Failed_job->img_logo); 
         if (File::exists($rutaImagen)) {
             File::delete($rutaImagen); // Elimina la imagen
             
         }
        }
        
        if(!empty($Failed_job->bgk_institution_m)){

    
             
             $rutaImagen = public_path($Failed_job->bgk_institution_m); 
             if (File::exists($rutaImagen)) {
                 File::delete($rutaImagen); // Elimina la imagen
                 
             }
            }
            
        if(!empty($Failed_job->bgk_institution_f)){
            
    
            
             $rutaImagen = public_path($Failed_job->bgk_institution_f); 
             if (File::exists($rutaImagen)) {
                 File::delete($rutaImagen); // Elimina la imagen
                 
             }
            }
      
 if(!empty($Failed_job->id)){
    $Failed_job->delete();
           }
        
        return redirect()->route('failed_job.index');
    }else{
        return   redirect()->back()->with('error', 'Error al Crear');
    }
  }

    // login
// esta funcion realiza una verificacion y un login

}
