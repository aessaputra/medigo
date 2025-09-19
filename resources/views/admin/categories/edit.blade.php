<x-app-layout>
    <x-slot name="header">
        <div class="page-pretitle">{{ __('Inventory') }}</div>
        <h2 class="page-title">{{ __('Edit Category') }}</h2>
    </x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $category->name }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.categories.update', $category) }}"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" type="text" name="name" value="{{ old('name', $category->name) }}"
                                required class="{{ $errors->has('name') ? 'is-invalid' : '' }}" />
                            <x-input-error :messages="$errors->get('name')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="icon" :value="__('Icon')" />
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="avatar" style="background-image: url('{{ Storage::url($category->icon) }}')"></span>
                                <span class="text-secondary">{{ __('Current preview') }}</span>
                            </div>
                            <input id="icon" type="file" name="icon"
                                class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}">
                            <x-input-error :messages="$errors->get('icon')" />
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button>
                                {{ __('Update Category') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
