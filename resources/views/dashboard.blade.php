<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3">
            <div>
                <div class="page-pretitle">{{ __('Overview') }}</div>
                <h2 class="page-title mb-0">{{ __('Dashboard') }}</h2>
            </div>
            <div class="d-none d-md-flex align-items-center">
                <div class="dropdown">
                    <a class="d-flex align-items-center gap-3 text-reset text-decoration-none" href="#"
                        data-bs-toggle="dropdown" aria-label="{{ __('Open user menu') }}">
                        <div class="text-end">
                            <div class="fw-semibold">{{ $user->name }}</div>
                            <div class="text-secondary small">{{ $user->email }}</div>
                        </div>
                        <x-user-avatar :user="$user" size="lg" />
                        <span class="ti ti-chevron-down text-secondary"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <span class="ti ti-user me-2"></span>{{ __('Profile') }}
                        </a>
                        <a href="{{ route('product_transactions.index') }}" class="dropdown-item">
                            <span class="ti ti-clipboard-text me-2"></span>{{ __('Transactions') }}
                        </a>
                        <a href="{{ route('front.index') }}" class="dropdown-item">
                            <span class="ti ti-shopping-cart me-2"></span>{{ __('Visit Store') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <span class="ti ti-logout me-2"></span>{{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="row row-deck">
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">{{ __('Total Transactions') }}</div>
                        <div class="ms-auto lh-1">
                            <span class="badge bg-primary">{{ $transactionStats['total'] }}</span>
                        </div>
                    </div>
                    <div class="h1 mb-0">{{ number_format($transactionStats['total']) }}</div>
                    <div class="text-secondary">{{ __('Across all time') }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">{{ __('Completed') }}</div>
                        <div class="ms-auto lh-1">
                            <span class="badge bg-success">{{ $transactionStats['success'] }}</span>
                        </div>
                    </div>
                    <div class="h1 mb-0">{{ number_format($transactionStats['success']) }}</div>
                    <div class="text-secondary">{{ __('Marked as paid') }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">{{ __('Pending') }}</div>
                        <div class="ms-auto lh-1">
                            <span class="badge bg-warning text-dark">{{ $transactionStats['pending'] }}</span>
                        </div>
                    </div>
                    <div class="h1 mb-0">{{ number_format($transactionStats['pending']) }}</div>
                    <div class="text-secondary">{{ __('Awaiting approval or payment') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-deck mt-3">
        <div class="col-12 col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <x-user-avatar :user="$user" size="lg" />
                            <div>
                                <h3 class="card-title mb-0">{{ __('Profile at a Glance') }}</h3>
                                <div class="text-secondary">
                                    {{ implode(', ', $user->getRoleNames()->map(fn($role) => ucfirst($role))->toArray()) ?: __('User') }}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary d-none d-lg-inline-flex">
                            <span class="ti ti-user-cog me-1"></span>{{ __('Edit') }}
                        </a>
                    </div>
                    <div class="mb-3">
                        <div class="text-secondary text-uppercase fw-semibold small">{{ __('Full name') }}</div>
                        <div class="fw-bold">{{ $user->name }}</div>
                    </div>
                    <div class="mb-3">
                        <div class="text-secondary text-uppercase fw-semibold small">{{ __('Email address') }}</div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold">{{ $user->email }}</span>
                            @if ($user->hasVerifiedEmail())
                                <span class="badge bg-success">{{ __('Verified') }}</span>
                            @else
                                <span class="badge bg-warning text-dark">{{ __('Unverified') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-secondary text-uppercase fw-semibold small">{{ __('Member since') }}</div>
                        <div class="fw-bold">{{ optional($user->created_at)->format('d M Y') }}</div>
                    </div>
                    <div>
                        <div class="text-secondary text-uppercase fw-semibold small">{{ __('Last updated') }}</div>
                        <div class="fw-bold">{{ optional($user->updated_at)->diffForHumans() }}</div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center text-secondary gap-2">
                        <span class="ti ti-mail"></span>
                        <span>{{ $user->email }}</span>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        <span class="ti ti-user-edit me-1"></span>{{ __('Update your profile information') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Recent Transactions') }}</h3>
                    <div class="card-actions">
                        <a href="{{ route('product_transactions.index') }}" class="btn btn-sm btn-outline-primary">
                            <span class="ti ti-arrow-right me-1"></span>{{ __('Review all transactions') }}
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>{{ __('Invoice') }}</th>
                                @if ($showCustomerColumn)
                                    <th>{{ __('Customer') }}</th>
                                @endif
                                <th>{{ __('Total') }}</th>
                                <th>{{ __('Items') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created at') }}</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentTransactions as $transaction)
                                <tr>
                                    <td>#{{ $transaction->id }}</td>
                                    @if ($showCustomerColumn)
                                        <td>{{ optional($transaction->user)->name ?? __('Unknown') }}</td>
                                    @endif
                                    <td>Rp. {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                                    <td>{{ $transaction->transaction_details_count }}</td>
                                    <td>
                                        @if ($transaction->is_paid)
                                            <span class="badge bg-success">{{ __('Success') }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark">{{ __('Pending') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ optional($transaction->created_at)->format('d M Y H:i') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('product_transactions.show', $transaction) }}" class="btn btn-outline-primary btn-sm">
                                            {{ __('Details') }}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $showCustomerColumn ? 7 : 6 }}" class="text-center text-secondary py-5">
                                        {{ __('No recent transactions found.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($recentTransactions->isEmpty())
                    <div class="card-footer text-secondary">
                        {{ __('Orders will appear here as soon as you create or receive them.') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
