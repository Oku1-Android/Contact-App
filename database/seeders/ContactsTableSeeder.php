<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Company;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        db::table('contacts')->truncate();

        $contacts = [];

        $faker = Faker::create();

        foreach(range(1, 10) as $index)
          {
              $contacts[]=[
                //   'first_name' => $first_name = "Contacts $index",
                //   'last_name' => "last_name $first_name",
                //   'phone' => "phone $first_name",
                //   'email' => "email $first_name",
                //   'address' => "address $first_name",
                //   'company_id'=>company::pluck('id')->random()

                        'first_name' => $faker->firstName,
                        'last_name' => $faker->lastName,
                        'phone' => $faker->e164PhoneNumber,
                        'email' => $faker->email,
                        'address' => $faker->country,
                        'user_id'=>User::pluck('id')->random(),
                        'company_id'=>Company::pluck('id')->random()

              ];
            }
            DB::table('contacts')->insert($contacts);
    }
}
