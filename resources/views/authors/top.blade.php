@extends('layouts.app')

@section('content')
<div style="text-align: center; margin-top: 40px;">
    <h2><strong>Top 10 Most Famous Author</strong></h2>

    <a href="{{ route('index') }}" class="btn btn-primary">Home</a>

    <table border="1" style="margin: 20px auto; border-collapse: collapse; width: 50%;">
        <thead>
            <tr style="background-color: #f9f9f9;">
                <th style="padding: 8px;">No</th>
                <th style="padding: 8px;">Author Name</th>
                <th style="padding: 8px;">Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $index => $author)
                <tr>
                    <td style="text-align: center; padding: 8px;">{{ $index + 1 }}</td>
                    <td style="padding: 8px;">{{ $author->name }}</td>
                    <td style="text-align: right; padding: 8px;">{{ number_format($author->rating_count) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
