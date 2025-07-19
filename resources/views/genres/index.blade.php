@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Genres</h1>

    <a href="{{ route('genres.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Add New Genre
    </a>

    @if ($genres->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $index => $genre)
                    <tr>
                        <td>{{ $genres->firstItem() + $index }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genres.show', $genre) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-eye"></i> Show
                            </a>
                            <a href="{{ route('genres.edit', $genre) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this genre?')" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $genres->links() }}
        </div>
    @else
        <p class="text-muted">No genres found.</p>
    @endif
</div>
@endsection
