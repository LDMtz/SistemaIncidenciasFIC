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

    //Ruta general
    public function create()
    {
        $user = Auth::user();
        $severidades = Severidad::get()->toArray();
        $areas = Area::get()->map(function ($area) {
            return ['id' => $area->id, 'nombre' => $area->nombre,];
        });

        return view("general.reportes.create", compact('user', 'areas', 'severidades'));
    }

    //Ruta general
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
                $ruta = $foto->store('fotos/reportes', 'public');
                $reporte->fotos()->create([
                    'ruta' => $ruta, // guarda solo la ruta relativa
                ]);
            }
        }

        // Obtener usuarios responsables del área (encargados o administradores)
        $usuarios = $reporte->area->usuariosResponsables();

        // Notificar a todos los usuarios responsables (encargados o administradores [en caso de que el area no tenga encargados])
        foreach ($usuarios as $usuario) {
            $usuario->notify(new NuevoReporteNotification($reporte));
        }

        return redirect()->route('home')->with('success', '¡Reporte enviado correctamente!');
    }

    //Ruta general
    public function show($id)
    {   
        $reporte = Reporte::with(['usuario', 'area', 'severidad', 'estado', 'fotos'])
            ->findOrFail($id);

        //Encargados del área
        $encargados = $reporte->area->usuariosResponsables();

        //Rol del usuario autenticado
        $rol = Auth::user()->rol->nombre;

        return view("general.reportes.show", compact('reporte','encargados','rol'));
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
