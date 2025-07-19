@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Books</h1>

    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Add New Book
    </a>

    @if ($books->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genres</th>
                    <th>Reviews</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $index => $book)
                    <tr>
                        <td>{{ $books->firstItem() + $index }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>
                            @if ($book->genres->count())
                                @foreach ($book->genres as $genre)
                                    <span class="badge bg-info text-dark">{{ $genre->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">No genres</span>
                            @endif
                        </td>
                        <td>
                            @if ($book->reviews->count())
                                <ul class="mb-0 ps-3">
                                    @foreach ($book->reviews as $review)
                                        <li>⭐ {{ $review->rating }} – {{ $review->content }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">No reviews</span>
                            @endif
                        </td>
                        <td class="text-nowrap">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-eye"></i> Show
                            </a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this book?')" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $books->links() }}
        </div>
    @else
        <p class="text-muted">No books found.</p>
    @endif
</div>
@endsection
