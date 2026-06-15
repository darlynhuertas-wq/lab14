<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create(['name' => 'Kit ESP32 IoT', 'price' => 89.90]);
        Product::create(['name' => 'Sensor DHT22', 'price' => 15.50]);
    }
}