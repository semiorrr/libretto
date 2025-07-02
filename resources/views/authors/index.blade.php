@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Authors</h1>

    <a href="{{ route('authors.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Add New Author
    </a>

    @if ($authors->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $index => $author)
                    <tr>
                        <td>{{ $authors->firstItem() + $index }}</td>
                        <td>{{ $author->name }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-eye"></i> Show
                            </a>
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this author?')" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $authors->links() }}
        </div>
    @else
        <p class="text-muted">No authors found.</p>
    @endif
</div>
@endsection
