<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AulaBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">Articoli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('careers') }}">Lavora con noi</a>
                </li>
                <li class="nav-item ms-5">
                    <form class="d-flex" method="GET" action="{{ route('article.search') }}">
                        <input class="form-control me-2" type="search" name="query" placeholder="Scrivi qui..."
                            aria-label="Search">
                        <button class="btn btn-outline-info" type="submit">Cerca</button>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown me-5">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu me-5">
                            @if (Auth::user()->is_admin)
                                <li class="dropdown-item ">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                </li>
                            @endif

                            @if (Auth::user()->is_revisor)
                                <li class="dropdown-item ">
                                    <a class="nav-link" href="{{ route('revisor.dashboard') }}">Revisor Dashboard</a>
                                </li>
                            @endif
                            @if (Auth::user()->is_writer)
                                <li class="dropdown-item ">
                                    <a class="nav-link" href="{{ route('articles.auth') }}">Writer Dashboard</a>
                                </li>

                                <li class="dropdown-item">
                                    <a class="nav-link" href="{{ route('articles.create') }}">Crea Articolo</a>
                                </li>
                            @endif
                            <li class="dropdown-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn  ">Logout</button>
                                </form>
                            </li>
                    </li>
                </ul>
                </li>
            @endguest
            </ul>



        </div>

    </div>
</nav>
