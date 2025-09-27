<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'user_id',
        'area_id',
        'severidad_id',
        'estado_id',
        'titulo',
        'comentario',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function severidad()
    {
        return $this->belongsTo(Severidad::class);
    }

    public function estado()
    {
        return $this->belongsTo(EstadoReporte::class);
    }

    public function fotos()
    {
        return $this->hasMany(ReporteFoto::class);
    }
}
