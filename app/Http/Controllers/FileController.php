<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Filedata;
use App\Models\Ruta;
use App\Models\Shares;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class FileController extends Controller
{
     public function index()
    {
        try {
            if (session()->has('user')) {
           
        $datos = Filedata::with('Usuario')
        ->latest()
        ->has('Usuario')->paginate(10);
        
        return view('file.index', compact('datos'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

 public function shareindex()
    {
        try {
            if (session()->has('user')) {
           $user=    session('user');
     
        
      

       $customer  = Shares::with('files','customer')
                ->where('id_customer', $user->id)
                ->has('files')
                ->has('customer')
                ->paginate(10);

        $supplier = Shares::with('files','supplier')
                ->where('id_supplier', $user->id)
                ->has('files')
                ->has('supplier')
                ->paginate(10);

    
     
        $matriz= compact('customer','supplier');
        
        return view('file.shareindex', compact('matriz'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }


    public function buscar(Request $request)
    {
        try{
    $query = Filedata::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('name_file', 'like', "%$filtro_nombre%");
    }

  
    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('file.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }
public function buscarfilerute(Request $request, $id)
{
    try {
        // Obtiene el archivo por su ID
        $datos = Filedata::findOrFail($id);

        // Inicializa la consulta de rutas
        $query = Ruta::where('id_filedata', $id);

        // Aplica el filtro de nombre si se proporciona en la solicitud
        if ($request->has('filtro_nombre')) {
            $filtro_nombre = $request->input('filtro_nombre');
            $query->where('rutas', 'like', "%$filtro_nombre%");
        }

        // Continúa agregando más filtros si es necesario

        // Obtiene las rutas paginadas
        $archivos = $query->latest()->paginate(10);

        $matriz = compact('datos', 'archivos');

        // Retorna la vista con los datos
        return view('file.showfile', compact('matriz'));
    } catch (Exception $e) {
        // Manejo de errores: redirecciona de nuevo con un mensaje de error
        return redirect()->back()->with('error', 'Error al cargar');
    }
}





    public function create()
    {
        try {
            if (session()->has('user')) {
                
        return view('file.create');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }


    }
  

   public function sharefile($id)
    {
        try {
            if (session()->has('user')) {
                 $datos = Filedata::findOrFail($id);
                $usuarios = Usuario::all();
                $matriz= compact('datos','usuarios');
                
        return view('file.sharefile', compact('matriz'));
       
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }


    }

  public function storeshare(Request $request)
{
    // Validación y otras operaciones necesarias
 try {
     if (session()->has('user')) {
    $id_filedata = $request->input('id_filedata');
    $id_customer = $request->input('id_customer');
    $id_supplier = $request->input('id_supplier');
   
    
    $filedata= new Shares();
    $filedata->id_filedata= $id_filedata;
    $filedata->id_customer= $id_customer;
    $filedata->id_supplier= $id_supplier;
    $filedata->save();


 
      return   redirect()->back()->with('success', 'Creado con exito');

    }else{
        return redirect('/');
    }  
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   
    return redirect()->back()->with('success', 'Creado con éxito');
}





    public function store(Request $request)
{
    // Validación y otras operaciones necesarias
 try {
     if (session()->has('user')) {
    $name = $request->input('name_file');
    $status = $request->input('state');
    $detalles = $request->input('detalles');
    $id_user = $request->input('id_usuario');
    
    $filedata= new Filedata();
    $filedata->name_file= $name;
    $filedata->state= $status;
    $filedata->detalles= $detalles;
    $filedata->id_usuario= $id_user;
    $filedata->save();


 $entrada=$filedata;
    if ($request->has('file_st')) {
        foreach ($request->file('file_st') as $archivo) {

           $archivoname = uniqid() . '_._' . $archivo->getClientOriginalName();
            

              // Mover el archivo a la carpeta "public"
              $archivo->move(public_path().'/filesdata/'.session('user')->correo.'/'.date("Ymd").'/'.$archivo->getClientOriginalExtension().'/',   $archivoname);

              $ruta='/filesdata/'.session('user')->correo.'/'.date("Ymd").'/'.$archivo->getClientOriginalExtension().'/'.$archivoname;
           
           // return $archivo->getClientOriginalExtension();
            /*$archivo->storeAs('public/file/'.session('user')->correo.'/'.date("Ymd").'/'.$archivo->getClientOriginalExtension().'/', $nombreArchivo);*/

            Ruta::create(['rutas' => $ruta, 'id_filedata' => $entrada->id,'id_usuario' => $request->input('id_usuario')]);
        }
    }
      return   redirect()->back()->with('success', 'Creado con exito');

    }else{
        return redirect('/');
    }  
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   
    return redirect()->back()->with('success', 'Creado con éxito');
}


// esta funcion llama a la vista editar
    public function edit($id)
    {
        try {
            if (session()->has('user')) {
                $datos = Filedata::findOrFail($id);
                $archivos= Ruta::where('id_filedata', $id)->get();
                $matriz= compact('datos','archivos');
                
        return view('file.edit', compact('datos'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

 public function editfile($id)
    {
        try {
            if (session()->has('user')) {
                $datos = Ruta::findOrFail($id);

        return view('file.editafile', compact('datos'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

public function profiledat($id)
    {
        try {
            if (session()->has('user')) {
                $datos = Ruta::findOrFail($id);

        return view('file.editafile', compact('datos'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

public function showfile($id)
{
            try {

            if (session()->has('user')) {
                
             $datos = Filedata::findOrFail($id);

            // Corrección: Aplicamos paginate() a la consulta, no a la colección
            $archivos = Ruta::where('id_filedata', $id)->paginate(10);

            $matriz = compact('datos', 'archivos');
            return view('file.showfile', compact('matriz'));

            }else{
            return redirect('/');
            }
            } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
            }
 }


// esta funcion actualiza los datos en la base d
public function update(Request $request, $id)
{
    try {
        if (session()->has('user')) {

            $name = $request->input('name_file');
            $status = $request->input('state');
            $detalles = $request->input('detalles');
            $id_user = $request->input('id_usuario');

            $filedata = Filedata::findOrFail($id);
            $filedata->name_file = $name;
            $filedata->state = $status;
            $filedata->detalles = $detalles;
            $filedata->save();

            $entrada = $filedata;
     $rutas= Ruta::where('id_filedata', $id)->get();
     $ruta24= explode('/',$rutas[0]);
    $fechacarpeta= $ruta24[3];
    //return $fechacarpeta;
            if ($request->has('file_st')) {
                foreach ($request->file('file_st') as $archivo) {
                  
                     $archivoname = uniqid() . '_._' . $archivo->getClientOriginalName();
                  
 
                    // Mover el archivo a la carpeta "public"
              $archivo->move(public_path().'/filesdata/'.session('user')->correo.'/'.$fechacarpeta.'/'.$archivo->getClientOriginalExtension().'/',  $archivoname);

           $ruta='/filesdata/'.session('user')->correo.'/'.$fechacarpeta.'/'.$archivo->getClientOriginalExtension().'/'.$archivoname;
             

                     Ruta::create(['rutas' => $ruta, 'id_filedata' =>$id,'id_usuario' => $request->input('id_usuario')]);
                }
                return redirect()->back()->with('success', 'Actualizado con éxito');
            }

            return redirect()->back()->with('error', 'No se han proporcionado archivos para actualizar');
        } else {
            return redirect('/');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error al Actualizar: ' . $e->getMessage());
    }
}
// esta funcion elimina datos de la tabla
public function updatefiledata(Request $request, $id)
{
    try {
        if (session()->has('user')) {

     $ruta= Ruta::findOrFail($id);
     $ruta24= explode('/',$ruta->rutas);
    $fechacarpeta= $ruta24[3];
    //return $fechacarpeta;
                if ($request->has('file_st')) {

                $archivo=$request->file('file_st');
                $archivoname = uniqid() . '_._' . $archivo->getClientOriginalName();
                $rutaImagen = public_path($ruta->rutas); 
                if (File::exists($rutaImagen)) {
                File::delete($rutaImagen); // Elimina la imagen

                }
                // Mover el archivo a la carpeta "public"
                $archivo->move(public_path().'/filesdata/'.session('user')->correo.'/'.$fechacarpeta.'/'.$archivo->getClientOriginalExtension().'/',  $archivoname);

                $rutadf='/filesdata/'.session('user')->correo.'/'.$fechacarpeta.'/'.$archivo->getClientOriginalExtension().'/'.$archivoname;
                $ruta->rutas=$rutadf;
                $ruta->save();

                return redirect()->back()->with('success', 'Actualizado con éxito');
                }

            return redirect()->back()->with('error', 'No se han proporcionado archivos para actualizar');
        } else {
            return redirect('/');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error al Actualizar: ' . $e->getMessage());
    }
}
// esta funcion elimina datos de la tabla


public function destroy($id)
{
    try {
        if (session()->has('user')) {
            $user=    session('user');
            // Buscar y eliminar registros relacionados en la tabla Ruta
            $rutas = Ruta::where('id_filedata', $id)->get();
            foreach ($rutas as $key => $value) {
                $frutas = explode("/", $value['rutas']);

         $rutafile =   $frutas[1] .'/'.$frutas[2].'/'.$frutas[3].'/'.$frutas[4].'/'.$frutas[5]   ;
//return   $rutafile;
 

                 $rutafile2 = public_path($rutafile); // Ruta completa al archivo en la carpeta 'public'
              
              

               Shares::where('id_filedata', $id)
                ->where('id_supplier', $user->id)
                  ->delete();

                if (File::exists($rutafile2)) {
                    File::delete($rutafile2); // Elimina el archivo
                }

            Ruta::where('id_filedata', $id)->delete();
}
            // Buscar y eliminar el registro en la tabla File
           $dato = Filedata::findOrFail($id);
            $dato->delete();

            return redirect()->route('file.index');
        } else {
            return redirect('/');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error al Cargar');
    }
}

public function DrestoyArchivos($id)
{
    try {
        if (session()->has('user')) {
            // Buscar y eliminar registros relacionados en la tabla Ruta
            $rutas = Ruta::where('id_filedata', $id)->get();
            foreach ($rutas as $key => $value) {
                $frutas = explode("/", $value['rutas']);

         $rutafile =   $frutas[1] .'/'.$frutas[2].'/'.$frutas[3].'/'.$frutas[4].'/'.$frutas[5]   ;
//return   $rutafile;
 

                 $rutafile2 = public_path($rutafile); // Ruta completa al archivo en la carpeta 'public'

                if (File::exists($rutafile2)) {
                    File::delete($rutafile2); // Elimina el archivo
                }

            Ruta::where('id_filedata', $id)->delete();
}
            // Buscar y eliminar el registro en la tabla File
           $dato = Filedata::findOrFail($id);
            $dato->delete();

            return redirect()->route('file.index');
        } else {
            return redirect('/');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error al Cargar');
    }
}


public function DrestoyFileDat($id)
{
    try {
        if (session()->has('user')) {
            // Buscar y eliminar registros relacionados en la tabla Ruta
            $rutas = Ruta::where('id', $id)->get();
            foreach ($rutas as $key => $value) {
                $frutas = explode("/", $value['rutas']);

         $rutafile =   $frutas[1] .'/'.$frutas[2].'/'.$frutas[3].'/'.$frutas[4].'/'.$frutas[5]   ;
//return   $rutafile;
 

                 $rutafile2 = public_path($rutafile); // Ruta completa al archivo en la carpeta 'public'

                if (File::exists($rutafile2)) {
                    File::delete($rutafile2); // Elimina el archivo
                }

            Ruta::where('id', $id)->delete();
}
            // Buscar y eliminar el registro en la tabla File

            return redirect()->back()->with('success', 'Eliminado correctamente');
        } else {
            return redirect('/');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error al Cargar');
    }
}

public function destroyshare($id)
{
    try {
        if (session()->has('user')) {
            
            // Buscar y eliminar el registro en la tabla File
           $dato = Shares::findOrFail($id);
            $dato->delete();

           return redirect()->back()->with('success', 'Eliminada con exito');
        } else {
            return redirect('/');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error al Cargar');
    }
}

}
