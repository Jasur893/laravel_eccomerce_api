<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => rand(1,5),
            'name' => [
                'uz' => $this->faker->sentence(3),
                'ru' => 'комплекты спальной мебели',
            ],
            'price' => rand(50000, 10000000),
            'description' => [
                'uz' => $this->faker->paragraph(5),
                'ru' => 'Беспружинные матрасы часто сопоставляются с пружинными, однако в некоторых сценариях использования они даже превосходят другие виды изделий.',
            ]
        ];
    }
}
