<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => "投稿1",
            'body' => "ボディ",
            'image_name' => null,
            'video_name' => null,
            'game_id' => 1,
            'user_id' => 1,
        ]);
        
         DB::table('posts')->insert([
            'title' => "投稿2",
            'body' => "ボディ",
            'image_name' => null,
            'video_name' => null,
            'game_id' => 2,
            'user_id' => 1,
        ]);
    }
}
