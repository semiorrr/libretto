@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm mt-5">
            <div class="card-body">
                <h2 class="text-center mb-4">Login</h2>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (Auth::check())
                    <div class="alert alert-info">
                        You are already logged in as <strong>{{ Auth::user()->username }}</strong>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('authenticate') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            value="{{ old('username') }}"
                            required
                            autofocus
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                </form>

                <p class="mt-3 text-center">
                    Don't have an account? <a href="{{ route('register') }}">Register here</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
