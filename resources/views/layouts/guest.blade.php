<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="theme-light">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <x-application-logo class="w-auto h-10" />
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>
    @stack('scripts')
</body>
</html>
