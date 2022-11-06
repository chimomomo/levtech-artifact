<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            GamesTableSeeder::class,
            CompaniesTableSeeder::class,
            GenresTableSeeder::class,
            MachinesTableSeeder::class,
            Game_MachineTableSeeder::class,
            AmendmentsTableSeeder::class,
            BugsTableSeeder::class,
            RecruitsTableSeeder::class,
            PostsTableSeeder::class,
            ReviewsTableSeeder::class,
        ]);
    }
}
