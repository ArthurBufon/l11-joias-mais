<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'valor' => fake()->numerify("########"),
            'acrescimos' => fake()->numerify("####"),
            'descontos' => fake()->numerify("####"),
            'cliente_id' => 1,
        ];
    }
}
