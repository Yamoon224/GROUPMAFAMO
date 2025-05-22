<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="{{ route('dashboard') }}" class="logo logo-light">
        <span class="logo-lg"><img src="{{ asset('images/logo.webp') }}" height="50" width="80" alt="LOGO"></span>
        <span class="logo-sm"><img src="{{ asset('images/logo.webp') }}" height="30" width="60" alt="LOGO"></span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('dashboard') }}" class="logo logo-dark">
        <span class="logo-lg"><img src="{{ asset('images/logo.webp') }}" height="50" width="80" alt="LOGO"></span>
        <span class="logo-sm"><img src="{{ asset('images/logo.webp') }}" height="30" width="50" alt="LOGO"></span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="{{ route('profile') }}">
                <img src="{{ asset('images/logo.webp') }}" alt="PROFILE" height="50" width="70" class="img-rounded shadow-sm">
                <span class="leftbar-user-name mt-2">{{ env('APP_NAME') }}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>@lang('locale.dashboard')</span>
                </a>
            </li>

            <li class="side-nav-title">Apps</li>

            @if (auth()->user()->group->code == 'admin')
            <x-menu-admin></x-menu-admin>
            @endif

            @if (auth()->user()->group->code == 'director')
            <x-menu-director></x-menu-director>
            @endif

            @if (auth()->user()->group->code == 'accountant')
            <x-menu-accountant></x-menu-accountant>
            @endif

            @if (auth()->user()->group->code == 'secretary')
            <x-menu-secretary></x-menu-secretary>
            @endif

            <!-- Help Box -->
            <div class="help-box text-white text-center">
                <a href="javascript: void(0);" class="float-end close-btn text-white">
                    <i class="mdi mdi-close"></i>
                </a>
                <img src="{{ asset('images/conceptor.webp') }}" height="90" width="90" alt="LOGO" />
            </div>
            <!-- end Help Box -->
        </ul>
        <!--- End Sidemenu -->
        <div class="clearfix"></div>
    </div>
</div>