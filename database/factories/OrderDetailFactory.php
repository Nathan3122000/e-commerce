<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
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
        $title = [
            'GOOD QUALITY',
            'NOT BAD',
            'OKAY',
            'REALLY GOOD',
            'SUSPICIOUS',
            'NICE',
            'NOT BAD',
            'GOOD QUALITY',
            'FAST SHIPPING',
            'AMAZING',
            'LAME AF',
            'FAST SHIPPING',
            'TOO FAST',
            'WHAT',
            'DISAPPOINTED',
            'FAST SHIPPING',
            'AMAZING',
            'GOOD QUALITY',
            'LAME',
            'WHAT',
            'OMG',
            'YO STUFF HAVE A GOOD QUALITY',
            'OMG',
            'WHY?',
            'GOOD',
            'GOOD QUALITY',
            'WELL DONE',
            'OMG',
            'FAST SHIPPING',
            'WHY?',
        ];
        $content = [
            'Really love these stuff, all in good conditions and the quality tho on fire',
            'There a little stitching defects on the back',
            'Good one',
            'No comment',
            'Did I get defects products? cuz I saw stitching defects on pocket of it',
            'Good quality, poor delivery *SAD*',
            'Nice',
            'Very well ',
            'I just got my hoodies within 1 days after I ordered ',
            'Love this materials',
            'Yo guys said my packet will be delivered within 1 days, but I received after 2 days and the worst part my hoodies got mold stains on top of it',
            'No doubt, this hoodies are fire AF',
            'Like it!',
            'Good one',
            'Not worth the price hufftt.. poor materials',
            'Thanks!',
            'Meh, no comment',
            'Lit',
            'TF is wrong with the courier',
            'Ummm… did u guys do QC check first before shipping these hoodies? I saw stitching defects on my 2 out of 7 hoodies',
            'No comment',
            'Lit!!',
            'Looks good on me',
            'Love this, but why its so expensive?',
            'Lafffffffff etttt',
            'Already in love',
            'CRAZYYYY',
            'I LOOK FABULOUS',
            'LETSS GOOO',
            'poor QC, disappointed',
        ];

        return [
            'order_id' => rand(1,Order::count()),
            'product_id' => $product->id,
            'price' => $product->price,
            'qty' => $qty,
            'discount' => 0.2,
            'subtotal' => $product->price * $qty,
            'grandtotal' => ($product->price * $qty) * 0.2,
            'ship_date' => $this->faker->date,
            'title' => $title[rand(0,29)],
            'rating' => rand(1,5),
            'content' => $content[rand(0,29)],
        ];
    }
}
