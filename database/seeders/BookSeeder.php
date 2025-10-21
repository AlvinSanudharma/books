<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batchSize = 500;
        $total = 5000;

        for ($i = 0; $i < $total; $i += $batchSize) { 
            $books = Book::factory()->count($batchSize)->make()->toArray();
    
            Book::insert($books);
        }

    }
}
