<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => 'img3.png',
            'description' => $this->faker->text(),
            'price' => $this->faker->randomNumber(3),
            'number_of_pages' => $this->faker->randomNumber(2),
        ];
    }
}
