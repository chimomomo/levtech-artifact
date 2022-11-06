<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => "シューティング",
        ]);
        
        DB::table('genres')->insert([
            'name' => "サンドボックス",
        ]);
        
        DB::table('genres')->insert([
            'name' => "アクション",
        ]);
        
        DB::table('genres')->insert([
            'name' => "RPG",
        ]);
        
        DB::table('genres')->insert([
            'name' => "レース",
        ]);
        
        DB::table('genres')->insert([
            'name' => "パズル",
        ]);
    }
}
