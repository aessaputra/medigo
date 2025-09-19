@php($user = Auth::user())
<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark d-print-none" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard') }}">
                <span class="navbar-brand-text">{{ config('app.name', 'Laravel') }}</span>
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            @if ($user)
                <div class="nav-item dropdown">
                    <a class="nav-link d-flex lh-1 text-reset p-0" href="#" data-bs-toggle="dropdown"
                        aria-label="{{ __('Open user menu') }}">
                        <x-user-avatar :user="$user" size="sm" />
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
            @endif
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <span class="ti ti-dashboard"></span>
                        </span>
                        <span class="nav-link-title">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('product_transactions.*') ? ' active' : '' }}"
                        href="{{ route('product_transactions.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <span class="ti ti-clipboard-list"></span>
                        </span>
                        <span class="nav-link-title">{{ __('Transactions') }}</span>
                    </a>
                </li>

                @if ($user && $user->hasRole('buyer'))
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('carts.*') ? ' active' : '' }}" href="{{ route('carts.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <span class="ti ti-basket"></span>
                            </span>
                            <span class="nav-link-title">{{ __('My Cart') }}</span>
                        </a>
                    </li>
                @endif

                @if ($user && $user->hasRole('owner'))
                    <li class="nav-item mt-4">
                        <div class="nav-link disabled text-uppercase text-secondary fw-bold small">
                            {{ __('Management') }}
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('admin.products.*') ? ' active' : '' }}"
                            href="{{ route('admin.products.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <span class="ti ti-package"></span>
                            </span>
                            <span class="nav-link-title">{{ __('Manage Products') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('admin.categories.*') ? ' active' : '' }}"
                            href="{{ route('admin.categories.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <span class="ti ti-folders"></span>
                            </span>
                            <span class="nav-link-title">{{ __('Manage Categories') }}</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item mt-4">
                    <div class="nav-link disabled text-uppercase text-secondary fw-bold small">
                        {{ __('Storefront') }}
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <span class="ti ti-shopping-cart"></span>
                        </span>
                        <span class="nav-link-title">{{ __('Visit Store') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
