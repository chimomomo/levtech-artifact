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
            'email_verified_at' => null,
            'password' => "password",
            'image_name' => "/images/noimage.jpg",
            'discord_url' => "https://discord.com",
            'discord_deadline' => "3月10日",
        ]);
        
        DB::table('users')->insert([
            'name' => "サンプル二郎",
            'age' => 16,
            'sex' => "男",
            'comment' => "コメント",
            'email' => "my@gmail.com",
            'email_verified_at' => null,
            'password' => "password",
            'image_name' => "/images/noimage.jpg",
            'discord_url' => "https://discord.com",
            'discord_deadline' => "3月10日",
        ]);
    }
}
