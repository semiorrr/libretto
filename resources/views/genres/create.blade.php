@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Add Genre</h1>

    <form method="POST" action="{{ route('genres.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Genre Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Save
        </button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </form>
</div>
@endsection
