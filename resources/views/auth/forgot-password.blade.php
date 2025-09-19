<x-guest-layout>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="card-title text-center mb-2">{{ __('Forgot your password?') }}</h2>
            <p class="text-secondary text-center mb-4">
                {{ __('Let us know your email address and we will email you a password reset link.') }}
            </p>

            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="@error('email') is-invalid @enderror" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="form-footer">
                    <x-primary-button class="w-100">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="link-secondary">{{ __('Back to login') }}</a>
    </div>
</x-guest-layout>
