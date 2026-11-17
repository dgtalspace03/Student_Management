{{-- resources/views/components/app/footer.blade.php --}}
<footer class="bg-white border-top mt-5 py-4">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">

        <span class="text-muted small">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </span>

        <nav class="d-flex gap-3 small">
            <a href="{{ url('/') }}" class="text-muted text-decoration-none">Home</a>
            <a href="{{ url('/courses') }}" class="text-muted text-decoration-none">Courses</a>
            <a href="{{ url('/about') }}" class="text-muted text-decoration-none">About</a>
            <a href="{{ url('/contact') }}" class="text-muted text-decoration-none">Contact</a>
        </nav>

    </div>
</footer>