<?php

namespace Database\Factories;

use App\Models\CompanyDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => ['ru' => 'Golden Pack (ru)', 'en' => 'Golden Pack (en)', 'uz' => 'Golden Pack (uz)'],
            'description' => ['ru' => 'ru-' . $this->faker->sentence, 'en' => 'en-' . $this->faker->sentence, 'uz' => 'uz-' . $this->faker->sentence],
            'image' => 'other/test-content' . $this->faker->numberBetween(1, 5) . '.png',

            'about_title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'about_description' => ['ru' => 'ru-' . $this->faker->sentence, 'en' => 'en-' . $this->faker->sentence, 'uz' => 'uz-' . $this->faker->sentence],
            'about_image' => 'other/test-content' . $this->faker->numberBetween(1, 5) . '.png',

            'address' => $this->faker->address,
            'phone' => [$this->faker->phoneNumber, $this->faker->phoneNumber],
            'email' => [$this->faker->safeEmail, $this->faker->safeEmail],
            'social_media' => [
                0 => ['url' => $this->faker->url, 'name' => $this->faker->word],
                1 => ['url' => $this->faker->url, 'name' => $this->faker->word],
                2 => ['url' => $this->faker->url, 'name' => $this->faker->word],
                3 => ['url' => $this->faker->url, 'name' => $this->faker->word],
            ]
        ];
    }
}
