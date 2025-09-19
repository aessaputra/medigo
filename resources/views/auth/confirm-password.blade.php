<x-guest-layout>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="card-title text-center mb-2">{{ __('Confirm Password') }}</h2>
            <p class="text-secondary text-center mb-4">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                        class="@error('password') is-invalid @enderror" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="form-footer">
                    <x-primary-button class="w-100">
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('dashboard') }}" class="link-secondary">{{ __('Cancel and go back') }}</a>
    </div>
</x-guest-layout>
