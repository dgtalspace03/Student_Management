<x-guest-layout>
    <main class="px-3 py-5 d-flex align-items-center justify-content-center w-100">
        <div class="p-4 p-md-5 w-100" style="max-width: 480px;">

            <div class="mb-4 h1 text-xl-start fw-bold">Student Manager</div>

            <h1 class="h2 fw-bold">{{ __('Verify your email') }}</h1>
            <p class="text-secondary mb-4">
                {{ __('Before continuing, please verify your email address by clicking the link we just emailed to you. If you didn\'t receive it, we will gladly send another.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg w-100">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <div class="d-flex justify-content-between">
                <a href="{{ route('profile.show') }}" class="btn btn-link text-decoration-none px-0">
                    {{ __('Edit Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none px-0">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </main>
</x-guest-layout>