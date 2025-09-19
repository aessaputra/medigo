<section class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">{{ __('Update Password') }}</h3>
            <div class="card-subtitle">{{ __('Ensure your account is using a long, random password to stay secure.') }}</div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('password.update') }}" novalidate>
            @csrf
            @method('put')

            <div class="mb-3">
                <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    autocomplete="current-password"
                    class="{{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" />
            </div>

            <div class="mb-3">
                <x-input-label for="update_password_password" :value="__('New Password')" />
                <x-text-input id="update_password_password" name="password" type="password"
                    autocomplete="new-password"
                    class="{{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}" />
                <x-input-error :messages="$errors->updatePassword->get('password')" />
            </div>

            <div class="mb-3">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    autocomplete="new-password"
                    class="{{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
            </div>

            <div class="d-flex align-items-center gap-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <span
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-secondary"
                    >{{ __('Saved.') }}</span>
                @endif
            </div>
        </form>
    </div>
</section>
