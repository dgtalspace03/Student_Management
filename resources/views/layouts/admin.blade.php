<x-layouts::app>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="h2 fw-bold mb-1">Administration</h1>
                <p class="text-secondary mb-0">Manage course, student,techer and member access.</p>
            </div>
       
        </div>


        <div class="row row-cols-2 row-cols-xl-4 g-3 mb-4">
            <div class="col">
                <div class="stat-card">
                    <div class="stat-label">Total Student</div>
                    <div class="stat-number">{{ $total_student }}</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <div class="stat-label">Total Teacher</div>
                    <div class="stat-number">{{total_teacher()}}</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <div class="stat-label">Total Course</div>
                    <div class="stat-number">{{ total_course() }}</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <div class="stat-label">Total Enrollment</div>
                    <div class="stat-number">{{ total_enrollment() }}</div>
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
                <a class="nav-link {{ request()->routeIs('admin-student*') ? 'active' : '' }}" href="{{ route('admin-student') }}">
                    Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin-categories*') ? 'active' : '' }}" href="{{ route('admin-categories') }}">
                     Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin-order*') ? 'active' : '' }}" href="{{ route('admin-order') }}">
                     Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin-enrollment*') ? 'active' : '' }}" href="{{ route('admin-enrollment') }}">
                     Enrollments</a>
            </li>
        </ul>
        {{ $slot }}
    </div>
</x-layouts::app>
