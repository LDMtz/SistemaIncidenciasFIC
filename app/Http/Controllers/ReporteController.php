<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NuevoReporteNotification;

use App\Models\Area;
use App\Models\Severidad;

class ReporteController extends Controller
{
    public function admin_index(Request $request)
    {
        $sortOrder = $request->get('sort', 'desc'); // ascendente o descendente
        $campo = $request->get('campo');           // campo a buscar
        $valor = $request->get('valor');           // valor a buscar

        $query = Reporte::with(['usuario', 'area', 'severidad', 'estado']);

        // Campos válidos para filtrar
        $camposPermitidos = ['folio', 'estado', 'area', 'severidad', 'fecha'];

        // Validamos y aplicamos filtro
        if ($campo && $valor !== null && in_array($campo, $camposPermitidos)) {
            if ($campo === 'estado') {
                $query->whereHas('estado', function ($q) use ($valor) {
                    $q->where('nombre', 'like', '%' . $valor . '%');
                });
            } elseif ($campo === 'area') {
                $query->whereHas('area', function ($q) use ($valor) {
                    $q->where('nombre', 'like', '%' . $valor . '%');
                });
            } elseif ($campo === 'severidad') {
                $query->whereHas('severidad', function ($q) use ($valor) {
                    $q->where('nombre', 'like', '%' . $valor . '%');
                });
            } elseif ($campo === 'fecha') {
                $query->whereDate('created_at', 'like', '%' . $valor . '%');
            } else {
                $query->where($campo, 'like', '%' . $valor . '%');
            }
        }

        $reportes = $query->orderBy('created_at', $sortOrder)
            ->paginate(10)
            ->appends($request->query());

        //dd($reportes);

        return view('admin.reportes.index', compact('reportes', 'sortOrder', 'campo', 'valor'));
    }

    public function create()
    {
        $user = Auth::user();
        $severidades = Severidad::get()->toArray();
        $areas = Area::get()->map(function ($area) {
            return ['id' => $area->id, 'nombre' => $area->nombre,];
        });

        return view("general.reportes.create", compact('user', 'areas', 'severidades'));
    }

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

        $reporte->folio = 'REP-' . now()->format('Ymd') . '-' . str_pad($reporte->id, 4, '0', STR_PAD_LEFT);
        $reporte->save();

        // Procesar fotos si vienen
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                /*
                $ruta = $foto->store('fotos/reportes', 'public');
                $reporte->fotos()->create([
                    'ruta' => Storage::url($ruta),
                ]);
                */
                $ruta = $foto->store('fotos/reportes', 'public');
                $reporte->fotos()->create([
                    'ruta' => $ruta, // 👈 guarda solo la ruta relativa
                ]);
            }
        }

        // Obtener encargados del área
        $encargados = $reporte->area->encargados ?? collect();

        if ($encargados->isNotEmpty()) // Notificar a todos los encargados del área
            foreach ($encargados as $encargado) $encargado->notify(new NuevoReporteNotification($reporte));
        else { // Si no hay encargados, notificar al administrador
            $admins = User::whereHas('rol', function ($q) {
                $q->where('nombre', 'Administrador');
            })->get();
            foreach ($admins as $admin) $admin->notify(new NuevoReporteNotification($reporte));
        }

        //return redirect()->back()->with('success', 'Reporte enviado correctamente.');
        return redirect()->route('home')->with('success', '¡Reporte enviado correctamente!');
    }

    public function show($id)
    {
        return view("general.reportes.show");
    }

    public function review($id)
    {
        $reporte = Reporte::with(['usuario', 'area', 'severidad', 'estado', 'fotos'])
            ->findOrFail($id);

        //NOTA: Por el momento los encargados son los ADMINISTRADORES, temporalmente
        //TODO: Pasarle los encargados correspondientes del Area
        $encargados = User::whereHas('rol', function ($q) {
            $q->where('nombre', 'Administrador');
        })->get();

        return view("admin.reportes.review", compact('reporte', 'encargados'));
    }

    public function update_state(Request $request, $id)
    {
        $request->validate([
            'estado_id' => 'required|exists:estados_reportes,id',
        ]);

        $reporte = Reporte::findOrFail($id);
        $reporte->estado_id = $request->estado_id;
        $reporte->save();

        return back()->with('success', 'Estado actualizado correctamente.');
    }

    public function update_severity(Request $request, $id)
    {
        $request->validate([
            'severidad_id' => 'required|exists:severidades,id',
        ]);

        $reporte = Reporte::findOrFail($id);
        $reporte->severidad_id = $request->severidad_id;
        $reporte->save();

        return back()->with('success', 'Severidad actualizada correctamente.');
    }

    public function admin_update(Request $request, $id)
    {
        $request->validate([
            'estado_id' => 'required|exists:estados_reportes,id',
            'severidad_id' => 'required|exists:severidades,id',
        ]);

        $reporte = Reporte::findOrFail($id);
        $reporte->update([
            'estado_id' => $request->estado_id,
            'severidad_id' => $request->severidad_id,
        ]);

        return back()->with('success', 'Reporte actualizado correctamente.');
    }
}
