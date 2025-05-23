@extends('layouts.app')

@section('content')

<div style="background-color: white; padding: 30px; border-radius: 8px; max-width: 500px; margin: 0 auto; text-align: center;">
    <h3>Insert Rating</h3>
    <div style="text-align: left; margin-top: 15px;">
     <a href="{{ route('index') }}">Return</a>
    </div>
    <div style="margin-top: 20px; text-align: left;">
    <form method="GET" action="{{ route('rating.create') }}">
        <label for="author_id">Author:</label>
        <select name="author_id" id="author_id" onchange="this.form.submit()">
            <option value="">-- Select Author --</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ (isset($selectedAuthorId) && $selectedAuthorId == $author->id) ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </form>
    </div>

<div style="margin-top: 20px; text-align: left;">
    <form method="POST" action="{{ route('rating.store') }}">
        @csrf
        <input type="hidden" name="author_id" value="{{ $selectedAuthorId }}">
        
        <label for="book_id">Book:</label>
        <select name="book_id" id="book_id" required>
            <option value="">-- Select Book --</option>
            @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>
        
        <div style="margin-top: 20px; text-align: left;">
            <label for="rating">Rating :</label>
            <select id="rating" name="rating" style="width: 100%; padding: 8px;">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div style="margin-top: 15px; text-align: left">
            <button type="submit">Submit Rating</button>
        </div>
    </form>
</div>
    
</div>
@endsection
