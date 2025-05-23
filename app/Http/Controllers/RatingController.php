<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RatingController extends Controller
{
    public function create(Request $request)
    {
        $authors = Author::all();
        $books = [];

        $selectedAuthorId = $request->input('author_id');

        if ($selectedAuthorId) {
            $books = Book::where('author_id', $selectedAuthorId)->get();
        }
        return view('ratings.create', compact('authors', 'books', 'selectedAuthorId'));
    }
    
   public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        // Ensure the book belongs to the selected author
        $book = Book::where('id', $request->book_id)
                    ->where('author_id', $request->author_id)
                    ->first();

        if (!$book) {
            throw ValidationException::withMessages([
                'book_id' => 'The selected book does not belong to the chosen author.',
            ]);
        }

        // Proceed with storing the rating
        $book->ratings()->create([
            'rating' => $request->rating,
        ]);

        return redirect()->route('index')->with('success', 'Rating submitted successfully.');
    }
}
