<x-layouts::app>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="h2 fw-bold mb-1">Student Portal</h1>
                <p class="text-secondary mb-0">Explore courses, manage your enrollments, and track your learning journey.
                </p>
            </div>
        </div>
        <ul class="nav nav-tabs mb-4" id="catalog">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home*') ? 'active' : '' }}" href="{{ route('home') }}">
                    Available Courses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('my-courses*') ? 'active' : '' }}"
                    href="{{ route('my-courses') }}">My Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('my-order*') ? 'active' : '' }}"
                    href="{{ route('my-order') }}">
                    My Order</a>
            </li>

        </ul>
    </div>
    {{ $slot }}
</x-layouts::app>
