<section class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">{{ __('Delete Account') }}</h3>
            <div class="card-subtitle">{{ __('Once your account is deleted, all resources and data will be permanently removed.') }}</div>
        </div>
    </div>
    <div class="card-body">
        <p class="text-secondary mb-4">
            {{ __('Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-account">
            {{ __('Delete Account') }}
        </button>

        <div class="modal modal-blur fade" id="modal-delete-account" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Are you sure you want to delete your account?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p class="text-secondary">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
                            </p>
                            <div class="mb-3">
                                <x-input-label for="delete_password" value="{{ __('Password') }}" />
                                <x-text-input id="delete_password" name="password" type="password"
                                    class="{{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}"
                                    placeholder="{{ __('Password') }}" required />
                                <x-input-error :messages="$errors->userDeletion->get('password')" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </button>
                            <x-danger-button>
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if ($errors->userDeletion->isNotEmpty())
            @push('scripts')
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const modalElement = document.getElementById('modal-delete-account');
                        if (modalElement) {
                            const modal = new window.bootstrap.Modal(modalElement);
                            modal.show();
                        }
                    });
                </script>
            @endpush
        @endif
    </div>
</section>
