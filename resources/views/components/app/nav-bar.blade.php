<nav class="navbar navbar-expand-sm bg-white border-bottom">
    <div class="container-xl">

        {{-- Logo --}}
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-mark style="height: 36px; width: auto;" />
        </a>

        {{-- Hamburger --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNav" aria-controls="mainNav"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">

            {{-- Navigation Links --}}
            <ul class="navbar-nav me-auto mb-2 mb-sm-0 ms-sm-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}"
                       href="{{ route('dashboard') }}"
                       @if(request()->routeIs('dashboard')) aria-current="page" @endif>
                        {{ __('Dashboard') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav align-items-sm-center">

              
                @guest
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <a href="/login" class="btn btn-primary">Login</a>
                        <a href="/register" class="btn btn-secondary">Register</a>
                    </div>
                @endguest
                {{-- Settings Dropdown --}}
               @auth
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="rounded-circle object-fit-cover me-2"
                                 style="width: 32px; height: 32px;"
                                 src="{{ Auth::user()->profile_photo_url }}"
                                 alt="{{ Auth::user()->name }}">
                            <span class="d-sm-none">{{ Auth::user()->name }}</span>
                        @else
                            {{ Auth::user()->name }}
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <div class="px-3 py-1">
                                <div class="fw-semibold">{{ Auth::user()->name }}</div>
                                <div class="small text-secondary">{{ Auth::user()->email }}</div>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>

                        <li><h6 class="dropdown-header">{{ __('Manage Account') }}</h6></li>

                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profile.show') ? 'active' : '' }}"
                               href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('api-tokens.index') ? 'active' : '' }}"
                                   href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </a>
                            </li>
                        @endif

                        <li><hr class="dropdown-divider"></li>

                        {{-- Logout --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
               @endauth
            </ul>
            <x-lang-btn />
        </div>
    </div>
</nav>