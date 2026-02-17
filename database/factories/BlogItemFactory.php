<?php

namespace Database\Factories;

use App\Models\BlogItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'teaser' => $this->faker->text(),
            'content' => $this->faker->paragraph(),
            'date_published' => $this->faker->dateTime($max = 'now', $timezone = null),
            // 'date_published' => now(),
            'image_url' => $this->faker->imageUrl($width = 640, $height = 480),

        ];


    }
}
