<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = ['Male','Female'];
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        $email = strtolower($first_name).strtolower($last_name).'@gmail.com';
        return [
            'user_id' => User::factory(1)->create(['name'=>$first_name.' '.$last_name,'email'=>$email])->first()->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthdate' => $this->faker->date,
            'gender' => $gender[rand(0,1)],
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'province' => $this->faker->city,
            'city' => $this->faker->city,
            'postalcode' => $this->faker->numberBetween(10000,99999)
        ];
    }
}
