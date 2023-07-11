<?php

namespace Database\Factories;

use Faker\Generator as Faker;

use App\Models\Company;

Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     //protected $model = Company::class;


    public function definition()
    {
        return [
            $model = Company::class(),
            'name'=>$this->faker->name,
            'address'=>$this->faker->address,
            'website'=>$this->faker->website,
            'email'=>$this->faker->email,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
