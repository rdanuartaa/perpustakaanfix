<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Officer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat kategori dahulu agar book bisa punya category_id
        Category::factory(5)->create();

        // Buat 10 buku dengan kategori yang telah dibuat
        $books = Book::factory(10)->create();

        // Pastikan ada data buku sebelum membuat inventory
        if ($books->count() > 0) {
            $books->each(function ($book) {
                Inventory::factory(3)->create([
                    'book_id' => $book->id, // Pastikan book_id valid
                ]);
            });
        }

        // Buat 3 petugas perpustakaan
        Officer::factory(3)->create();

        // Buat 10 pengguna perpustakaan
        User::factory(10)->create();
    }
}
