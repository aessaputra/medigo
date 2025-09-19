<section class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">{{ __('Profile Information') }}</h3>
            <div class="card-subtitle">{{ __("Update your account's profile information and email address.") }}</div>
        </div>
    </div>
    <div class="card-body">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" novalidate>
            @csrf
            @method('patch')

            <div class="mb-3">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus
                    autocomplete="name" class="@error('name') is-invalid @enderror" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required
                    autocomplete="username" class="@error('email') is-invalid @enderror" />
                <x-input-error :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
                        <span class="ti ti-alert-triangle me-2"></span>
                        <div>
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="btn btn-link p-0 align-baseline">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </div>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success mt-2" role="alert">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                @endif
            </div>

            <div class="d-flex align-items-center gap-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
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
