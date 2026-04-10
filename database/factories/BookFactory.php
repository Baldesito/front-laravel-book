<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {

        return [
            'title' => fake()->sentence(4),
            'isbn' => fake()->isbn13(),
            'description' => fake()->paragraph(3),
            'author' => fake()->name(),
            'publisher' => fake()->company(),
            'publication_year' => fake()->year(),

           'cover_image' => 'https://picsum.photos/seed/' . fake()->uuid() . '/400/600',

            'category_id' => fake()->numberBetween(1, 5),
        ];
    }
}
