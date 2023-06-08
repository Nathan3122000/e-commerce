<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            ShipmentSeeder::class,
            PaymentMethodSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role_id' => 1
        ]);

        Customer::factory(10)->create();
        Product::factory(10)->create();
        Cart::factory(20)->create();
        Order::factory(10)->create();
        OrderDetail::factory(30)->create();
    }
}
