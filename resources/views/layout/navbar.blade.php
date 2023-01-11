<section class="navb">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ url('/image/Logo.png') }}" width="45" alt="logo"
                    class="d-inline-block align-middle mr-2" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="/viewall/{{ $category->name }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav right-nav">
                    @if (Auth::check())
                        @if (Auth::user()->role == 'Admin')
                            <div class="icon-button d-flex align-items-center" style="margin: 0 1vw">
                                <li class="nav-item">
                                    <a href="/inbox ">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </li>
                            </div>
                        @else
                            <div class="icon-button d-flex align-items-center" style="margin: 0 1vw">
                                <li class="nav-item">
                                    <a href="/cart">
                                        <i class="fas fa-shopping-bag"></i>
                                    </a>
                                </li>
                            </div>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/history">History</a>
                            </li>
                        @endif
                    @endif

                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</section>
