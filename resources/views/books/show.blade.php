@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p><strong>Author:</strong> {{ $book->author->name }}</p>

    <p><strong>Genres:</strong>
        @foreach ($book->genres as $genre)
            {{ $genre->name }}{{ !$loop->last ? ',' : '' }}
        @endforeach
    </p>

    <p><strong>Reviews:</strong></p>
    <ul>
        @forelse ($book->reviews as $review)
            <li>
            ⭐ {{ $review->rating }} – {{ $review->content }}
            </li>
        @empty
            <li>No reviews yet.</li>
        @endforelse
    </ul>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
@endsection
