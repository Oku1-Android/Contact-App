<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //declare users as an array

        $users = [];
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            $users[]=[
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => $faker->password,
                //'user_id' => $faker->id
                //'user_id'=>User::pluck('id')->random()
               // User::all()->random()->user_id
            ];
         }
         DB::table('users')->insert($users);
    }
}
