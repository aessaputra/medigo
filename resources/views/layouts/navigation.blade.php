@php($user = Auth::user())
<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-none d-md-flex" href="{{ route('dashboard') }}">
            <span class="navbar-brand-text">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a class="nav-link d-flex lh-1 text-reset p-0" href="#" data-bs-toggle="dropdown" aria-label="User menu">
                    <span class="avatar avatar-sm">{{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}</span>
                    <div class="d-none d-md-block ps-2">
                        <div class="fw-bold">{{ $user->name ?? 'User' }}</div>
                        <div class="text-secondary">{{ $user->email ?? '' }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <span class="ti ti-user me-2"></span> Profil
                    </a>
                    <a href="{{ route('front.index') }}" class="dropdown-item">
                        <span class="ti ti-home me-2"></span> Lihat Toko
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <span class="ti ti-logout me-2"></span> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <div class="flex-fill">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <span class="ti ti-dashboard"></span>
                                </span>
                                <span class="nav-link-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('product_transactions.index') ? ' active' : '' }}"
                                href="{{ route('product_transactions.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <span class="ti ti-clipboard-list"></span>
                                </span>
                                <span class="nav-link-title">
                                    {{ ($user && $user->hasRole('owner')) ? __('Apotek Orders') : __('My Transactions') }}
                                </span>
                            </a>
                        </li>

                        @if ($user && $user->hasRole('owner'))
                            <li class="nav-item">
                                <a class="nav-link{{ request()->routeIs('admin.products.index') ? ' active' : '' }}"
                                    href="{{ route('admin.products.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <span class="ti ti-package"></span>
                                    </span>
                                    <span class="nav-link-title">{{ __('Manage Products') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ request()->routeIs('admin.categories.index') ? ' active' : '' }}"
                                    href="{{ route('admin.categories.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <span class="ti ti-folders"></span>
                                    </span>
                                    <span class="nav-link-title">{{ __('Manage Categories') }}</span>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('front.index') ? ' active' : '' }}"
                                href="{{ route('front.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <span class="ti ti-shopping-cart"></span>
                                </span>
                                <span class="nav-link-title">{{ __('Store') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
