<?php

namespace Database\Factories;

/** @var use Illuminate\Database\Eloquent\Factories\Factory; $factory **/
/** @var use App\Models\Contacts; **/
use App\Models\Company;
use App\Model\Contacts;
use Illuminate\Database\Eloquent\Factories\hasFactory;


class ContacstFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phone,
            'address'=>$this->faker->address,
            'company_id'=>Company::pluck('id')->random()
        ];
    }
}
