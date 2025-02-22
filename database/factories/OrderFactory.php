<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->sentence(6),
            'user_id'=>User::all()->random()->id,
            'estado'=>fake()->randomElement(['Procesado', 'Pendiente']),
            'cantidad'=>fake()->randomFloat(2),
        ];
    }
}
