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
                'ru' => [
                    'title' => 'ru-' . $this->faker->word,
                    'description' => 'ru-' . $this->faker->sentence
                ],
                'en' => [
                    'title' => 'en-' . $this->faker->word,
                    'description' => 'en-' . $this->faker->sentence
                ],
                'uz' => [
                    'title' => 'uz-' . $this->faker->word,
                    'description' => 'uz-' . $this->faker->sentence
                ],
            ],
            'image' => $this->faker->imageUrl()
        ];
    }
}
