<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductCategory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [            
            'category_id' => ProductCategory::inRandomOrder()->first()->id,
            'product_name' => $this->faker->words(5, true),
            'product_description' => $this->faker->paragraphs(6, true),
            'product_image' => null,
            'product_price' => $this->faker->randomNumber(2),
        ];
    }
}
