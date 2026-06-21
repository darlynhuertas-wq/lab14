<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Desactivar temporalmente la revisión de llaves foráneas
        Schema::disableForeignKeyConstraints();

        // 2. Limpiar la tabla de forma segura
        Product::truncate();

        // 3. Volver a activar la revisión para mantener la seguridad de la BD
        Schema::enableForeignKeyConstraints();

        // 4. Insertar tus 5 productos oficiales
        Product::create(['name' => 'Kit ESP32 IoT', 'price' => 89.90]);
        Product::create(['name' => 'Sensor DHT22', 'price' => 15.50]);
        Product::create(['name' => 'Arduino Uno R3', 'price' => 45.00]);
        Product::create(['name' => 'Módulo Relé 4 Canales', 'price' => 22.50]);
        Product::create(['name' => 'Servomotor SG90', 'price' => 12.00]);
    }
}