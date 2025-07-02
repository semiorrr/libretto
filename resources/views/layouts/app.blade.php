<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Libretto</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Libretto
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('books*') ? 'active' : '' }}" href="{{ route('books.index') }}">
                            <i class="bi bi-book"></i> Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('authors*') ? 'active' : '' }}" href="{{ route('authors.index') }}">
                            <i class="bi bi-person"></i> Authors
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('genres*') ? 'active' : '' }}" href="{{ route('genres.index') }}">
                            <i class="bi bi-tags"></i> Genres
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('reviews*') ? 'active' : '' }}" href="{{ route('reviews.index') }}">
                            <i class="bi bi-chat-left-text"></i> Reviews
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">
                            <i class="bi bi-person-plus"></i> Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
