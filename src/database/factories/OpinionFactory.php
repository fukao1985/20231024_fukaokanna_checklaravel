<?php

namespace Database\Factories;

use App\Models\Opinion;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpinionFactory extends Factory
{
    /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
    protected $model = Opinion::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contacts_id'=> Contact::factory(),
            'fullname' => $this->faker->name,
            'gender' => $this->faker->randomElement(['1', '2']),
            'email' => $this->faker->safeEmail,
            'opinion' => $this->faker->text(120)
        ];
    }
}
