<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::find(rand(1,Product::count()));
        $qty = rand(1,3);
        return [
            'user_id' => rand(1,User::where('role_id',2)->count()),
            'product_id' => $product->id,
            'qty' => $qty,
            'price_item' => $product->price,
            'discount' => 0,
            'subtotal' => $qty * $product->price,
        ];
    }
}
