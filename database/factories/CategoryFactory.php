<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'title' => fake()->text(45),
        //     'color' => fake()->safeHexColor(),
        //     'user_id' => User::all()->random()
        // ];
        
        return [
            'title' => 'Prioridade Baixa',
            'color' => '#FFFF00',
            'user_id' => User::all()->random()
        ];
    }
}
