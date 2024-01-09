<!-- resources/views/user_navbar.blade.php -->
<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Home') }}">Homepage</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Profile') }}">Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Mix') }}">Mix</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Review') }}">Review</a>
    </li>
</ul>

<ul class="navbar-nav ms-auto">
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <!-- <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        </li> -->
    @endguest
</ul>
