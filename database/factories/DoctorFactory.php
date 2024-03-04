<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Section;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'appointments' => $this->faker->randomElement(['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$12$FKIOYCS2l8r3iktZ4fcKYehtQjZWXTwkM1Yh7uSocjnoYfeRlYo7W', // password
            'phone' => $this->faker->phoneNumber,
            'price' => $this->faker->randomElement([100,200,300,400,500]),
            'section_id' => Section::all()->random()->id,
        ];
    }
}
