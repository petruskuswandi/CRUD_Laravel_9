<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 5; $i++) {
            DB::table('students')->insert ([
                'name' => $faker->name,
                'score' => $faker->numberBetween(60,100),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }

        for ($i=1; $i <= 10; $i++) {
            DB::table('fruits')->insert([
                'name' => $faker->name,
                'price' => $faker->numberBetween(10000, 100000),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }

    }
}
