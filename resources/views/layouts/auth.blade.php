<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
	    <meta name="robots" content="index, follow">
        <meta content="EDITOSYSTEM" name="conceptor"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="GROUP MAFAMO PRESS SARL" name="author"/>
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

        <link href="{{ asset('vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body class="h-[100vh] selection:text-white selection:bg-primary" data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">
        <div class="authincation min-h-[100vh] h-full flex bg-auth">
            <div class="container-fluid h-full pt-0 w-full px-[12.5px]">
                <div class="row">
                    <div class="xl:w-1/3 lg:w-1/2 sm:w-1/2 mx-auto mt-10">
                        <div class="card overflow-hidden flex flex-col card-bottom-primary card-top-primary">
                            <div class="sm:p-5 py-2 flex-auto">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="{{ asset('images/logo.png') }}" alt="LOGO" width="100" height="80" class="img-fluid rounded-full inline-block">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body px-5 pb-4">
                                {{ $slot }}
                            </div>
                        </div>
					</div>                   
                </div>
            </div>
        </div>

        <script src="{{ asset('vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script> 
        <script src="{{ asset('js/deznav-init.js') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('js/demo.min.js') }}"></script>
        @stack('scripts')
    </body>
</html>
