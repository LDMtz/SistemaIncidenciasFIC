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
    public function admin_index(Request $request){
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
            }else {
                $query->where($campo, 'like', '%' . $valor . '%');
            }
        }

        $reportes = $query->orderBy('created_at', $sortOrder)
                        ->paginate(10)
                        ->appends($request->query());

        //dd($reportes);

        return view('admin.reportes.index', compact('reportes', 'sortOrder', 'campo', 'valor'));
    }

    public function create(){
        $user = Auth::user(); 
        $severidades = Severidad::get()->toArray();
        $areas = Area::get()->map(function ($area){ return ['id' => $area->id,'nombre' => $area->nombre,];});

        return view("general.reportes.create", compact('user','areas','severidades'));
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

        //return redirect()->back()->with('success', 'Reporte enviado correctamente.');
        return redirect()->route('home')->with('success', '¡Reporte enviado correctamente!');
    }

    public function show($id){
        return view("general.reportes.show");
    }

}
