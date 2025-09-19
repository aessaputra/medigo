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
    <div class="page">
        @include('layouts.navigation')

        <div class="page-wrapper">
            @isset($header)
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                {{ $header }}
                            </div>
                        </div>
                    </div>
                </div>
            @endisset

            <div class="page-body">
                <div class="container-xl">
                    @includeWhen(session()->has('status') || session()->has('success') || session()->has('error'), 'layouts.flash')
                    {{ $slot }}
                </div>
            </div>

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ url('/') }}" class="link-secondary">Kembali ke beranda</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
