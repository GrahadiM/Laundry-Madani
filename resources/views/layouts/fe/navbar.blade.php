    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{ route('fe.index') }}">
            <span>
                {{ \Setting::getSetting()->name_web }}
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('fe.index') }}">Beranda <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('fe.about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item {{ Request::is('service*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('fe.service') }}">Layanan</a>
                </li>
                <li class="nav-item {{ Request::is('testimonial*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('fe.testimonial') }}">Testimonial</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item {{ Request::is('testimonial*') ? 'active' : '' }}">
                            <a class="nav-link btn btn-outline-danger" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    @if (auth()->user()->hasRole('customer'))
                        <li class="nav-item {{ Request::is('history*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('fe.history') }}">Riwayat</a>
                        </li>
                    @endif
                    <li class="nav-item {{ Request::is('testimonial*') ? 'active' : '' }}">
                        <a class="nav-link btn btn-outline-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
                {{-- <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form> --}}
            </ul>
        </div>
    </nav>
