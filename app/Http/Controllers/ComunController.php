<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ComunController extends Controller
{
    public function create()
    {
        return view('comun.create');
    }

    public function store(Request $request){
        //Validamos los datos recibidos
        $datos_validados = $request->validate([
            'apellidos' => 'required|string|max:40',
            'nombres' => 'required|string|max:40',
            'correo' => 'required|email|max:200|unique:users,email',
            'telefono' => 'required|string|size:10',
            'clave' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'rol_id' => 3,
            'apellidos' => $datos_validados['apellidos'],
            'nombres' => $datos_validados['nombres'],
            'email' => $datos_validados['correo'],
            'telefono' => $datos_validados['telefono'],
            'password' => Hash::make($datos_validados['clave']),
            'foto' => null,
            'estado' => true,
        ]);

        return redirect()->route('login')->with('success', '¡Usuario creado exitosamente!');
    }
}
