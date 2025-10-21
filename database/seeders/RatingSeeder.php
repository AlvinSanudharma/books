<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batchSize = 1000; 
        $total = 10000; 
        
        for ($i = 0; $i < $total / $batchSize; $i++) {
            Rating::factory()->count($batchSize)->create();
        }
    }
}
