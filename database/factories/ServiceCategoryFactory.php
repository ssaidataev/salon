<?php

// database/factories/ServiceCategoryFactory.php
namespace Database\Factories;

use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceCategoryFactory extends Factory
{
    protected $model = ServiceCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            // Добавьте другие поля, если необходимо
        ];
    }
}
