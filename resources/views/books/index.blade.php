@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Book List</h2>

    <form method="GET" action="{{ route('index') }}" class="mb-3">
        <div class="row g-3 mb-2">
            <div class="col-md-3">
                <label for="limit" class="form-label">List shown:</label>
                <select name="limit" id="limit" class="form-select">
                    @foreach(range(10, 100, 10) as $val)
                        <option value="{{ $val }}" {{ $limit == $val ? 'selected' : '' }}>{{ $val }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-md-auto">
            <label for="search" class="col-form-label">Search:</label>
            <input type="text" name="search" id="search" value="{{ $search }}" class="form-control" placeholder="Book or Author Name">
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
        <div class="mb-2 mt-2">
                <a href="{{ route('rating.create') }} " class="btn btn-success me-2">Create</a>
                <a href="{{ route('authors.top') }}" class="btn btn-info text-white"> Top 10 Author</a>
        </div>

        
    </form>

    <table class="table table-striped" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $index => $book)
                <tr>
                    <td>{{ ($books->currentPage() - 1) * $books->perPage() + $index + 1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>{{ $book->author->name ?? '-' }}</td>
                    <td>{{ number_format($book->ratings_avg_rating, 2) }}</td>
                    <td>{{ $book->ratings_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4 d-flex justify-content-center">
        {{ $books->appends(['search' => $search, 'limit' => $limit])->links() }}
    </div>
</div>
@endsection
