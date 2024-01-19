<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;
use App\Models\Failed_job;
class HomeController extends Controller
{
    //Home trabajara solo con las rutas get genenerales del sistema

    // la ruta index muestra el incio de la pagina
    public function Index(){return view('extens.home');}

    // la ruta registros muetra el formulario para registrar usuarios
    public function Register(){return view('extens.register'); }
    // muestra la pagina de inicio de sesion
    public function Login()
    {
        if (!session()->has('user')) {
            return view('extens.login');
        } else {
            return redirect('home');
        }
    }
// muestra el panel de control
    public function Dashboard()
    {
        if (session()->has('user')) {

            $institu = Failed_job::all();
                return view('extens.dashboard',compact('institu'));
            
        } else {
            return redirect('login');
        }
    }

    // funcionpara salir del login inciado
    public function Salir()
    {
        session()->forget('user');
        session()->flush();
        return redirect('/');
    }
// funcion para mostrat el modulo de usuarios

// llamar al frmularios de usuarios para crear




}

