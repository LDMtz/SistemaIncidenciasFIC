<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login_form(){
        return view("auth.login");
    }

    public function home(){
        
        switch (Auth::user()->rol_id) {
            case 1:
                return view('admin.home');
            case 2:
                return view('encargado.home');
            case 3:
                return view('comun.home');
            default:
                abort(403, 'Acceso no autorizado');
        }
    }

    public function to_logout(){
        Session::flush();
        Auth::logout();
        return to_route('login');
    }

    public function to_login(Request $request){
        $credenciales = [
            'email' => $request->correo,
            'password' => $request->clave,
        ];

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }else{
            return back()->withErrors(['login' => 'Credenciales incorrectas']);
        }
    }
}
