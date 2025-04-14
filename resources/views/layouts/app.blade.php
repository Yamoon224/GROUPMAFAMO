<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="AJS" name="author"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="APP GESTION CLINIQUE" name="description"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta content="APP GESTION DES CONTRATS BTP ET GESTION DES SERVICES IMMOBILIERS" name="description"/>
        <meta property="og:title" content="W3CRM - Customer Relationship Management Tailwind CSS Admin Dashboard Template | DexignZone">
        <meta property="og:description" content="W3Crm offers a powerful Customer Relationship Management (CRM) Admin Dashboard, empowering businesses to streamline interactions, track leads, and enhance customer satisfaction. Manage contacts, automate tasks, and analyze data effortlessly with W3Crm's intuitive interface.">
        <meta property="og:image" content="https://w3crm.dexignzone.com/tailwind/social-image.png">

        <meta name="format-detection" content="telephone=no">

        <meta name="twitter:title" content="APP WEB ERP GROUP MAFAMO PRESS SARL">
        <meta name="twitter:description" content="APP GESTION DES CONTRATS BTP ET GESTION DES SERVICES IMMOBILIERS">
        <meta name="twitter:image" content="https://w3crm.dexignzone.com/tailwind/social-image.png">
        <meta name="twitter:card" content="summary_large_image">
        
        <title>{{ config('app.name', 'GMPSARL') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">  

        <link rel="stylesheet" href="{{ asset('icons/fontawesome/css/all.min.css') }}">

        @stack('links')

        <link href="{{ asset('vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body class="selection:text-white selection:bg-primary">
        <x-app-preloader></x-app-preloader>
        
        <div id="main-wrapper">
            <x-app-navheader></x-app-navheader>

            <x-app-chatbox></x-app-chatbox>

            <x-app-header></x-app-header>

            <x-app-deznav></x-app-deznav>

            <div class="content-body">
                {{ $slot }}
            </div>
            <x-app-others></x-app-others>

            <x-app-footer></x-app-footer>
        </main>


        <script src="{{ asset('vendor/global/global.min.js') }}"></script>
        @stack('scripts')       
        <script src="{{ asset('js/deznav-init.js') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('js/styleSwitcher.js') }}"></script>
        <script src="{{ asset('js/demo.min.js') }}"></script>
    </body>
</html>
