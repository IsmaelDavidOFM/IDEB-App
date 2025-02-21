<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseInfo>
 */
class CourseInfoFactory extends Factory
{
    public function definition(): array {
        return [
            'category' => $this->faker->randomElement([
                'Flayers y anuncios',
                'Promociones',
                'Fechas de inscripcion'
            ]),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'image' => 'https://via.placeholder.com/150'
        ];
    }
}
