<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use DB;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class companiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //delete all existing records in the table and reset it to 0
         // DB::table('companies')->truncate();

          $companies = [];//declare companies as an array

          $faker = Faker::create();
  
          //specify the range of data to be recorded
          foreach(range(1, 10) as $index)
          {
              $companies[]=[
                  'name' => $faker->company,
                  'address' => $faker->address,
                  'website' => $faker->domainName,
                  'email' => $faker->email,
                  'created_at' => now(),
                  'updated_at' => now()
              ];
          }
  
      DB::table('companies')->insert($companies);
  
    }
}
