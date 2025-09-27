<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoReporte extends Model
{
    protected $table = 'estados_reportes';

    protected $fillable = [
        'nombre',
    ];

    // Un estado puede estar asignado a muchos reportes
    public function reportes()
    {
        return $this->hasMany(Reporte::class, 'estado_id');
    }
}