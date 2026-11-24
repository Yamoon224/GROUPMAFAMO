@php
    $locale = app()->getLocale();
    $currency = session('currency', 'GNF');
    $otherLocale = $locale == 'en' ? 'fr' : 'en';
@endphp

<div class="mf-topbar d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center py-2">
        <span><i class="bi bi-geo-alt-fill me-1 text-warning"></i> Conakry, Guinée</span>
        <span class="d-flex gap-4">
            <a href="tel:+224610421717"><i class="bi bi-telephone-fill me-1"></i> +224 610 42 17 17</a>
        </span>
    </div>
</div>

<nav class="mf-nav navbar navbar-expand-lg py-2">
    <div class="container">
        <a class="navbar-brand me-3" href="{{ route('home') }}" aria-label="{{ config('app.name') }}">
            <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }}" />
        </a>

        <div class="d-flex align-items-center gap-2 order-lg-3">
            <a href="{{ route('locales.switch', $otherLocale) }}" class="mf-icon-btn" title="@lang('locale.switch_locale', ['param' => __('locale.' . ($locale == 'en' ? 'french' : 'english'))])">
                <i class="bi bi-translate"></i> <span class="d-none d-sm-inline text-uppercase">{{ $otherLocale }}</span>
            </a>

            <div class="dropdown">
                <button class="mf-icon-btn" id="currencyDropdown" data-bs-toggle="dropdown" aria-expanded="false" type="button">
                    <img src="{{ asset('images/flags/' . strtolower($currency) . '.png') }}" alt="" height="14" width="18" style="object-fit:cover;border-radius:2px">
                    <span>{{ $currency }}</span>
                    <i class="bi bi-chevron-down small"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="currencyDropdown">
                    @foreach(['GNF', 'EURO', 'USD'] as $cur)
                        @if($cur != $currency)
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('currencies.change', $cur) }}">
                                    <img src="{{ asset('images/flags/' . strtolower($cur) . '.png') }}" alt="" height="14" width="18" style="object-fit:cover;border-radius:2px">
                                    {{ $cur }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <button class="mf-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mfMenu" aria-controls="mfMenu" aria-label="Menu">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <div class="offcanvas offcanvas-end offcanvas-lg order-lg-2 flex-lg-grow-1" tabindex="-1" id="mfMenu" aria-labelledby="mfMenuLabel">
            <div class="offcanvas-header border-bottom">
                <span class="fw-bold" id="mfMenuLabel">{{ config('app.name') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#mfMenu" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav mx-lg-auto gap-lg-1">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">@lang('locale.menu_home')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#services">@lang('locale.our_services')</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('rooms.*') ? 'active' : '' }}" href="{{ route('rooms.index') }}">@lang('locale.our_rooms')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#equipe">@lang('locale.our_team')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#contact">@lang('locale.menu_contact')</a></li>
                </ul>
                <a href="tel:+224610421717" class="mf-btn mf-btn-primary d-lg-none mt-4 w-100">
                    <i class="bi bi-telephone-fill"></i> +224 610 42 17 17
                </a>
            </div>
        </div>
    </div>
</nav>
