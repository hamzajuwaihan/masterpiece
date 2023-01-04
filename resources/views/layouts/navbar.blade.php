<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="m-0">DGital</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
            <a href="/" class="nav-item nav-link">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                <div class="dropdown-menu m-0">
                    <a href="#" class="dropdown-item">University courses</a>
                    <a href="#" class="dropdown-item">School courses</a>
                    <a href="#" class="dropdown-item">Short courses</a>
                </div>
            </div>
            <a href="/about" class="nav-item nav-link">About</a>
            <a href={{ route('contact.index') }} class="nav-item nav-link">Contact</a>
        </div>
        @guest
            {{-- <div class="navbar-nav mx-auto py-0">
        </div> --}}

            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn rounded-pill py-2 px-4 d-none d-lg-block">{{ __('Login') }}</a>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </div>
</nav>
