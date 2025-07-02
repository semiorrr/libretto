@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Genre Details</h1>

    <p><strong>Name:</strong> {{ $genre->name }}</p>

    <hr>

    <h4>Books in "{{ $genre->name }}" Genre</h4>

    @if ($genre->books->count())
        <ul class="list-group">
            @foreach ($genre->books as $book)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{ $book->title }}
                        <br>
                        <small class="text-muted">by {{ $book->author->name }}</small>
                    </div>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-eye"></i> View
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">No books in this genre yet.</p>
    @endif

    <a href="{{ route('genres.index') }}" class="btn btn-secondary mt-3">
        <i class="bi bi-arrow-left"></i> Back to List
    </a>
</div>
@endsection
