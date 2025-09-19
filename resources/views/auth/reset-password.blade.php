<x-guest-layout>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="card-title text-center mb-2">{{ __('Reset Password') }}</h2>
            <p class="text-secondary text-center mb-4">{{ __('Choose a new password for your account.') }}</p>

            <form method="POST" action="{{ route('password.store') }}" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus
                        class="@error('email') is-invalid @enderror" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                        class="@error('password') is-invalid @enderror" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <div class="form-footer">
                    <x-primary-button class="w-100">
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="link-secondary">{{ __('Back to login') }}</a>
    </div>
</x-guest-layout>
