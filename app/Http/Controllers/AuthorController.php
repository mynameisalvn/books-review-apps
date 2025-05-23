<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function top()
    {
        $authors = Author::select('authors.id', 'authors.name')
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->join('ratings', 'books.id', '=', 'ratings.book_id')

            // Only with rating greater than 5 in the list
            ->where('ratings.rating','>',5)
            ->groupBy('authors.id', 'authors.name')
            ->selectRaw('COUNT(ratings.id) as rating_count, AVG(ratings.rating) as avg_rating')
            ->orderByDesc('rating_count')
            ->limit(10)
            ->get();

        return view('authors.top', compact('authors'));
    }
}
