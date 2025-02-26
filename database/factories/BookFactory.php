<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'category_id' => Category::factory(), // Buat kategori secara otomatis
            'stock' => $this->faker->numberBetween(1, 50),
        ];
    }
}
