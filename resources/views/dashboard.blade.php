<x-app-layout>
    <x-slot name="header">
        <div class="page-pretitle">{{ __('Overview') }}</div>
        <h2 class="page-title">{{ __('Dashboard') }}</h2>
    </x-slot>

    <div class="row row-deck">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">{{ __('Status') }}</div>
                    </div>
                    <h3 class="h1 mb-3">{{ __("You're logged in!") }}</h3>
                    <p class="text-secondary mb-0">{{ __('Use the navigation above to manage your data.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">{{ __('Profile') }}</div>
                    </div>
                    <h3 class="h1 mb-3">{{ optional(Auth::user())->name }}</h3>
                    <p class="text-secondary mb-0">{{ optional(Auth::user())->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">{{ __('Next steps') }}</div>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><span class="ti ti-arrow-up-right me-2 text-primary"></span>{{ __('Review recent transactions') }}</li>
                        <li class="mb-2"><span class="ti ti-settings me-2 text-primary"></span>{{ __('Update your profile information') }}</li>
                        <li><span class="ti ti-help-circle me-2 text-primary"></span>{{ __('Need help? Contact support.') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
