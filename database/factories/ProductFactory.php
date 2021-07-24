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
            "invoice_id" => 0,
            "name" => $this->faker->name,
            "quantity" => $this->faker->numberBetween(1, 20),
            "price" => $this->faker->numberBetween(3000, 9000),
        ];
    }
}
