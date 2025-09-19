<x-app-layout>
    <x-slot name="header">
        <div>
            <div class="page-pretitle">{{ __('Operations') }}</div>
            <h2 class="page-title">
                {{ Auth::user()->hasRole('owner') ? __('Apotek Orders') : __('My Transactions') }}
            </h2>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Transaction History') }}</h3>
                </div>
                <div class="card-body p-0">
                    @if ($product_transactions->isEmpty())
                        <div class="p-4 text-center text-secondary">
                            {{ __('Belum ada transaksi') }}
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>{{ __('Invoice') }}</th>
                                        <th>{{ __('Total') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_transactions as $transaction)
                                        <tr>
                                            <td>
                                                <a href="{{ route('product_transactions.show', $transaction) }}" class="fw-bold">
                                                    #{{ $transaction->id }}
                                                </a>
                                            </td>
                                            <td>Rp. {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                                            <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
                                            <td>
                                                @if ($transaction->is_paid)
                                                    <span class="badge bg-success">{{ __('Success') }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ __('Pending') }}</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('product_transactions.show', $transaction) }}" class="btn btn-outline-primary btn-sm">
                                                    {{ __('View Details') }}
                                                </a>
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
