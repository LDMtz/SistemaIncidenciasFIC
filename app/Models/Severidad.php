<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Severidad extends Model
{
    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }
}
