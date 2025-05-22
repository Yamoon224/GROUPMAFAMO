<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
    data-layout-mode="detached" 
    data-topbar-color="dark" 
    data-menu-color="light" 
    data-sidenav-user="true">
    <head>
        <meta charset="utf-8">
        <meta content="EDITOSYSTEM" name="author"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="ERP CONTRAT BTP | RESERVATION HÔTEL | LOCATION VEHICULES" name="description"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta content="APP GESTION DES CONTRATS BTP ET GESTION DES SERVICES IMMOBILIERS" name="description"/>
        <meta property="og:title" content="W3CRM - Customer Relationship Management Tailwind CSS Admin Dashboard Template | DexignZone">
        <meta property="og:description" content="W3Crm offers a powerful Customer Relationship Management (CRM) Admin Dashboard, empowering businesses to streamline interactions, track leads, and enhance customer satisfaction. Manage contacts, automate tasks, and analyze data effortlessly with W3Crm's intuitive interface.">
        <meta property="og:image" content="{{ asset('images/logo.webp') }}">

        <meta name="format-detection" content="telephone=no">

        <meta name="twitter:title" content="APP WEB ERP GROUP MAFAMO PRESS SARL">
        <meta name="twitter:description" content="APP GESTION DES CONTRATS BTP ET GESTION DES SERVICES IMMOBILIERS">
        <meta name="twitter:image" content="{{ asset('images/logo.webp') }}">
        <meta name="twitter:card" content="summary_large_image">
        
        <title>{{ config('app.name', 'GROUP MAFAMO') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">  

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic" rel="stylesheet" />
        
        @stack('links')

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/hyper-config.js') }}"></script>
        <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-custom.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Begin page -->
        <div class="wrapper">
            <x-navbar-custom></x-navbar-custom>
            <x-leftside-menu></x-leftside-menu>

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <script>document.write(new Date().getFullYear())</script> © {{ env('APP_CONCEPTOR') }}
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end footer-links d-none d-md-block">
                                        <a href="javascript: void(0);">About</a>
                                        <a href="javascript: void(0);">Support</a>
                                        <a href="javascript: void(0);">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    
        {{-- <x-offcanvas></x-offcanvas> --}}

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        @stack('scripts')
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    </body>
</html>
