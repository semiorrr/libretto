@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Book</h1>

    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author:</label>
            <select name="author_id" class="form-select">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Genres:</label>
            <div class="row">
                @foreach ($genres as $genre)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input
                                type="checkbox"
                                name="genres[]"
                                value="{{ $genre->id }}"
                                class="form-check-input"
                                id="genre{{ $genre->id }}"
                                {{ $book->genres->contains($genre->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="genre{{ $genre->id }}">
                                {{ $genre->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update
            </button>

            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
    </form>
</div>
@endsection
