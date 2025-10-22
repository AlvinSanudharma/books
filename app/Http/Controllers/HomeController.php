<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with(['category', 'author'])
                ->withAvg('ratings as ratings_avg_rating', 'rating')
                ->paginate(10);

        return view('home', compact('books'));
    }
}
