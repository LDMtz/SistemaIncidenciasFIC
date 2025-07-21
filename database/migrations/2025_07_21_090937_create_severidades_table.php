<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('severidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
        });

        //Insertando registros manualmente
        foreach (['Sugerencia','Baja','Media','Alta','Crítica'] as $type){
            DB::table('severidades')->insert(['nombre' => $type]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('severidades');
    }
};
