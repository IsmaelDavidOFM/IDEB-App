<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseInfo;

class CourseInfoSeeder extends Seeder
{
    public function run(): void {
        CourseInfo::factory(15)->create(); // Crea 15 registros falsos
    }
}
