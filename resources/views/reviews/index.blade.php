@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Reviews</h1>

    <a href="{{ route('reviews.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Add Review
    </a>

    @if ($reviews->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Book</th>
                    <th>Rating</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $index => $review)
                    <tr>
                        <td>{{ $reviews->firstItem() + $index }}</td>
                        <td>{{ $review->book->title }}</td>
                        <td>⭐ {{ $review->rating }}</td>
                        <td>{{ $review->content }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('reviews.show', $review) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-eye"></i> Show
                            </a>
                            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this review?')" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $reviews->links() }}
        </div>
    @else
        <p class="text-muted">No reviews found.</p>
    @endif
</div>
@endsection
