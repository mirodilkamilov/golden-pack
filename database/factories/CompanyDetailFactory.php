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
            'image' => $this->faker->imageUrl(),

            'about_title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'about_description' => ['ru' => 'ru-' . $this->faker->sentence, 'en' => 'en-' . $this->faker->sentence, 'uz' => 'uz-' . $this->faker->sentence],
            'about_image' => $this->faker->imageUrl(),

            'address' => $this->faker->address,
            'phone' => [$this->faker->phoneNumber, $this->faker->phoneNumber],
            'email' => [$this->faker->safeEmail, $this->faker->safeEmail],
            'social_media' => [$this->faker->url, $this->faker->url]
        ];
    }
}
