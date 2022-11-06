<?php

use Illuminate\Database\Seeder;

class Game_MachineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_machine')->insert([
            'game_id' => 1,
            'machine_id' => 1,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 1,
            'machine_id' => 2,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 1,
            'machine_id' => 3,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 1,
            'machine_id' => 4,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 1,
            'machine_id' => 5,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 1,
            'machine_id' => 6,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 2,
            'machine_id' => 1,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 2,
            'machine_id' => 2,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 2,
            'machine_id' => 3,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 2,
            'machine_id' => 4,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 2,
            'machine_id' => 5,
            
        ]);
        
        DB::table('game_machine')->insert([
            'game_id' => 2,
            'machine_id' => 6,
            
        ]);
        
    }
}
