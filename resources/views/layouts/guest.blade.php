<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@lang('locale.home_meta')">
        <meta name="theme-color" content="#0b6fae">

        <title>{{ config('app.name', 'GROUP MAFAMO') }}</title>

        <link rel="stylesheet" href="{{ asset('assets/libs/nouislider/dist/nouislider.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/libs/drift-zoom/dist/drift-basic.min.css') }}" />

        <!-- Favicon icon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
        <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}" />

        <!-- Polices -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">

        <!-- Libs CSS -->
        <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" />
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}?v=3">
        @stack('styles')
    </head>
    <body>
        <a href="#main" class="visually-hidden-focusable position-absolute p-2 bg-white">Aller au contenu</a>
        <x-nav></x-nav>

        <main id="main">
            {{ $slot }}
        </main>

        <x-footer></x-footer>

        <script src="{{ asset('assets/libs/nouislider/dist/nouislider.min.js') }}"></script>
        <script src="{{ asset('assets/libs/wnumb/wNumb.min.js') }}"></script>
        <!-- Libs JS -->
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ asset('assets/libs/drift-zoom/dist/Drift.min.js') }}"></script>
        <script src="{{ asset('assets/js/site.js') }}?v=1"></script>
        @stack('scripts')
    </body>
</html>
