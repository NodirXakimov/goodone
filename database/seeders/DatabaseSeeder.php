<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(100)->create();

        DB::table('products')->insert([
            ['product_code' => 'AA001', 'name' => "Ko'ylak", 'created_at' => now(), 'updated_at' => now()],
            ['product_code' => 'AA002', 'name' => "Shim", 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('materials')->insert([
            ['name' => 'Mato', 'unit' => 'm^2', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ip', 'unit' => 'm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tugma', 'unit' => 'dona', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Zamok', 'unit' => 'dona', 'created_at' => now(), 'updated_at' => now()]
        ]);

        DB::table('warehouses')->insert([
            ['material_id' => '1', 'remainder' => '12', 'price' => '1500', 'created_at' => now(), 'updated_at' => now()],
            ['material_id' => '1', 'remainder' => '200', 'price' => '1600', 'created_at' => now(), 'updated_at' => now()],
            ['material_id' => '2', 'remainder' => '40', 'price' => '500', 'created_at' => now(), 'updated_at' => now()],
            ['material_id' => '2', 'remainder' => '300', 'price' => '550', 'created_at' => now(), 'updated_at' => now()],
            ['material_id' => '3', 'remainder' => '500', 'price' => '300', 'created_at' => now(), 'updated_at' => now()],
            ['material_id' => '4', 'remainder' => '1000', 'price' => '2000', 'created_at' => now(), 'updated_at' => now()]
        ]);

        DB::table('product_materials')->insert([
            ['product_id' => '1', 'material_id' => '1', 'quantity' => '0.8', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => '1', 'material_id' => '3', 'quantity' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => '1', 'material_id' => '2', 'quantity' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => '2', 'material_id' => '1', 'quantity' => '1.4', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => '2', 'material_id' => '2', 'quantity' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => '2', 'material_id' => '4', 'quantity' => '1', 'created_at' => now(), 'updated_at' => now()]
        ]);

    }
}
