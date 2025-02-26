<?php

namespace Database\Factories;

use App\Models\Officer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficerFactory extends Factory
{
    protected $model = Officer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'role' => $this->faker->randomElement(['admin', 'staff']),
        ];
    }
}
