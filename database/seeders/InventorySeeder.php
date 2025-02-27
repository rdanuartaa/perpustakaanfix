<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    public function run()
    {
        Inventory::create([
            'book_id' => 1,
            'type' => 'IN',  // Sesuai ENUM('IN', 'OUT')
            'quantity' => 10,
            'date' => now(),
        ]);

        Inventory::create([
            'book_id' => 2,
            'type' => 'OUT',
            'quantity' => 5,
            'date' => now(),
        ]);
    }
}
