<x-layouts::app>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card suspended-card shadow-sm">
            <div class="card-body p-4 p-md-5 text-center">

                <div class="icon-circle" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM2.5 8a5.5 5.5 0 0 1 8.9-4.3L3.7 11.4A5.48 5.48 0 0 1 2.5 8zm2.1 4.3 7.7-7.7A5.5 5.5 0 0 1 4.6 12.3z"/>
                    </svg>
                </div>

                <h1 class="h3 mb-2">Your account has been suspended</h1>
                <p class="text-muted mb-4">
                    Hi {{ auth()->user()->name ?? 'there' }}, you can't access your courses or dashboard
                    right now because your account is currently deactivated.
                </p>

                <div class="alert alert-light border text-start small mb-4" role="alert">
                    <div class="fw-semibold mb-1">Why did this happen?</div>
                    Accounts can be suspended for a policy violation, an unpaid fee,
                    or an administrative review. If you think this is a mistake,
                    contact the administrator and we'll look into it.
                </div>

                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="mailto:{{ config('mail.from.address', 'admin@example.com') }}?subject={{ rawurlencode('Account suspension - ' . (auth()->user()->email ?? '')) }}"
                       class="btn btn-primary px-4">
                        Contact admin
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="d-grid">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary px-4">Log out</button>
                    </form>
                </div>
            </div>
        </div>

        <p class="text-center text-muted small mt-3 mb-0">
            Signed in as {{ auth()->user()->email ?? '' }}
        </p>
    </div>
</div>
</body>
</x-layouts::app>