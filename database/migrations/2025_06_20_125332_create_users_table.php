<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id')->constrained('roles')->onDelete('cascade');
            $table->string('apellidos', 40);
            $table->string('nombres', 40);
            $table->string('email')->unique();
            $table->string('telefono',10);
            $table->string('password');
            $table->string('foto')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        //Insertando al administrador principal
        DB::table('users')->insert([
            'rol_id' => 1,
            'apellidos' => 'Principal',
            'nombres' => 'Admin',
            'email' => 'admin@gmail.com',
            'telefono' => '0000000000',
            'password' => Hash::make('admin123'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};
