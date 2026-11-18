<x-layouts::app>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="h2 fw-bold mb-1">Library administration</h1>
                <p class="text-secondary mb-0">Manage books, loans, and member access.</p>
            </div>
            <div class="d-flex align-items-center gap-2">

                <a class="btn btn-outline-secondary btn-sm" href="{{ url('/') }}">↗ Public library</a>
            </div>
        </div>


        <div class="row row-cols-2 row-cols-xl-4 g-3 mb-4">
            <div class="col">
                <div class="stat-card">
                    <div class="stat-label">Total copies</div>
                    <div class="stat-number">100</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <div class="stat-label">Currently borrowed</div>
                    <div class="stat-number">25</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <div class="stat-label">Total Borrowed</div>
                    <div class="stat-number text-danger">532</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <div class="stat-label">Registered users</div>
                    <div class="stat-number">5</div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs mb-4" id="catalog">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin-course*') ? 'active' : '' }}"
                    href="{{ route('admin-course') }}">
                    Courses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin-teacher*') ? 'active' : '' }}"
                    href="{{ route('admin-teacher') }}">Teacher</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}" href="/">♙ Members
                    &amp; roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin-categories*') ? 'active' : '' }}" href="{{ route('admin-categories') }}">
                     Categories</a>
            </li>
        </ul>
        {{ $slot }}
    </div>





</x-layouts::app>
