<x-app-layout>
    <x-slot name="header">
        <div class="page-pretitle">{{ __('Settings') }}</div>
        <h2 class="page-title">{{ __('Profile') }}</h2>
    </x-slot>

    <div class="row row-deck">
        <div class="col-12 col-lg-6">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="col-12 col-lg-6">
            @include('profile.partials.update-password-form')
        </div>

        <div class="col-12">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
