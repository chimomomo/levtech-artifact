<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'name' => "Apex Legends",
            'comment' => "コメント",
            'release_date' => "2019/2/4",
            'image_name' => "apex.jpg",
            'company_id' => 1,
            'genre_id' => 1,
        ]);
        
        DB::table('games')->insert([
            'name' => "Minecraft",
            'comment' => "コメント",
            'release_date' => "2011/11/18",
            'image_name' => "minecraft.jpg",
            'company_id' => 4,
            'genre_id' => 2,
        ]);
    }
}
