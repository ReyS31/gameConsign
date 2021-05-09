<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    //     $table->string('Year');
    //     $table->string('imdbID');
    //     $table->string('Type');
    //     $table->string('Poster');
        return [
            'Title' => $this->faker->sentence,
            'Year' => $this->faker->year,
            'imdbID' => $this->faker->unique()->regexify('[A-Z0-9.-]{8}'),
            'Type' => 'Movie',
            'Poster' => $this->faker->imageUrl,
        ];
    }
}
