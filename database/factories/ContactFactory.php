<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'gender' => $this->faker->numberBetween(1,2),
            'postcode' => $this->faker->postcode,
            'address' => $this->faker->address,
            'opinion' => $this->faker->realText(50)
        ];
    }
}
