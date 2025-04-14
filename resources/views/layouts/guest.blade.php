<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ asset('libs/nouislider/dist/nouislider.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('libs/drift-zoom/dist/drift-basic.min.css') }}" />

        <!-- Favicon icon-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}" />
        <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}" />
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

        <!-- Libs CSS -->
        <link rel="stylesheet" href="{{ asset('libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('libs/swiper/swiper-bundle.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('libs/simplebar/dist/simplebar.min.css') }}" />
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    </head>
    <body>
        <x-alert></x-alert>
        <x-nav></x-nav>

        {{ $slot }}

        <x-footer></x-footer>

        <script src="{{ asset('libs/nouislider/dist/nouislider.min.js') }}"></script>
        <script src="{{ asset('libs/wnumb/wNumb.min.js') }}"></script>
        <!-- Libs JS -->
        <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Swiper JS -->
        <script src="{{ asset('libs/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/dist/simplebar.min.js') }}"></script>

        <!-- Theme JS -->
        <script src="{{ asset('js/theme.min.js') }}"></script>
        <script src="{{ asset('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ asset('js/vendors/choice.js') }}"></script>
        <script src="{{ asset('js/vendors/flag.js') }}"></script>

        <script src="{{ asset('js/vendors/add-to-cart.js') }}"></script>
        <script src="{{ asset('js/vendors/qty-input.js') }}"></script>
        <script src="{{ asset('js/vendors/chechbox-filter.js') }}"></script>
        <script src="{{ asset('js/vendors/btn-scrolltop.js') }}"></script>
        <script src="{{ asset('js/vendors/color-change.js') }}"></script>
        <script src="{{ asset('libs/drift-zoom/dist/Drift.min.js') }}"></script>
        <script src="{{ asset('js/vendors/drift.js') }}"></script>
        @stack('scripts')
    </body>
</html>
