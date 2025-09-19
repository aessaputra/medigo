<x-app-layout>
    <x-slot name="header">
        <div class="page-pretitle">{{ __('Inventory') }}</div>
        <h2 class="page-title">{{ __('New Category') }}</h2>
    </x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Category Details') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                                class="{{ $errors->has('name') ? 'is-invalid' : '' }}" />
                            <x-input-error :messages="$errors->get('name')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="icon" :value="__('Icon')" />
                            <input id="icon" type="file" name="icon"
                                class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" required>
                            <x-input-error :messages="$errors->get('icon')" />
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button>
                                {{ __('Add New Category') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
