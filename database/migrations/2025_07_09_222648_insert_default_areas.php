<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('areas')->insert([
            ['nombre' => 'Dirección', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Secretaría administrativa', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Secretaría academica', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Control escolar', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Servicio social', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Tutorías', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Vinculación', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Seguimiento a egresados', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Posgrado', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Planeación', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Centro de cómputo', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Jefaturas de carrera', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Intendencia', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Aulas', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Taller de arquitectura', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Taller de redes', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Cubículos de maestros', 'estado' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
