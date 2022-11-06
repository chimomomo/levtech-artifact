<?php

use Illuminate\Database\Seeder;

class BugsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('bugs')->insert([
            'title' => "バグ1",
            'body' => "ボディ",
            'image_name' => null,
            'video_name' => null,
            'game_id' => 1,
            'user_id' => 1,
        ]);
        
         DB::table('bugs')->insert([
            'title' => "バグ2",
            'body' => "ボディ",
            'image_name' => null,
            'video_name' => null,
            'game_id' => 2,
            'user_id' => 1,
        ]);
    }
}
