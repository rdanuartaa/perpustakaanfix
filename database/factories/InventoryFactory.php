<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    protected $model = Inventory::class;

    public function definition()
    {
        return [
            'book_id' => Book::factory(), // Buat buku secara otomatis
            'type' => $this->faker->randomElement(['IN', 'OUT']),
            'quantity' => $this->faker->numberBetween(1, 20),
            'date' => $this->faker->dateTimeThisYear(),
        ];
    }
}

