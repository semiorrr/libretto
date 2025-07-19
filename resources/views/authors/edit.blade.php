@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Author</h1>

    <form method="POST" action="{{ route('authors.update', $author->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Author Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Update
        </button>

        <a href="{{ route('authors.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </form>
</div>
@endsection
