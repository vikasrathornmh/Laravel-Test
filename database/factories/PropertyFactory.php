<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'county' => $this->faker->text,
            'country' => $this->faker->text,
            'town' => $this->faker->text,
            'description' => $this->faker->text,
            'url' => $this->faker->text,
            'displayable_address' => $this->faker->text,
            'image_url' => $this->faker->text,
            'thumbnail_url' => $this->faker->text,
            'latitude' => 784.598,
            'longitude' => 784.598,
            'no_of_bedrooms' => 0,
            'no_of_bathrooms' => 0,
            'price' => 0,
            'property_type' => $this->faker->text,
            'type' => 'Sell',
        ];
    }
}
