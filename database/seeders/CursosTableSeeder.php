<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;
class CursosTableSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            ['course_code' => 'ID-A00', 'course_name' => 'Lectura de diagramas eléctricos (9 hrs)'],
            ['course_code' => 'ID-A00', 'course_name' => 'Lectura de diagramas eléctricos (8 hrs)'],
            ['course_code' => 'ID-A05', 'course_name' => 'Elaboración de diagrama unifilar'],
            ['course_code' => 'ID-A10', 'course_name' => 'Ensamble de tableros eléctricos'],
            ['course_code' => 'ID-B00', 'course_name' => 'Programación de PLC Básico'],
            ['course_code' => 'ID-B01', 'course_name' => 'Programación de PLC Intermedio'],
            ['course_code' => 'ID-B02', 'course_name' => 'Programación de PLC Avanzado'],
            ['course_code' => 'ID-B03', 'course_name' => 'Programación de PLC Profesional'],
            ['course_code' => 'ID-C00', 'course_name' => 'PLC Básico'],
            ['course_code' => 'ID-C01', 'course_name' => 'PLC Intermedio'],
            ['course_code' => 'ID-C02', 'course_name' => 'PLC Avanzado'],
            ['course_code' => 'ID-C03', 'course_name' => 'PLC Profesional'],
            ['course_code' => 'ID-C04', 'course_name' => 'Soporte tecnico para PLC'],
            ['course_code' => 'ID-D00', 'course_name' => 'Configuración de PLC AllenB'],
            ['course_code' => 'ID-D01', 'course_name' => 'Configuración de Panel View'],
            ['course_code' => 'ID-D02', 'course_name' => 'Configuración de PLC SIE-S7 1200/300 NIVEL BÁSICO (CONFIGURACIÓN PLC SIE-S7 1200)'],
            ['course_code' => 'ID-D03', 'course_name' => 'Configuración PLC SIE S7-1200/300 Nivel Intermedio (Comunicación y configuración de PLC Siemens)'],
            ['course_code' => 'ID-D04', 'course_name' => 'Configuración PLC SIE S7-1200/300 Nivel BÁSICO HÍBRIDO'],
            ['course_code' => 'ID-D10', 'course_name' => 'Metodología de Diseño de diagramas eléctricos'],
            ['course_code' => 'ID-D15', 'course_name' => 'Autocad Básico para diagramas eléctricos'],
            ['course_code' => 'ID-D20', 'course_name' => 'Bases en E-PLAN para diagramas eléctricos'],
            ['course_code' => 'ID-E00', 'course_name' => 'Electricidad básica'],
            ['course_code' => 'ID-E05', 'course_name' => 'Electricidad Industrial Básica'],
            ['course_code' => 'ID-E10', 'course_name' => 'Principio de electrónica (ELECTRONICA DIGITAL BÁSICA)'],
            ['course_code' => 'ID-S00', 'course_name' => 'NOM-029-STPS-2011 CONDICIONES DE SEGURIDAD ELÉCTRICAS'],
            ['course_code' => 'ID-S01', 'course_name' => 'NOM-009-STPS-2011 Trabajo en alturas (parte 1) condiciones de seguridad para realizar trabajos en alturas'],
            ['course_code' => 'ID-S02', 'course_name' => 'Seguridad Industrial'],
            ['course_code' => 'ID-T01', 'course_name' => 'Diagnostico de fallas en tableros eléctricos (nivel 1)'],
            ['course_code' => 'ID-T02', 'course_name' => 'Diagnostico de fallas en tableros eléctricos (nivel 2)'],
            ['course_code' => 'ID-T03', 'course_name' => 'Diagnostico de fallas en tableros y componentes eléctricos (nivel 3)'],
            ['course_code' => 'ID-T10', 'course_name' => 'Control eléctrico 1'],
            ['course_code' => 'ID-T11', 'course_name' => 'Control eléctrico 2'],
            ['course_code' => 'ID-U00', 'course_name' => 'Configuración de variadores de frecuencia'],
            ['course_code' => 'ID-U01', 'course_name' => 'Configuración de controladores de Steppers'],
            ['course_code' => 'ID-U02', 'course_name' => 'Configuración de controladores de servos'],
            ['course_code' => 'ID', 'course_name' => 'Introducción al desarrollo y diagnóstico de circuitos eléctricos y electrónicos'],
            ['course_code' => 'ID-Z01', 'course_name' => 'Aspectos didácticos a valorar para el desarrollo e implementación de un curso'],
            ['course_code' => 'ID-Z00', 'course_name' => 'Formación de instructores'],
        ];

        DB::table('cursos')->insert($courses);
    }
}
