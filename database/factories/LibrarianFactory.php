<?php

namespace Database\Factories;

use App\Models\Librarian;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibrarianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Librarian::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->text(255),
            'passwrord' => $this->faker->text(255),
            'email' => $this->faker->email,
        ];
    }
}
