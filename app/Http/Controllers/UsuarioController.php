<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    //
    public function admin_index(Request $request)
    {
        $sortOrder = $request->get('sort', 'asc'); // ascendente o descendente
        $campo = $request->get('campo');           // campo a buscar
        $valor = $request->get('valor');           // valor a buscar

        $query = User::query();

        // Campos válidos para filtrar
        $camposPermitidos = ['nombres', 'apellidos', 'email', 'telefono', 'estado'];

        // Validamos y aplicamos filtro
        if ($campo && $valor !== null && in_array($campo, $camposPermitidos)) {
            // Si el campo es booleano (estado), comparamos exacto
            if ($campo === 'estado') {
                // Convierte "activo" o "inactivo" a 1 o 0 si viene como texto
                if (strtolower($valor) === 'activo') {
                    $valor = 1;
                } elseif (strtolower($valor) === 'inactivo') {
                    $valor = 0;
                }
                $query->where($campo, $valor);
            } else {
                // Para texto: LIKE
                $query->where($campo, 'like', '%' . $valor . '%');
            }
        }

        $usuarios = $query->orderBy('created_at', $sortOrder)
                        ->paginate(5)
                        ->appends($request->query());

        return view('admin.usuarios.index', compact('usuarios', 'sortOrder', 'campo', 'valor'));
    }

    public function admin_update(Request $request, $id)
    {
        if ($id == 1) {
            return redirect()->route('admin.usuarios.index')->with('error', 'Este usuario no puede ser editado.');
        }

        $datos_validados = $request->validate([
            'rol' => 'required|exists:roles,id',
            'estado' => 'required|boolean',
        ]);
        $usuario = User::findOrFail($id);
        $actualizado = $usuario->update([
            'rol_id' => $datos_validados['rol'],
            'estado' => $datos_validados['estado'],
        ]);

        if ($actualizado) {
            return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado correctamente.');
        } else {
            return redirect()->route('admin.usuarios.index')->with('error', 'No se pudo actualizar el usuario.');
        }
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

    public function show($id){
        $usuario = User::with('rol')->findOrFail($id);
        return response()->json($usuario); //<-- Json por la modal
        //TODO: Cambiar la logica, para cuando ocupe hacerlo con compact
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        return response()->json($usuario);
    }

    public function destroy($id){
        if ($id == 1) return redirect()->route('admin.usuarios.index')->with('error', 'Este usuario no puede ser eliminado.');

        $user = User::find($id);

        if (!$user) return redirect()->route('admin.usuarios.index')->with('error', 'No se pudo eliminar el usuario.');

        $user->delete();

         return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado correctamente.');
         //TODO: Validar que el usuario no tenga asociado un reporte o incidencia
    }


}
