<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Measure;
use App\Models\NormalValue;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'birthdate' => '2004-11-29',
            'admin' => 1,
        ]);

        User::factory()->create([
            'name' => 'Test kid User',
            'email' => 'testkid@example.com',
            'password' => '12345678',
            'birthdate' => '2024-10-29',
        ]);

        $measures = array(
                    ["id"=> 1, "description"=> "TSH", "unit"=> "μU/mL"], 
                    ["id"=> 2, "description"=> "HDL", "unit"=> "mg/dl"], 
                    ["id"=> 3, "description"=> "LDL", "unit"=> "mg/dl"],                 
                    );
    
        $normalValues = array(
            ["measure_id"=> 1, "age_from"=> 0, "age_to"=> 12, "min_value"=> 0.4, "max_value"=> 10], 
            ["measure_id"=> 1, "age_from"=> 13, "age_to"=> null,"min_value"=> 0.4, "max_value"=> 4], 
            ["measure_id"=> 2, "age_from"=> 0, "age_to"=> null, "min_value"=> 40, "max_value"=> null], 
            ["measure_id"=> 3, "age_from"=> 0, "age_to"=> null, "min_value"=> null, "max_value"=> 140],                
            );

        Measure::upsert($measures, ['description'], ['id', 'description', 'unit']);
        NormalValue::insert($normalValues, ['measure_id', 'age_from'], ['id', 'description', 'unit']);
    }
}
