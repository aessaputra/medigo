<x-guest-layout>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="card-title text-center mb-2">{{ __('Verify Your Email Address') }}</h2>
            <p class="text-secondary text-center mb-4">
                {{ __('Before continuing, please check your email for a verification link.') }}
            </p>

            <p class="text-center text-secondary mb-4">
                {{ __('If you did not receive the email, we will gladly send you another.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}" class="d-grid gap-2" novalidate>
                @csrf
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </form>
        </div>
    </div>
    <div class="text-center text-secondary mt-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">{{ __('Log Out') }}</button>
        </form>
    </div>
</x-guest-layout>
