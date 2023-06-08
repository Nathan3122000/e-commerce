<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $size = ['S','M','L','XL'];
        $color = ['TURQUOISE','BEIGE','GREEN','BLUE','RED','LIGHT PURPLE','DARK GRAY','GRAY'];
        return [
            'category_id' => rand(1,Category::count()),
            'product_name' => 'Relaxed Fit Hoodie',
            'color' => $color[rand(0,7)],
            'size' => $size[rand(0,3)],
            'price' => $this->faker->numberBetween(20000,1000000),
            'description' => 'ESSENTIALS H&M Essentials. No. 3: The Hoodie. Hoodie in sweatshirt fabric made from a cotton blend. Relaxed fit with a jersey-lined, drawstring hood, a kangaroo pocket, long sleeves and wide ribbing at the cuffs and hem. Soft brushed inside.',
            'stock' => rand(1,100),
            'sold_count' => rand(1,100),
            'weight' => $this->faker->randomFloat(2,1,5),
            'image' => $this->faker->image,
        ];
    }
}
