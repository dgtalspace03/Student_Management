<x-guest-layout>
   

    <main class="px-3 py-5 d-flex align-items-center justify-content-center w-100">
        <form class="p-4 p-md-5 w-100" style="max-width: 480px;" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-4 h1 text-xl-start fw-bold">Student Manager</div>

            <h1 class="h2 fw-bold">{{ __('Reset password') }}</h1>
            <p class="text-secondary mb-4">{{ __('Choose a new password for your account.') }}</p>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email', $request->email) }}"
                    required autofocus autocomplete="username">
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">{{ __('New Password') }}</label>
                <input id="password" type="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    name="password" placeholder="Enter new password"
                    required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password"
                    class="form-control form-control-lg"
                    name="password_confirmation" placeholder="Re-enter new password"
                    required autocomplete="new-password">
            </div>

            <button class="btn btn-primary btn-lg w-100" type="submit">
                {{ __('Reset Password') }} →
            </button>
        </form>
    </main>
</x-guest-layout>