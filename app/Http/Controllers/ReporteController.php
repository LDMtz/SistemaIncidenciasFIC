<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'area'     => 'required|exists:areas,id',
            'severidad' => 'required|exists:severidades,id',
            'titulo'      => 'required|string',
            'comentario'  => 'required|string',
            'fotos.*'     => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        //($request);

        $reporte = new Reporte();
        $reporte->user_id = Auth::user()->id;
        $reporte->area_id = $request->area;
        $reporte->severidad_id = $request->severidad;
        $reporte->titulo = $request->titulo;
        $reporte->comentario = $request->comentario;
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

        return redirect()->back()->with('success', 'Reporte enviado correctamente.');
    }
}
