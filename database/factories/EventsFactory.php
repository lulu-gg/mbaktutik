<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Events;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventsFactory extends Factory
{
    protected $model = Events::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_category_id' => 1,
        'name' => $this->faker->word,
        'description' => $this->faker->paragraph,
        'location' => $this->faker->address,
        'banner' => $this->faker->imageUrl($width = 1000, $height = 400),
        'thumbnail' => $this->faker->imageUrl($width = 640, $height = 480),
        'event_organizer_id' => 1,
        'status' => 1,
        'start_date' => $this->faker->dateTime('2024-05-20 08:37:17'),
        'end_date' => $this->faker->dateTime('2024-05-31 08:37:17'),
        'tnc' => $this->faker->word,
        'seo' => $this->faker->word,
        'seo_description' => $this->faker->paragraph,
        'province' => $this->faker->state,
        'city' => $this->faker->city,
        'zip' => $this->faker->postcode,
        'latitude' => $this->faker->latitude($min = -90, $max = 90),
        'longitude' => $this->faker->longitude($min = -90, $max = 90),
        ];
    }
}
