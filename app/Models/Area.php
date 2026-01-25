<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $fillable = [
        'nombre',
        'estado',
    ];

    //Relaciones
    public function encargados()
    {
        return $this->belongsToMany(User::class, 'area_user');
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }

    /**
     * Obtener los encargados del área.
     * Si no hay encargados, retorna los usuarios con rol 'Administrador'.
     */
    public function usuariosResponsables()
    {
        $encargados = $this->encargados()
            ->whereHas('rol', fn($q) => $q->where('nombre', 'Encargado'))
            ->get();

        if ($encargados->isEmpty()) {
            $encargados = User::whereHas('rol', fn($q) => $q->where('nombre', 'Administrador'))->get();
        }

        return $encargados;
    }
}
