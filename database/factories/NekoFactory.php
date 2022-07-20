<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
// use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Neko>
 */
class NekoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'tags' => json_encode($this->faker->words($nb = 3, $asText = false)),
            'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'), //Date of birth　SELECT TIMESTAMPDIFF(YEAR, '1993-10-01' ,NOW()) AS age_in_whole_years
            'desc' => $this->faker->sentence(),
            'img' => $this->faker->imageUrl(500, 300, 'cats'),
            // 'img' => $this->faker->image('public/img/faker',400,300, null, false),
            // 'img' => $this->faker->image($dir = 'public/img', $width = 400, $height = 300, 'cats'),
            'palate' => $this->faker->colorName(),
            'vaccines' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'location' => $this->faker->address(),
            'breed' => $this->faker->userAgent(), //Predefined autocomplete dropdown?           
            'purrsound' => $this->faker->file($sourceDir = 'public/misc/audio/', $targetDirectory = 'public/misc/audio/randomized'),
        ];
    }
}
