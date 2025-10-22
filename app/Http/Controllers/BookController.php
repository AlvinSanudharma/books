<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['category', 'author'])
                ->withAvg('ratings as ratings_avg_rating', 'rating');
        $listShown = (int) $request->input('list_shown', 10);
        
        $search = $request->search;

        if ($search) {
            $query->whereHas('author', function($builder) use($search) {
                $builder->where('name', 'like', '%' . $search . '%');
            });
        }

        $books = $query->paginate($listShown)
                    ->appends([
                        'list_shown' => $listShown,
                        'search' => $search
                    ]);

        return view('home', compact('books'));
    }

    public function create(Book $book)
    {
        return view('add-rating', compact('book'));
    }
}
