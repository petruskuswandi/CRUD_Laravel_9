<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateString();
        $data = [
            ['id' => 1, 'name' => 'Petrus Kuswandi', 'score' => 100, 'created_at' => $dateNow, 'updated_at' => $dateNow],
            ['id' => 2, 'name' => 'Maryanto', 'score' => 90, 'created_at' => $dateNow, 'updated_at' => $dateNow],
            ['id' => 3, 'name' => 'Budi', 'score' => 80, 'created_at' => $dateNow, 'updated_at' => $dateNow],
        ];

        DB::table('students')->insert($data);
    }
}
