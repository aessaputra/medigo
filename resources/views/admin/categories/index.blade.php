<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div>
                <div class="page-pretitle">{{ __('Inventory') }}</div>
                <h2 class="page-title">{{ __('Manage Categories') }}</h2>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                <span class="ti ti-plus me-1"></span>{{ __('Add Category') }}
            </a>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Category List') }}</h3>
                </div>
                <div class="card-body p-0">
                    @if ($categories->isEmpty())
                        <div class="p-4 text-center text-secondary">
                            {{ __('Belum ada kategori ditambahkan.') }}
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>{{ __('Category') }}</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-3" style="background-image: url('{{ Storage::url($category->icon) }}')"></span>
                                                    <div class="fw-bold">{{ $category->name }}</div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-list">
                                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                                        class="btn btn-outline-primary btn-sm">
                                                        {{ __('Edit') }}
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                                                        onsubmit="return confirm('{{ __('Delete this category?') }}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger btn-sm" type="submit">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
