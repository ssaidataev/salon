<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'service_id' => Service::factory(),
            'booking_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'customer_name' => $this->faker->name,
            'customer_phone' => $this->faker->phoneNumber,
            'price' => $this->faker->randomFloat(2, 10, 100), // Изменено на randomFloat
        ];
    }
}
