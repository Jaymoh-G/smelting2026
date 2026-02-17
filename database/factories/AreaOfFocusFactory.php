<?php

namespace Database\Factories;

use App\Models\AreaOfFocus;
use Illuminate\Database\Eloquent\Factories\Factory;

class AreaOfFocusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AreaOfFocus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->paragraph($nb_sentences=4),
            'image_url' => $this->faker->imageUrl($width = 640, $height = 480),

        ];
    }
}
