<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColaboradoresSeeder extends Seeder
{
    public function run()
    {
        $colaboradores = [
            ['nombre' => 'Juan Pérez', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Especialista en marketing digital.', 'position' => 'Gerente'],
            ['nombre' => 'María López', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Diseñadora gráfica con experiencia en branding.', 'position' => 'Gerente'],
            ['nombre' => 'Carlos García', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Desarrollador web full-stack.', 'position' => 'Gerente'],

            ['nombre' => 'Ana Rodríguez', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Especialista en SEO y estrategias digitales.', 'position' => 'Supervisor'],
            ['nombre' => 'Pedro Sánchez', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Consultor en transformación digital.', 'position' => 'Supervisor'],
            ['nombre' => 'Laura Fernández', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Community Manager con experiencia en redes sociales.', 'position' => 'Supervisor'],

            ['nombre' => 'José Martínez', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Experto en ciberseguridad y protección de datos.', 'position' => 'Asistente'],
            ['nombre' => 'Gabriela Gómez', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Gerente de ventas con más de 10 años de experiencia.', 'position' => 'Asistente'],
            ['nombre' => 'Ricardo Torres', 'picture' => 'https://w7.pngwing.com/pngs/993/650/png-transparent-user-profile-computer-icons-others-miscellaneous-black-profile-avatar-thumbnail.png', 'descripcion' => 'Líder de proyectos con experiencia en metodologías ágiles.', 'position' => 'Asistente'],
        ];

        DB::table('colaboradores')->insert($colaboradores);
    }
}
