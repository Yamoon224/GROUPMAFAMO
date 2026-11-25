@php
    $services = [
        ['icon' => 'bi-buildings',      'title' => 'locale.building_btp',          'text' => 'locale.btp_service'],
        ['icon' => 'bi-house-heart',    'title' => 'locale.real_estate',           'text' => 'locale.immobilier_service'],
        ['icon' => 'bi-box-seam',       'title' => 'locale.transit_import_export', 'text' => 'locale.transit_service'],
        ['icon' => 'bi-airplane',       'title' => 'locale.travel_others',         'text' => 'locale.travel_service'],
        ['icon' => 'bi-truck-front',    'title' => 'locale.engins_location',       'text' => 'locale.location_service'],
    ];
    $team = [
        ['ceo.jpeg', 'PDG'], ['pca.jpeg', 'PCA'], ['manager.jpeg', 'D. Général'], ['accountable.jpeg', 'A. Comptable'],
        ['secretary.jpeg', 'Sécretaire'], ['engineer.jpeg', 'Ingénieur'], ['aengineer.jpeg', 'A. Ingénieur'],
        ['rc-maroc.jpeg', 'R.C Maroc'], ['dr-labe.jpeg', 'D.R Labé'],
    ];
@endphp

<x-guest-layout>

    {{-- ============ HERO ============ --}}
    <section class="mf-hero">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-7">
                    <span class="mf-pill reveal"><span class="dot"></span> @lang('locale.home_badge')</span>
                    <h1 class="mt-4 mb-3 reveal d1">@lang('locale.home_title_1') <em>@lang('locale.home_title_2')</em></h1>
                    <p class="lead mb-4 reveal d2">@lang('locale.home_subtitle')</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 reveal d3">
                        <a href="{{ route('public.rooms.index') }}" class="mf-btn mf-btn-primary">
                            <i class="bi bi-calendar2-check"></i> @lang('locale.home_cta_book')
                        </a>
                        <a href="#services" class="mf-btn mf-btn-ghost">
                            @lang('locale.home_cta_services') <i class="bi bi-arrow-down"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="position-relative px-4 py-3 reveal d2">
                        <div class="mf-hero-card">
                            <div class="inner">
                                <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="mf-float" style="left:-6px; top:8%"><i class="bi bi-shield-check"></i> @lang('locale.home_float_1')</div>
                        <div class="mf-float b" style="right:-6px; bottom:10%"><i class="bi bi-headset"></i> @lang('locale.home_float_2')</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mf-wave" aria-hidden="true">
            <svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#fff" d="M0,40 C240,100 480,0 720,30 C960,60 1200,100 1440,30 L1440,90 L0,90 Z"/></svg>
        </div>
    </section>

    {{-- ============ CHIFFRES ============ --}}
    <section class="mf-stats">
        <div class="container">
            <div class="box reveal">
                <div class="row g-0 row-cols-2 row-cols-md-4">
                    <div class="col mf-stat"><strong>5</strong><span>@lang('locale.home_stat_1')</span></div>
                    <div class="col mf-stat"><strong>{{ max($rooms->count(), 1) }}+</strong><span>@lang('locale.home_stat_2')</span></div>
                    <div class="col mf-stat mt-3 mt-md-0"><strong>24/7</strong><span>@lang('locale.home_stat_3')</span></div>
                    <div class="col mf-stat mt-3 mt-md-0"><strong>100%</strong><span>@lang('locale.home_stat_4')</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ SERVICES ============ --}}
    <section class="mf-section" id="services">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 40rem">
                <span class="mf-eyebrow">@lang('locale.home_what_we_do')</span>
                <h2 class="mf-title">@lang('locale.our_services')</h2>
                <p class="mf-sub mx-auto">@lang('locale.home_services_sub')</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($services as $i => $s)
                    <div class="col-12 col-md-6 col-lg-4 reveal d{{ $i % 3 }}">
                        <article class="mf-service">
                            <div class="mf-ico {{ $i % 2 ? 'o' : '' }}"><i class="bi {{ $s['icon'] }}"></i></div>
                            <h3>@lang($s['title'])</h3>
                            <p>@lang($s['text'])</p>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ ÉTABLISSEMENTS ============ --}}
    <section class="mf-section alt" id="etablissements">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-5 reveal">
                <div>
                    <span class="mf-eyebrow">@lang('locale.home_stay')</span>
                    <h2 class="mf-title mb-0">@lang('locale.our_rooms')</h2>
                </div>
                <a href="{{ route('public.rooms.index') }}" class="mf-btn mf-btn-outline">
                    @lang('locale.see_all') <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            @if($rooms->isEmpty())
                <div class="text-center text-muted py-5">@lang('locale.home_no_rooms')</div>
            @else
                <div class="row g-4">
                    @foreach($rooms as $i => $item)
                        @php
                            $url = route('rooms.book', [$item->id, $item->name]);
                            $label = optional($item->establishment)->name;
                            $fallback = asset('images/logo.webp');
                        @endphp
                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 reveal d{{ $i % 3 }}">
                            <article class="mf-room">
                                <div class="media">
                                    @if($label)<span class="tag">{{ $label }}</span>@endif
                                    <img src="{{ asset($item->front) }}" alt="{{ $item->name }}" loading="lazy"
                                         onerror="this.onerror=null;this.src='{{ $fallback }}';this.classList.add('fallback')">
                                    @if($item->back)
                                        <img class="back" src="{{ asset($item->back) }}" alt="" loading="lazy" onerror="this.remove()">
                                    @endif
                                </div>
                                <div class="body">
                                    <h3><a href="{{ $url }}">{{ $item->name }}</a></h3>
                                    @if($item->address)<div class="addr"><i class="bi bi-geo-alt"></i> {{ $item->address }}</div>@endif
                                    <div class="foot">
                                        <span class="price">{{ moneyformat($item->price, session('currency')) }}</span>
                                        <span class="go"><i class="bi bi-arrow-right"></i></span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- ============ BANDEAU ============ --}}
    <div class="mf-marquee" aria-hidden="true">
        <div class="track">
            @for($k = 0; $k < 8; $k++)
                <span>{{ config('app.name') }}, @lang('locale.home_marquee')</span>
            @endfor
        </div>
    </div>

    {{-- ============ ÉQUIPE ============ --}}
    <section class="mf-section" id="equipe">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 40rem">
                <span class="mf-eyebrow">@lang('locale.home_people')</span>
                <h2 class="mf-title">@lang('locale.our_team')</h2>
            </div>
            <div class="mf-team">
                @foreach($team as $i => [$file, $role])
                    <div class="mf-member reveal d{{ $i % 3 }}">
                        <div class="ph">
                            <img src="{{ asset('images/team/' . $file) }}" alt="{{ $role }}" loading="lazy">
                        </div>
                        <h3>{{ $role }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ ATOUTS ============ --}}
    <section class="mf-section alt py-5">
        <div class="container">
            <div class="row g-4">
                @foreach([
                    ['bi-patch-check', 'home_why_1'], ['bi-headset', 'home_why_2'],
                    ['bi-shield-lock', 'home_why_3'], ['bi-lightning-charge', 'home_why_4'],
                ] as $i => [$ic, $key])
                    <div class="col-12 col-sm-6 col-lg-3 reveal d{{ $i % 3 }}">
                        <div class="mf-why">
                            <span class="ico"><i class="bi {{ $ic }}"></i></span>
                            <div>
                                <h4>@lang('locale.' . $key . '_t')</h4>
                                <p>@lang('locale.' . $key . '_d')</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ APPEL À L'ACTION ============ --}}
    <section class="mf-section">
        <div class="container">
            <div class="mf-cta reveal">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-8">
                        <h2 class="mb-2">@lang('locale.home_cta_title')</h2>
                        <p class="mb-0">@lang('locale.home_cta_text')</p>
                    </div>
                    <div class="col-lg-4 d-flex flex-column flex-sm-row flex-lg-column gap-3 justify-content-lg-end">
                        <a href="tel:+224610421717" class="mf-btn mf-btn-primary"><i class="bi bi-telephone-fill"></i> +224 610 42 17 17</a>
                        <a href="{{ route('public.rooms.index') }}" class="mf-btn mf-btn-ghost">@lang('locale.home_cta_book')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
