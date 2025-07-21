<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Datos falsos de prueba para el desarrollo
        $roles = [1, 2, 3];
        foreach ($roles as $rol_id) {
            for ($i = 1; $i <= 5; $i++) {
                DB::table('users')->insert([
                    'rol_id' => $rol_id,
                    'apellidos' => fake()->lastName . ' ' . fake()->lastName,
                    'nombres' => fake()->firstName,
                    'email' => fake()->unique()->safeEmail,
                    'telefono' => fake()->numerify('667#######'),
                    'password' => Hash::make('prueba123'),
                    'foto' => null,
                    'estado' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
