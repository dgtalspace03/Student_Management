<x-guest-layout>
    <x-validation-errors class="mb-4" />

    <main class="px-3 py-5 d-flex align-items-center justify-content-center w-100">
        <form class="p-4 p-md-5 w-100" style="max-width: 480px;" method="POST" action="{{ route('two-factor.login') }}">
            @csrf

            <div class="mb-4 h1 text-xl-start fw-bold">Student Manager</div>

            <h1 class="h2 fw-bold">{{ __('Two-factor check') }}</h1>
            <p class="text-secondary mb-4">
                {{ __('Please confirm access to your account by entering the code from your authenticator app, or one of your emergency recovery codes.') }}
            </p>

            {{-- Authentication code --}}
            <div class="mb-3">
                <label for="code" class="form-label fw-semibold">{{ __('Authentication Code') }}</label>
                <input id="code" type="text" inputmode="numeric" name="code"
                    class="form-control form-control-lg @error('code') is-invalid @enderror"
                    placeholder="123456" autofocus autocomplete="one-time-code">
                @error('code')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="d-flex align-items-center text-secondary my-3">
                <hr class="flex-grow-1 m-0">
                <span class="px-3 small text-uppercase">{{ __('or') }}</span>
                <hr class="flex-grow-1 m-0">
            </div>

            {{-- Recovery code --}}
            <div class="mb-4">
                <label for="recovery_code" class="form-label fw-semibold">{{ __('Recovery Code') }}</label>
                <input id="recovery_code" type="text" name="recovery_code"
                    class="form-control form-control-lg @error('recovery_code') is-invalid @enderror"
                    placeholder="Enter a recovery code" autocomplete="one-time-code">
                @error('recovery_code')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button class="btn btn-primary btn-lg w-100" type="submit">
                {{ __('Log in') }} →
            </button>
        </form>
    </main>
</x-guest-layout>