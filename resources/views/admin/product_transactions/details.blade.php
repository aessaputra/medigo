<x-app-layout>
    <x-slot name="header">
        <div>
            <div class="page-pretitle">{{ __('Transactions') }}</div>
            <h2 class="page-title">{{ __('Details') }} #{{ $productTransaction->id }}</h2>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-4 align-items-center mb-4">
                        <div class="col-md">
                            <div class="text-secondary">{{ __('Total Transaction') }}</div>
                            <div class="display-6 fw-bold">Rp. {{ number_format($productTransaction->total_amount, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-md-auto">
                            <div class="text-secondary">{{ __('Date') }}</div>
                            <div class="h3 mb-0">{{ $productTransaction->created_at->format('d M Y H:i') }}</div>
                        </div>
                        <div class="col-md-auto">
                            @if ($productTransaction->is_paid)
                                <span class="badge bg-success px-3 py-2">{{ __('Success') }}</span>
                            @else
                                <span class="badge bg-warning px-3 py-2">{{ __('Pending') }}</span>
                            @endif
                        </div>
                    </div>

                    <h3 class="card-title mb-3">{{ __('List of Items') }}</h3>
                    <div class="table-responsive mb-4">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th>{{ __('Product') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productTransaction->transactionDetails as $detail)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="avatar me-3" style="background-image: url('{{ Storage::url($detail->product->photo) }}')"></span>
                                                <div>
                                                    <div class="fw-bold">{{ $detail->product->name }}</div>
                                                    <div class="text-secondary">{{ $detail->product->slug }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $detail->product->category->name }}</td>
                                        <td>Rp. {{ number_format($detail->product->price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h3 class="card-title mb-3">{{ __('Delivery Details') }}</h3>
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="text-secondary">{{ __('Address') }}</div>
                                    <div class="fw-bold">{{ $productTransaction->address }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="text-secondary">{{ __('City') }}</div>
                                    <div class="fw-bold">{{ $productTransaction->city }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="text-secondary">{{ __('Post Code') }}</div>
                                    <div class="fw-bold">{{ $productTransaction->post_code }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="text-secondary">{{ __('Phone Number') }}</div>
                                    <div class="fw-bold">{{ $productTransaction->phone_number }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($productTransaction->notes)
                        <div class="alert alert-info mt-4" role="alert">
                            <div class="d-flex">
                                <span class="ti ti-notes me-2"></span>
                                <div>
                                    <strong>{{ __('Notes') }}:</strong> {{ $productTransaction->notes }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($productTransaction->proof)
                        <div class="mt-4">
                            <h3 class="card-title mb-3">{{ __('Proof of Payment') }}</h3>
                            <img src="{{ Storage::url($productTransaction->proof) }}" alt="{{ __('Proof of payment') }}"
                                class="img-fluid rounded border">
                        </div>
                    @endif

                    @php
                        $whatsappNumber = preg_replace('/[^0-9]/', '', $productTransaction->phone_number);
                        $supportPhone = config('app.support_phone');
                        $supportWhatsapp = $supportPhone ? preg_replace('/[^0-9]/', '', $supportPhone) : null;
                        $supportMail = config('mail.from.address');
                    @endphp

                    <div class="mt-4 d-flex flex-wrap gap-2">
                        <a href="{{ route('product_transactions.index') }}" class="btn btn-outline-secondary">
                            <span class="ti ti-arrow-left me-1"></span>{{ __('Back') }}
                        </a>

                        @role('owner')
                            @if ($productTransaction->is_paid)
                                <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" class="btn btn-success">
                                    <span class="ti ti-brand-whatsapp me-1"></span>{{ __('Whatsapp Customer') }}
                                </a>
                            @else
                                <form method="POST" action="{{ route('product_transactions.update', $productTransaction) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary" type="submit">
                                        <span class="ti ti-check me-1"></span>{{ __('Approve Order') }}
                                    </button>
                                </form>
                            @endif
                        @endrole

                        @role('buyer')
                            @if ($supportWhatsapp)
                                <a href="https://wa.me/{{ $supportWhatsapp }}" target="_blank" class="btn btn-primary">
                                    <span class="ti ti-brand-whatsapp me-1"></span>{{ __('Contact Admin') }}
                                </a>
                            @elseif($supportMail)
                                <a href="mailto:{{ $supportMail }}" class="btn btn-primary">
                                    <span class="ti ti-mail me-1"></span>{{ __('Contact Admin') }}
                                </a>
                            @endif
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
