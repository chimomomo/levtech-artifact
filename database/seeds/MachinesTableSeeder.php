<?php

use Illuminate\Database\Seeder;

class MachinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('machines')->insert([
            'name' => "PC",
        ]);
        
        DB::table('machines')->insert([
            'name' => "PS5",
        ]);
        
        DB::table('machines')->insert([
            'name' => "PS4",
        ]);
        
        DB::table('machines')->insert([
            'name' => "Xbox",
        ]);
        
        DB::table('machines')->insert([
            'name' => "Switch",
        ]);
        
        DB::table('machines')->insert([
            'name' => "スマホ",
        ]);
    }
}
