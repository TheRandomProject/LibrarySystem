<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'author' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber,
            'cover_image' => $this->faker->text(255),
            'published' => $this->faker->date,
            'genre_id' => \App\Models\Genre::factory(),
        ];
    }
}
