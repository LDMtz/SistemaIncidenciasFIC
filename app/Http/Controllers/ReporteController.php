<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NuevoReporteNotification;

class ReporteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'area'     => 'required|exists:areas,id',
            'severidad' => 'required|exists:severidades,id',
            'titulo'      => 'required|string',
            'descripcion'  => 'required|string',
            'fotos.*'     => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $reporte = new Reporte();
        $reporte->user_id = Auth::user()->id;
        $reporte->area_id = $request->area;
        $reporte->severidad_id = $request->severidad;
        $reporte->titulo = $request->titulo;
        $reporte->descripcion = $request->descripcion;
        $reporte->save();

        // Procesar fotos si vienen
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $ruta = $foto->store('fotos/reportes', 'public');
                $reporte->fotos()->create([
                    'ruta' => Storage::url($ruta),
                ]);
            }
        }

        // Obtener encargados del área
        $encargados = $reporte->area->encargados ?? collect();

        if ($encargados->isNotEmpty()) // Notificar a todos los encargados del área
            foreach ($encargados as $encargado) $encargado->notify(new NuevoReporteNotification($reporte));
        else { // Si no hay encargados, notificar al administrador
            $admins = User::whereHas('rol', function ($q) {$q->where('nombre', 'Administrador');})->get();
            foreach ($admins as $admin) $admin->notify(new NuevoReporteNotification($reporte));
        }

        return redirect()->back()->with('success', 'Reporte enviado correctamente.');
    }

    public function show($id){
        return view("general.report");
    }
}
