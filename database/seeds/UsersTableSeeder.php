<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "サンプル太郎",
            'age' => 18,
            'sex' => "男",
            'comment' => "コメント",
            'email' => "test@gmail.com",
            'email_varified_at' => "",
            'password' => "password",
            'image_name' => "image_name",
            'discord_url' => "https://discord.com",
            'discord_deadline' => "3月10日",
        ]);
        
        DB::table('users')->insert([
            'name' => "サンプル太郎",
            'age' => 18,
            'sex' => "男",
            'comment' => "コメント",
            'email' => "test@gmail.com",
            'email_varified_at' => "",
            'password' => "password",
            'image_name' => "image_name",
            'discord_url' => "https://discord.com",
            'discord_deadline' => "3月10日",
        ]);
    }
}
