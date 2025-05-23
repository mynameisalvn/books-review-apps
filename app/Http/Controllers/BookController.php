<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $limit = $request->input('limit', 10);

        // Sort by highest avg rating first, then by most voters
        $query = Book::with('author', 'category')
            ->withCount('ratings')
            ->withAvg('ratings', 'rating');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%'.$search. '%')
                  ->orWhereHas('author', fn($q) => $q->where('name', 'like', '%'. $search .'%'));
            });
        } 
            
        
        // Apply default sorting if no search
        // Apply logic where if average rating is 10.00 will be treat as 1 (lowest)
        $query
        ->orderByRaw("CASE WHEN ratings_avg_rating = 10 THEN 1 ELSE ratings_avg_rating END DESC")
        ->orderByDesc('ratings_count');
    

        $books = $query->paginate($limit)->appends(['search' => $search, 'limit' => $limit]);

        return view('books.index', compact('books', 'limit', 'search'));
    }
}
