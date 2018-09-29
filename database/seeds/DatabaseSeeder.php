<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        for ($i=0 ; $i < 10 ; $i++ )
        DB::table('rooms')->insert([
            'room_number' => rand(100,130) ,
            'building' => rand(1,30) ,
            'floor' => rand(1,5),
            'wing' => rand(1, 4) ,
            ]);
    }
}
