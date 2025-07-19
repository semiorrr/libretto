@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Add Review</h1>

    <form method="POST" action="{{ route('reviews.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Book:</label>
            <select name="book_id" class="form-select" required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating (1–5):</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Review:</label>
            <textarea name="content" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Save
        </button>

        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </form>
</div>
@endsection
