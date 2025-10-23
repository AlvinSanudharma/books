<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $book = Book::where('id', $request->id)->firstOrFail();

            $existingRating = $book->ratings()
                ->where('book_id', $request->id)
                ->first();

            $currentRating = $existingRating?->rating ?? 0;

            $newRatingValue = $currentRating + (int) $request->rating;

            if ($existingRating) {
                $existingRating->update([
                    'rating' => $newRatingValue,
                ]);
            } else {
                $book->ratings()->create([
                    'author_id' => $request->author_id,
                    'book_id' => $request->id,
                    'rating'  => $newRatingValue,
                ]);
            }


            DB::commit();

            return redirect()->route('index')->with('success', 'Success insert rating!');
        } catch (\Throwable $th) {
            return redirect()->route('index')->with('failed', $th->getMessage());


            DB::rollBack();
        }
    }

    public function topAuthor()
    {
        $books = Book::with(['category', 'author'])
                ->withCount(['ratings as ratings_count' => function ($query) {
                    $query->where('rating', '>', 5); 
                }])
                ->orderByDesc('ratings_count')
                ->take(10)
                ->get();

        return view('famous', compact('books'));
    }
}
