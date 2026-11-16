<x-guest-layout>
    <x-validation-errors class="mb-4" />

    <main class="px-3 py-5 d-flex align-items-center justify-content-center w-100">
        <form class="p-4 p-md-5 w-100" style="max-width: 480px;" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4 h1 text-xl-start fw-bold">Student Manager</div>

            <h1 class="h2 fw-bold">{{ __('Confirm password') }}</h1>
            <p class="text-secondary mb-4">
                {{ __('This is a secure area. Please confirm your password before continuing.') }}
            </p>

            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                <input id="password" type="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    name="password" placeholder="Enter your password"
                    required autofocus autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button class="btn btn-primary btn-lg w-100" type="submit">
                {{ __('Confirm') }} →
            </button>
        </form>
    </main>
</x-guest-layout>