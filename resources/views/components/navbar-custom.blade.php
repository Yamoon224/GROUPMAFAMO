<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">
            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="{{ route('dashboard') }}" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('images/conceptor.webp') }}" alt="LOGO">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('images/conceptor.webp') }}" alt="LOGO">
                    </span>
                </a>

                <!-- Logo Dark -->
                <a href="{{ route('dashboard') }}" class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('images/conceptor.webp') }}" alt="LOGO">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('images/conceptor.webp') }}" alt="LOGO">
                    </span>
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">
            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('images/flags/'. (app()->getLocale() == 'en' ? 'us' : 'fr') .'.webp') }}" alt="user-image" class="me-0 me-sm-1" height="12">
                    <span class="align-middle d-none d-lg-inline-block">@lang('locale.' . (app()->getLocale() == 'en' ? 'english' : 'french'))</span> <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                    <a href="{{ route('locales.switch', app()->getLocale() == 'en' ? 'fr' : 'en') }}" class="dropdown-item">
                        <img src="{{ asset('images/flags/'. (app()->getLocale() == 'en' ? 'fr' : 'us') .'.webp') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">@lang('locale.' . (app()->getLocale() == 'en' ? 'french' : 'english'))</span>
                    </a>
                </div>
            </li>

            <li class="d-none d-sm-inline-block">
                <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>


            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="dashboard-analytics.html" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line font-22"></i>
                </a>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="dashboard-analytics.html#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ asset('images/profile.png') }}" alt="user-image" width="32" class="rounded-circle">
                    </span>
                    <span class="d-lg-flex flex-column gap-1 d-none">
                        <h5 class="my-0">{{ auth()->user()->name }}</h5>
                        <h6 class="my-0 fw-normal">{{ auth()->user()->group->name }}</h6>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    <!-- item-->
                    <a href="{{ route('profile') }}" class="dropdown-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>@lang('locale.profile')</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item text-danger">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>@lang('locale.logout')</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>