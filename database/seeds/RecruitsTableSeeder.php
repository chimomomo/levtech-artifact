<?php

use Illuminate\Database\Seeder;

class RecruitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recruits')->insert([
            'title' => "募集1",
            'body' => "ボディ",
            'image_name' => null,
            'game_id' => 1,
            'user_id' => 1,
        ]);
        
         DB::table('recruits')->insert([
            'title' => "募集2",
            'body' => "ボディ",
            'image_name' => null,
            'game_id' => 2,
            'user_id' => 1,
        ]);
    }
}
