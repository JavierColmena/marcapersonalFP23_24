<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Estudiante;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $estudiante = new Estudiante;
        $estudiante->nombre = 'Juan';
        $estudiante->apellidos = 'Martínez';
        $estudiante->direccion = 'Dirección de Juan';
        $estudiante->votos = 130;
        $estudiante->confirmado = true;
        $estudiante->ciclo = 'DAW';
        $estudiante->save();
    }
}
