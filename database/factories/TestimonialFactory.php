<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'description' => ['ru' => 'ru-' . $this->faker->sentence, 'en' => 'en-' . $this->faker->sentence, 'uz' => 'uz-' . $this->faker->sentence],
            'image' => $this->faker->imageUrl(),
            'position' => $this->faker->numberBetween(1, 10)
        ];
    }
}
