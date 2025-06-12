<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form(){
        return view("auth.login");
    }

    public function home(){
        /*
        //Ejemplo de como podria ser
        switch (Auth::user()->role_id) {
            case 1:
                return view('comun.home');
            case 2:
                return view('admin.home');
            case 3:
                return view('encargado.home');
            default:
                abort(403, 'Acceso no autorizado');
        }
        */
    }

    /*
    //Ejemplo de otro sitema
    public function to_logout(){
        Session::flush();
        Auth::logout();
        return to_route('login');
    }

    public function to_login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }else{
            return back()->withErrors(['login' => 'Credenciales incorrectas']);
        }
    }
    */
}
