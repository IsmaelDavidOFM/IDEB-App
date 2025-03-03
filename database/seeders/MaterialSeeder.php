<?php

namespace Database\Seeders;
use App\Models\Material;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        Material::create([
            'title' => 'Libro de Programación',
            'author' => 'Juan Pérez',
            'year' => '2023',
            'file_path' => 'storage/pdfs/programacion.pdf',
            'image_path' => 'storage/images/programacion.jpg'
        ]);

        Material::create([
            'title' => 'Manual de Laravel',
            'author' => 'María López',
            'year' => '2024',
            'file_path' => 'storage/pdfs/laravel_manual.pdf',
            'image_path' => 'storage/images/laravel.jpg'
        ]);
    }
}
