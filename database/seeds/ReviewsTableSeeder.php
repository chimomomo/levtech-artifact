<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'title' => "レビュー1",
            'body' => "ボディ",
            'stars' => 4, 
            'game_id' => 1,
            'machine_id' => 1,
            'user_id' => 1,
        ]);
        
         DB::table('reviews')->insert([
            'title' => "レビュー2",
            'body' => "ボディ",
            'stars' => 5, 
            'game_id' => 2,
            'machine_id' => 2,
            'user_id' => 1,
        ]);
    }
}
