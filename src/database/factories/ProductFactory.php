<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'product_category_id' => 1 ,
            'name' => $this->faker->name,
            'description' => $this->faker->name,
            'thumbnail' => $this->faker->imageUrl(),
            'price_estimate' => 1,
            'order' =>1
        ];
    }
}
