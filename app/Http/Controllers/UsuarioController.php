<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    //
    public function admin_index(){
        return view('admin.usuarios.index');
    }

    public function create(){
        //Asumimos que solo los usuarios comunes llaman esta funcion,
        // ya que el admin lo tiene en el index de user
        return view('comun.usuarios.create');
    }

    public function store(Request $request){
        //Validamos los datos recibidos
        $datos_validados = $request->validate([
            'rol' => 'required|exists:roles,id',
            'apellidos' => 'required|string|max:40',
            'nombres' => 'required|string|max:40',
            'correo' => 'required|email|max:200|unique:users,email',
            'telefono' => 'required|string|size:10',
            'clave' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'rol_id' => $datos_validados['rol'],
            'apellidos' => $datos_validados['apellidos'],
            'nombres' => $datos_validados['nombres'],
            'email' => $datos_validados['correo'],
            'telefono' => $datos_validados['telefono'],
            'password' => Hash::make($datos_validados['clave']),
            'foto' => null,
            'estado' => true,
        ]);

        // Redirección basada en si hay sesión iniciada
        if (Auth::check()) {
            // Usuario autenticado (Admin creó otro usuario)
            return redirect()->route('admin.usuarios.index')->with('success', '¡Usuario creado exitosamente!');
        } else {
            // Registro público sin sesión iniciada
            return redirect()->route('login')->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
        }
    }
}
