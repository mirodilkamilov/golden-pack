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
            ],
            'google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.59206105294!2d69.29919361527628!3d41.382946954233645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef325df02670f%3A0xb755e6c0c3e469ab!2sYunusabad-16%2C%20Tashkent%20100180%2C%20Uzbekistan!5e0!3m2!1sen!2s!4v1625331158059!5m2!1sen!2s'
        ];
    }
}
