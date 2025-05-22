<nav class="navbar navbar-expand-xl sticky-top bg-white  w-100 border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between w-100 align-items-center">
            <div class="d-flex align-items-center w-100 w-md-auto">
                <button class="navbar-toggler offcanvas-nav-btn" type="button">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand mx-auto mx-xxl-0 ms-4" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.webp') }}" height="40" width="70" alt="LOGO" />
                </a>
            </div>
            <div class="">
                <div class="offcanvas offcanvas-bottom offcanvas-nav" style="height: 60vh">
                    <div class="offcanvas-header position-absolute top-0 start-50 translate-middle mt-n5">
                        <button type="button" class="btn-close bg-white opacity-100" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body pt-xl-0 align-items-center">
                        <ul class="navbar-nav mb-2 mb-lg-0 ">
                            <li class="nav-item border-bottom border-bottom-xl-0">
                                <a class="nav-link" href="tel:+224610421717"><i class="bi bi-bank ms-2"></i> {{ env('APP_NAME') }} | <i class="bi bi-telephone-inbound-fill ms-2"></i> +224610421717</a>
                            </li>
                        </ul>
                        <div class="d-xl-none d-grid position-absolute bottom-0 w-100 start-0 end-0 p-4">
                            <a href="signin.html" class="btn btn-primary">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-4">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('locales.switch', app()->getLocale() == 'en' ? 'fr' : 'en') }}" title="@lang('locale.switch_locale', ['param'=>__('locale.'.(app()->getLocale() == 'en' ? 'french' : 'english'))])" class="d-md-block">
                        <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 15H3.5A2.502 2.502 0 0 1 1 12.5v-9A2.502 2.502 0 0 1 3.5 1h9A2.502 2.502 0 0 1 15 3.5V8h-1V3.5A1.502 1.502 0 0 0 12.5 2h-9A1.502 1.502 0 0 0 2 3.5v9A1.502 1.502 0 0 0 3.5 14H8zm-.038-4.811a9.77 9.77 0 0 1-3.766 1.796l-.242-.97a8.816 8.816 0 0 0 3.282-1.532A9.264 9.264 0 0 1 4.888 5H4V4h3.279l-.544-.544.707-.707L8.692 4H12v1h-.914A9.836 9.836 0 0 1 9.78 8.152a3.853 3.853 0 0 0-1.82 2.037zm.032-1.383A8.167 8.167 0 0 0 10.058 5H5.922a8.18 8.18 0 0 0 2.072 3.806zM23 20.447v-8.894A2.525 2.525 0 0 0 20.484 9h-8.931A2.556 2.556 0 0 0 9 11.553v8.894A2.556 2.556 0 0 0 11.553 23h8.894A2.556 2.556 0 0 0 23 20.447zM20.484 10A1.517 1.517 0 0 1 22 11.516v8.968A1.517 1.517 0 0 1 20.484 22h-8.968A1.517 1.517 0 0 1 10 20.484v-8.968A1.517 1.517 0 0 1 11.516 10zm-2.086 8h-4.796l-1.159 2.23-.886-.46L16 11.215l4.443 8.555-.886.46zm-.52-1L16 13.385 14.122 17zM6 22.01a2.003 2.003 0 0 1-2-2v-2.303l1.646 1.646.707-.707L3.506 15.8.659 18.646l.707.707L3 17.72v2.292a3.003 3.003 0 0 0 3 3h2.058v-1zM22.646 4.647L21 6.293V4a3.003 3.003 0 0 0-3-3h-2v1h2a2.003 2.003 0 0 1 2 2v2.281l-1.634-1.635-.707.707 2.847 2.848 2.848-2.848z" fill="#211F1C"></path>
						</svg>
                    </a> 
                </div>
                <div class="dropdown d-md-block">
                    <a class="d-flex align-items-center gap-1" href="product-no-filter.html#!" id="currencyDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img id="current-flag" src="{{ asset('images/flags/'.strtolower(session('currency')).'.png') }}" alt="{{ session('currency') }}" height="20" width="16" />
                        <span id="current-currency">{{ session('currency') }}</span>
                        <i id="arrowIcon" class="bi bi-chevron-down ms-2"></i>
                    </a>
                    <ul class="dropdown-menu bg-white shadow" aria-labelledby="currencyDropdown">
                        @foreach(['GNF', 'EURO', 'USD'] as $currency)
                            @if($currency != session('currency'))
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('currencies.change', $currency) }}">
                                    <img class="flag-icon" width="16" height="20" src="{{ asset('images/flags/'.strtolower($currency).'.png') }}" alt="{{ $currency }}"/>
                                    {{ $currency }}
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>