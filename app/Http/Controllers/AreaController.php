<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\User;

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
            $area->encargados()->attach($request->encargados);
         }

         return redirect()->route('admin.areas.index')->with('success', 'Área creada correctamente.');
     }

     public function show($id){
        //
     }

     public function edit($id){
        //
     }

     public function update($id){
        //
     }

     public function destroy($id){
        //
     }
}
