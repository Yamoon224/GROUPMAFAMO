<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
    data-layout-mode="detached" 
    data-topbar-color="dark" 
    data-menu-color="light" 
    data-sidenav-user="true">
    <head>
        <meta charset="utf-8">
	    <meta name="robots" content="index, follow">
        <meta content="EDITOSYSTEM" name="conceptor"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="GROUP MAFAMO PRESS SARL" name="author"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="APP GESTION DES CONTRATS BTP ET GESTION DES SERVICES IMMOBILIERS" name="description"/>
        <meta property="og:title" content="ERP GROUP MAFAMO">
        <meta property="og:description" content="ERP GROUP MAFAMO PRESS SARL">
        <meta property="og:image" content="{{ asset('images/logo.webp') }}">

        <meta name="format-detection" content="telephone=no">

        <meta name="twitter:title" content="APP WEB ERP GROUP MAFAMO PRESS SARL">
        <meta name="twitter:description" content="APP GESTION DES CONTRATS BTP ET GESTION DES SERVICES IMMOBILIERS">
        <meta name="twitter:image" content="{{ asset('images/logo.webp') }}">
        <meta name="twitter:card" content="summary_large_image">
        
        <title>{{ config('app.name', 'GROUP MAFAMO') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">  

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <script src="{{ asset('assets/js/hyper-config.js') }}"></script>
        <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-custom.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="authentication-bg position-relative">
        <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
            <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
                <g fill-opacity='0.22'>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
                </g>
            </svg>
        </div>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-4 col-md-6 col-sm-8 col-xs-10">
                        <div class="card card-top-primary">
                            <!-- Logo -->
                            <div class="card-header py-2 text-center">
                                <a><img src="{{ asset('images/logo.webp') }}" alt="LOGO" height="60" width="100"></a>
                            </div>
    
                            <div class="card-body px-4">
                                {{ $slot }}
                            </div>
                        </div>
					</div>                   
                </div>
            </div>
        </div>

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> © {{ env('APP_NAME') }}
        </footer>
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    </body>
</html>
