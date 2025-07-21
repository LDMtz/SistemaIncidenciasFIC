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
}
