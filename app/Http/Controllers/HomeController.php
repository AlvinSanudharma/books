<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['category', 'author'])
                ->withAvg('ratings as ratings_avg_rating', 'rating');
        $listShown = (int) $request->input('list_shown', 10);
        
        $books = $query->paginate($listShown)->appends(['list_shown' => $listShown]);

        return view('home', compact('books'));
    }
}
