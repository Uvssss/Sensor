<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensor')->insert([
            ["id"=>1,'sensor' => "sensor1","location"=>"Valmiera"],
            ["id"=>2,'sensor' => "sensor2","location"=>"Riga"],
            ["id"=>3,'sensor' => "sensor3","location"=>"Limbazi"]
        ]);
    }
}
