<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceCategory; // Если используете связь
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'category_id' => ServiceCategory::factory(), // Если связь
            'duration' => $this->faker->numberBetween(15, 120), // Пример: от 15 до 120 минут
            'price' => $this->faker->randomFloat(2, 10, 100), // Изменено на randomFloat
        ];
    }
}
