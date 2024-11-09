<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Kopi<small>Seduh</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}"
                        class="nav-link">Home</a></li>
                <li class="nav-item {{ Request::routeIs('menu') ? 'active' : '' }}"><a href="{{ route('menu') }}"
                        class="nav-link">Menu</a></li>
                <li class="nav-item {{ Request::routeIs('services') ? 'active' : '' }}"><a
                        href="{{ route('services') }}" class="nav-link">Services</a></li>
                <li class="nav-item {{ Request::routeIs('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}"
                        class="nav-link">Blog</a></li>
                <li class="nav-item {{ Request::routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}"
                        class="nav-link">About</a></li>
                <li class="nav-item {{ Request::routeIs('contact') ? 'active' : '' }}"><a
                        href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item cart"><a href="{{ route('show.cart') }}" class="nav-link"><span
                                    class="icon icon-shopping_cart"></span><span
                                    class="bag d-flex justify-content-center align-items-center"><small>{{ App\Models\Cart::where('user_id', auth()->user()->id)->count() }}</small></span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('my.order') }}">My Order</a>
                                <a class="dropdown-item" href="{{ route('my.book') }}">My Book</a>
                                <a class="dropdown-item" href="{{ route('my.review') }}">My Review</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item {{ Request::routeIs('login') ? 'active' : '' }}">
                            <a href="{{ route('login') }}" class="nav-link">
                                Log in
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item {{ Request::routeIs('register') ? 'active' : '' }}">
                                <a href="{{ route('register') }}" class="nav-link">
                                    Register
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
