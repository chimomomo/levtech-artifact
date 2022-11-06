<?php

use Illuminate\Database\Seeder;

class AmendmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('amendments')->insert([
            'title' => "修正案1",
            'body' => "ボディ",
            'image_name' => null,
            'game_id' => 1,
            'user_id' => 1,
        ]);
        
         DB::table('amendments')->insert([
            'title' => "修正案2",
            'body' => "ボディ",
            'image_name' => null,
            'game_id' => 2,
            'user_id' => 1,
        ]);
    }
}
