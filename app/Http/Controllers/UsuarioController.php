<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UsuarioController extends Controller
{
    //
    public function admin_index(Request $request){
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

    public function admin_update(Request $request, $id){
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

    public function update_profile(Request $request, $id){
        
        $datos_validados = $request->validate([
            'apellidos' => 'required|string|max:40',
            'nombres' => 'required|string|max:40',
            'telefono' => 'required|string|size:10',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $usuario = User::findOrFail($id);

        // Inicializa variable
        $rutaFoto = $usuario->foto; // conserva la anterior por defecto

        // Si se sube una nueva foto...
        if ($request->hasFile('foto')) {
            // Elimina la foto anterior si existe
            if ($usuario->foto && Storage::disk('public')->exists($usuario->foto)) {
                Storage::disk('public')->delete($usuario->foto);
            }

            // Guarda la nueva foto
            $rutaFoto = $request->file('foto')->store('fotos', 'public');
        }

        $actualizado = $usuario->update([
            'apellidos' => $datos_validados['apellidos'],
            'nombres' => $datos_validados['nombres'],
            'telefono' => $datos_validados['telefono'],
            'foto' => $rutaFoto,
        ]);

        if ($actualizado) {
            return redirect()->route('home')->with('success', 'Usuario actualizado correctamente.');
        } else {
            return redirect()->route('home')->with('error', 'No se pudo actualizar el usuario.');
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

    public function profile(){
        $usuario = Auth::user();
        switch ($usuario->rol_id) {
            case 1:
                return view('admin.usuarios.profile', compact('usuario'));
            case 2:
                return view('encargado.home', compact('usuario')); //Home temporalmente
            case 3:
                return view('comun.home', compact('usuario'));  //Home temporalmente
            default:
                abort(403, 'Acceso no autorizado');
        }
    }


}
