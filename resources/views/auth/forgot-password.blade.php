<x-guest-layout>
   

    @session('status')
        <div class="mb-4 fw-semibold text-sm text-green-600">{{ $value }}</div>
    @endsession

    <main class="px-3 py-5 d-flex align-items-center justify-content-center w-100">
        <form class="p-4 p-md-5 w-100" style="max-width: 480px;" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4 h1 text-xl-start fw-bold">Student Manager</div>

            <h1 class="h2 fw-bold">{{ __('Forgot password?') }}</h1>
            <p class="text-secondary mb-4">
                {{ __('No problem. Enter your email address and we will send you a link to choose a new password.') }}
            </p>

            <div class="mb-4">
                <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" placeholder="Enter your email"
                    required autofocus autocomplete="username">
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button class="btn btn-primary btn-lg w-100" type="submit">
                {{ __('Email Password Reset Link') }} →
            </button>

            <p class="text-center text-secondary mt-4 mb-0">
                <a href="{{ route('login') }}" class="fw-bold text-decoration-none">← {{ __('Back to sign in') }}</a>
            </p>
        </form>
    </main>
</x-guest-layout>