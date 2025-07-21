<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Area;

class EncargadosAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        OBJETIVO:
        - Cada área solo debe estar asignada a un usuario.
        - Un usuario con el rol de encargado puede tener una o más áreas.
        - No debe haber áreas sin asignar.
        - Si una área ya ha sido asignada, no se le debe volver a asignar a otro usuario.

        NOTA: En el sistema existe la posibilidad de que un area pueda tener varios encargados,
        pero aqui no buscamos eso.
        */

        // Obtener usuarios encargados
        $encargados = User::whereHas('rol', function ($i) {$i->where('nombre', 'Encargado');})->get();
        $areasAsignadas = DB::table('area_user')->pluck('area_id')->toArray();
        $areasNoAsignadas = Area::whereNotIn('id', $areasAsignadas)->pluck('id')->toArray();

        $encargadoCount = $encargados->count();

        $encargadoIndex = 0;

        foreach ($areasNoAsignadas as $areaId) {
            // Asignar el área al encargado actual
            $encargados[$encargadoIndex]->areas()->attach($areaId);

            // Mover al siguiente encargado
            $encargadoIndex++;

            // Si llegamos al final de la lista, volvemos al inicio
            if ($encargadoIndex >= $encargadoCount) {
                $encargadoIndex = 0;
            }
        }

    }
}
