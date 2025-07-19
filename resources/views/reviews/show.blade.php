@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Review Details</h1>

    <p><strong>Book:</strong> {{ $review->book->title }}</p>
    <p><strong>Rating:</strong> ⭐ {{ $review->rating }}</p>
    <p><strong>Review:</strong> {{ $review->content }}</p>

    <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to List
    </a>
</div>
@endsection
