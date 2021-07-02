<?php

namespace Database\Factories;

use App\Models\Cooperation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CooperationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cooperation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'list' => [
                0 => [
                    'ru' => [
                        'title' => '0-ru-' . $this->faker->word,
                        'description' => '0-ru-' . $this->faker->sentence
                    ],
                    'en' => [
                        'title' => '0-en-' . $this->faker->word,
                        'description' => '0-en-' . $this->faker->sentence
                    ],
                    'uz' => [
                        'title' => '0-uz-' . $this->faker->word,
                        'description' => '0-uz-' . $this->faker->sentence
                    ],
                ],
                1 => [
                    'ru' => [
                        'title' => '1-ru-' . $this->faker->word,
                        'description' => '1-ru-' . $this->faker->sentence
                    ],
                    'en' => [
                        'title' => '1-en-' . $this->faker->word,
                        'description' => '1-en-' . $this->faker->sentence
                    ],
                    'uz' => [
                        'title' => '1-uz-' . $this->faker->word,
                        'description' => '1-uz-' . $this->faker->sentence
                    ],
                ]
            ],
            'image' => 'other/test-content' . $this->faker->numberBetween(1, 5) . '.png',
        ];
    }
}
