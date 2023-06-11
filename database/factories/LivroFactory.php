<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = fake()->unique()->sentence();
        return [
            'titulo' => $titulo,
            'descricao' => fake()->paragraph(),
            'autor' => fake()->name(),
            'slug' => Str::slug($titulo),
            'imagem' => fake()->imageUrl(625,1000),
            'id_categoria' => Categoria::pluck('id')->random(),

        ];
    }
}
