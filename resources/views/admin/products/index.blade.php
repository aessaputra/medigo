<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div>
                <div class="page-pretitle">{{ __('Inventory') }}</div>
                <h2 class="page-title">{{ __('Manage Products') }}</h2>
            </div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <span class="ti ti-plus me-1"></span>{{ __('Add Product') }}
            </a>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Product List') }}</h3>
                </div>
                <div class="card-body p-0">
                    @if ($products->isEmpty())
                        <div class="p-4 text-center text-secondary">
                            {{ __('Belum ada produk ditambahkan oleh pemilik apotek.') }}
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th class="text-nowrap">{{ __('Price') }}</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-3" style="background-image: url('{{ Storage::url($product->photo) }}')"></span>
                                                    <div>
                                                        <div class="fw-bold">{{ $product->name }}</div>
                                                        <div class="text-secondary">{{ $product->slug }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                            <td class="text-end">
                                                <div class="btn-list">
                                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline-primary btn-sm">
                                                        {{ __('Edit') }}
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('{{ __('Delete this product?') }}')">
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
