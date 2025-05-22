<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GROUP MAFAMO') }}</title>

        <link rel="stylesheet" href="{{ asset('assets/libs/nouislider/dist/nouislider.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/libs/drift-zoom/dist/drift-basic.min.css') }}" />

        <!-- Favicon icon-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}" />
        <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}" />
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

        <!-- Libs CSS -->
        <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" />
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    </head>
    <body>
        <x-alert></x-alert>
        <x-nav></x-nav>

        {{ $slot }}

        <x-footer></x-footer>

        <script src="{{ asset('assets/libs/nouislider/dist/nouislider.min.js') }}"></script>
        <script src="{{ asset('assets/libs/wnumb/wNumb.min.js') }}"></script>
        <!-- Libs JS -->
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Swiper JS -->
        <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

        <!-- Theme JS -->
        <script src="{{ asset('assets/js/theme.min.js') }}"></script>
        <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/choice.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/flag.js') }}"></script>

        <script src="{{ asset('assets/js/vendors/btn-scrolltop.js') }}"></script>
        <script src="{{ asset('assets/libs/drift-zoom/dist/Drift.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/drift.js') }}"></script>
        @stack('scripts')
    </body>
</html>
