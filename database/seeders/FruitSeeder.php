<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FruitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        $data = [
            ['id' => 24, 'name' => 'Mangga', 'price' => 10000, 'created_at' => $dateNow, 'updated_at' => $dateNow],
            ['id' => 25, 'name' => 'Jeruk', 'price' => 15000, 'created_at' => $dateNow, 'updated_at' => $dateNow],
            ['id' => 26, 'name' => 'Pisang', 'price' => 5000, 'created_at' => $dateNow, 'updated_at' => $dateNow],
        ];

        DB::table('fruits')->insert($data);
    }
}
