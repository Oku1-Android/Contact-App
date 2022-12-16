<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factories\Factory; $factory**/
use App\Models\Contacts;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\hasFactory;

use Faker\Generator as Faker;

//class ContactFactory extends Factory
$factory->define(Contacts::class,function(Fake $faker)
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   // public function definition()
    //{
        return [
            //
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phnoneNumber,
            'address'=>$this->faker->address,
            'company_id'=>Company::pluck('id')->random()
        ]; 
    });
//}
