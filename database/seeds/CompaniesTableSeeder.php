<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => "EA",
        ]);
        
        DB::table('companies')->insert([
            'name' => "Mojang",
        ]);
        
        DB::table('companies')->insert([
            'name' => "任天堂",
        ]);
        
        DB::table('companies')->insert([
            'name' => "スクエアエニックス",
        ]);
    }
}
