<?php

namespace Database\Seeders;

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
        // Verifica si el usuario ya existe basado en su email
        $existingUser = DB::table('users')->where('email', 'test@example.com')->first();

        if (!$existingUser) {
            DB::table('users')->insert([
                'name' => 'Test',
                'apellido' => 'User',
                'edad' => 30,
                'telefono' => '1234567890',
                'email' => 'test@example.com',
                'puesto' => 'Administrador',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'plain_password' => 'password123',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command->info('Usuario de prueba creado con éxito.');
        } else {
            $this->command->info('El usuario ya existe. No se realizó ninguna acción.');
        }
    }
}
