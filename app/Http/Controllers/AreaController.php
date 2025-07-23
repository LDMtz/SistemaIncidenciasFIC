<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\User;
use App\Notifications\AreaAsignadaNotification;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
   public function admin_index(){

      $areas = Area::withCount('encargados')
      ->get()
      ->map(function ($area) {
            return [
               'id' => $area->id,
               'nombre' => $area->nombre,
               'estado' => $area->estado,
               'encargados_count' => $area->encargados_count,
            ];
      });

      $encargados_disp = User::whereHas('rol', function ($query) {
            $query->where('nombre', 'Encargado');
            })
            ->select('id', 'nombres', 'apellidos')
            ->orderBy('apellidos')
            ->get()
            ->map(function ($user) {
               return [
                     'id' => $user->id,
                     'nombres' => $user->nombres,
                     'apellidos' => $user->apellidos,
               ];
         });

         $encargados_con_areas = User::whereHas('rol', function ($query) {
            $query->where('nombre', 'Encargado');
         })
         ->has('areas') // Solo usuarios con al menos una área asignada
         ->withCount('areas') // Contador de áreas asignadas
         ->orderBy('apellidos')
         ->get()
         ->map(function ($user) {
            return [
                  'id' => $user->id,
                  'nombres' => $user->nombres,
                  'apellidos' => $user->apellidos,
                  'email' => $user->email,
                  'foto' => $user->foto,
                  'areas_count' => $user->areas_count,
            ];
         });

         //dd($encargados_con_areas);

      return view('admin.areas.index', compact('areas','encargados_disp','encargados_con_areas'));
   }

   public function store(Request $request){
      $request->validate([
         'nombre_area' => 'required|string|max:255',
         'encargados' => 'nullable|array',
         'encargados.*' => 'exists:users,id',
      ]);

      // 1. Crear el área
      $area = Area::create(['nombre' => $request->nombre_area]);

      // 2. Asignar encargados seleccionados, si hay
      if ($request->has('encargados')) {
         $area->encargados()->attach($request->encargados); //Les asigna el área
         $admin = Auth::user();

         //Le notificamos a todos los encargados
         foreach ($request->encargados as $encargadoId) {
            $usuario = User::find($encargadoId);
            if ($usuario) {
                $usuario->notify(new AreaAsignadaNotification($admin, $area));
            }
        }
      }

      return redirect()->route('admin.areas.index')->with('success', 'Área creada correctamente.');
   }

   public function show($id){
      $area = Area::with('encargados')->withCount('encargados')->findOrFail($id);

      return response()->json([
         'nombre' => $area->nombre,
         'estado' => $area->estado,
         'created_at' => $area->created_at,
         'encargados_count' => $area->encargados_count,
         'encargados' => $area->encargados->map(function ($encargado) {
            return [
                  'nombres' => $encargado->nombres,
                  'apellidos' => $encargado->apellidos,
            ];
         }),
      ]);
   }

   public function edit($id){
      $area = Area::with('encargados')->withCount('encargados')->findOrFail($id);

      $encargados_disp = User::whereHas('rol', function ($query) {
         $query->where('nombre', 'Encargado');
         })
         ->select('id', 'nombres', 'apellidos')
         ->orderBy('apellidos')
         ->get()
         ->map(function ($user) {
            return [
                  'id' => $user->id,
                  'nombres' => $user->nombres,
                  'apellidos' => $user->apellidos,
            ];
      });

      return response()->json([
         'id' => $area->id,
         'nombre' => $area->nombre,
         'estado' => $area->estado,
         'created_at' => $area->created_at,
         'encargados_count' => $area->encargados_count,
         'encargados_sel' => $area->encargados->map(function ($encargado) {
            return [
                  'id' => $encargado->id,
                  'nombres' => $encargado->nombres,
                  'apellidos' => $encargado->apellidos,
            ];
         }),
         'encargados_disp' => $encargados_disp,
      ]);
   }

   public function update(Request $request, $id){
      $request->validate([ 
         'nombre_area' => 'required|string|max:255',
         'encargados' => 'nullable|array',
         'encargados.*' => 'exists:users,id',
         'estado' => 'required|boolean',
      ]);

      $area = Area::findOrFail($id);

      //Encargados actuales
      $encargadosAnteriores = $area->encargados->pluck('id')->toArray();

      // Actualizar los datos del área
      $area->nombre = $request->nombre_area;
      $area->estado = $request->estado;
      $area->save();

      // Sincronizar encargados (si no hay, los elimina todos)
      $area->encargados()->sync($request->encargados ?? []);

      // Detectar nuevos encargados
       $nuevosEncargados = array_diff($request->encargados ?? [], $encargadosAnteriores);

      // Notificar a los nuevos encargados
      $admin = Auth::user();
      foreach ($nuevosEncargados as $idEncargado) {
         $usuario = User::find($idEncargado);
         if ($usuario) {
               $usuario->notify(new AreaAsignadaNotification($admin, $area));
         }
      }

      return redirect()->route('admin.areas.index')->with('success', 'Área actualizada correctamente.');
   }

   public function destroy($id){
      $area = Area::find($id);

      if (!$area) return redirect()->route('admin.areas.index')->with('error', 'No se pudo eliminar el área.');

      // Verifica si tiene reportes asociados
      if ($area->reportes()->count() > 0) {
         return redirect()->route('admin.areas.index')
               ->with('error', 'No se puede eliminar el área porque tiene reportes asociados. Cambia su estado en lugar de eliminarla.');
      }

      $area->delete();

      return redirect()->route('admin.areas.index')->with('success', 'Área eliminada correctamente.');
   }

   public function show_user_areas($id){
      $user = User::with('areas')->withCount('areas')->findOrFail($id);

      return response()->json([
         'nombre' => $user->apellidos.' '.$user->nombres,
         'email' => $user->email,
         'estado' => $user->estado,
         'foto' => $user->foto,
         'areas_count' => $user->areas_count,
         'areas' => $user->areas->map(function ($area) {
            return [
                  'nombre' => $area->nombre,
            ];
         }),
      ]);
   }
}
