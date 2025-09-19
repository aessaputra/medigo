<x-app-layout>
    <x-slot name="header">
        <div class="page-pretitle">{{ __('Inventory') }}</div>
        <h2 class="page-title">{{ __('New Product') }}</h2>
    </x-slot>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Product Details') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                                class="{{ $errors->has('name') ? 'is-invalid' : '' }}" />
                            <x-input-error :messages="$errors->get('name')" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" type="number" name="price" :value="old('price')" required
                                class="{{ $errors->has('price') ? 'is-invalid' : '' }}" />
                            <x-input-error :messages="$errors->get('price')" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select name="category_id" id="category_id"
                                class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}" required>
                                <option value="">{{ __('Choose product category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="about" :value="__('About')" />
                            <textarea name="about" id="about" rows="5"
                                class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}">{{ old('about') }}</textarea>
                            <x-input-error :messages="$errors->get('about')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="photo" :value="__('Photo')" />
                            <input id="photo" type="file" name="photo"
                                class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" required>
                            <x-input-error :messages="$errors->get('photo')" />
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button>
                                {{ __('Add New Product') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
