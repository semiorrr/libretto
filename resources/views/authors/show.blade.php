@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Author Details</h1>

    <p><strong>Name:</strong> {{ $author->name }}</p>

    <hr>

    <h4>Books by {{ $author->name }}</h4>

    @if ($author->books->count())
        <ul class="list-group">
            @foreach ($author->books as $book)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $book->title }}
                    <a href="{{ route('books.show', $book) }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-eye"></i> View
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">This author has no books yet.</p>
    @endif

    <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">
        <i class="bi bi-arrow-left"></i> Back to List
    </a>
</div>
@endsection
