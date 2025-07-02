@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Add New Book</h1>

        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="author_id" class="form-label">Author:</label>
                <select name="author_id" id="author_id" class="form-select" required>
                    <option value="">-- Select Author --</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Genres:</label>
                <div class="row">
                    @foreach ($genres as $genre)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="form-check-input" id="genre{{ $genre->id }}">
                                <label class="form-check-label" for="genre{{ $genre->id }}">
                                    {{ $genre->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Save
            </button>

            {{-- Back to List --}}
            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </form>
    </div>
@endsection
