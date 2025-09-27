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
        Schema::create('estados_reportes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
        });

        //Insertando registros manualmente
        foreach (['Recibido','En proceso','Resuelto','Cancelado','Pospuesto'] as $type){
            DB::table('estados_reportes')->insert(['nombre' => $type]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados_reportes');
    }
};
