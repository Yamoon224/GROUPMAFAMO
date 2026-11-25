@php
    $photos = collect([$room->front, $room->back])
        ->merge($room->images->pluck('link'))
        ->filter()
        ->unique()
        ->values();
    $free = $room->status == 'LIBRE';
    $label = optional($room->establishment)->name;
@endphp

<x-guest-layout>
    <header class="mf-pagehead sm">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mf-crumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('locale.menu_home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('public.rooms.index') }}">@lang('locale.our_rooms')</a></li>
                    @if($label)<li class="breadcrumb-item">{{ $label }}</li>@endif
                    <li class="breadcrumb-item active" aria-current="page">{{ $room->category }}</li>
                </ol>
            </nav>
        </div>
    </header>

    <section class="mf-section pt-4">
        <div class="container">
            <a href="{{ route('public.rooms.index') }}" class="mf-back mb-3 d-inline-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> @lang('locale.room_back')
            </a>

            <div class="row g-4 g-xl-5">
                {{-- Galerie --}}
                <div class="col-lg-7">
                    <div class="mf-gallery">
                        <div class="main">
                            @foreach($photos as $i => $src)
                                <img src="{{ asset($src) }}" alt="{{ $room->name }} — {{ $i + 1 }}" class="{{ $i === 0 ? 'on' : '' }}"
                                     onerror="this.onerror=null;this.src='{{ asset('images/logo.webp') }}';this.classList.add('fallback')">
                            @endforeach
                            @if($photos->isEmpty())
                                <img src="{{ asset('images/logo.webp') }}" alt="" class="on fallback">
                            @endif
                            @if($photos->count() > 1)
                                <button type="button" class="nav prev" aria-label="Previous"><i class="bi bi-chevron-left"></i></button>
                                <button type="button" class="nav next" aria-label="Next"><i class="bi bi-chevron-right"></i></button>
                            @endif
                        </div>
                        @if($photos->count() > 1)
                            <div class="thumbs" role="tablist" aria-label="@lang('locale.room_photos')">
                                @foreach($photos as $i => $src)
                                    <button type="button" class="{{ $i === 0 ? 'on' : '' }}" data-i="{{ $i }}" aria-label="Photo {{ $i + 1 }}">
                                        <img src="{{ asset($src) }}" alt="" loading="lazy" onerror="this.remove()">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="mf-panel mt-4">
                        <h2 class="h5 fw-bold mb-3">@lang('locale.room_description')</h2>
                        <p class="text-muted mb-0" style="white-space: pre-line">{{ $room->description ?: __('locale.room_no_description') }}</p>
                    </div>
                </div>

                {{-- Détails + réservation --}}
                <div class="col-lg-5">
                    <div class="mf-book">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="mf-badge blue">{{ $room->category }}</span>
                            <span class="mf-badge {{ $free ? 'green' : 'red' }}">
                                <i class="bi bi-{{ $free ? 'check-circle-fill' : 'x-circle-fill' }}"></i>
                                {{ $free ? __('locale.room_available') : __('locale.room_unavailable') }}
                            </span>
                        </div>
                        <h1 class="h3 fw-bold mb-1">{{ $room->name }}</h1>
                        @if($room->address)<p class="text-muted mb-3"><i class="bi bi-geo-alt-fill text-warning"></i> {{ $room->address }}</p>@endif

                        <div class="mf-price">
                            <small>@lang('locale.room_per')</small>
                            <strong>{{ moneyformat($room->price, session('currency')) }}</strong>
                        </div>

                        <hr class="my-4">
                        <h2 class="h6 fw-bold mb-1">@lang('locale.room_book_title')</h2>
                        <p class="small text-muted mb-3"><i class="bi bi-person-check text-success"></i> @lang('locale.booking_no_account')</p>
                        @if($errors->any())
                            <div class="alert alert-danger small py-2">
                                <ul class="mb-0 ps-3">@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('bookings.store') }}" class="mf-form">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $room->price }}" required>
                            <input type="hidden" name="room_id" value="{{ $room->id }}" required>
                            <div class="row g-3">
                                @if($room->category == 'SEJOUR')
                                    <div class="col-sm-6">
                                        <label class="form-label">@lang('locale.began_at') <span class="text-danger">*</span></label>
                                        <input type="date" name="begin_date" value="{{ old('begin_date') }}" class="form-control" min="{{ date('Y-m-d') }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">@lang('locale.ended_at') <span class="text-danger">*</span></label>
                                        <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control" min="{{ date('Y-m-d') }}" required>
                                    </div>
                                @else
                                    <div class="col-12"><div class="mf-note"><i class="bi bi-info-circle-fill"></i> @lang('locale.room_contact_note')</div></div>
                                @endif
                                <div class="col-sm-6">
                                    <label class="form-label">@lang('locale.customer', ['suffix' => '']) <span class="text-danger">*</span></label>
                                    <input type="text" name="customer" value="{{ old('customer') }}" class="form-control" autocomplete="name" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">@lang('locale.nationality') <span class="text-danger">*</span></label>
                                    <input type="text" name="nationality" value="{{ old('nationality') }}" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">@lang('locale.phone') <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" autocomplete="tel" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">@lang('locale.email')</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" autocomplete="email">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">@lang('locale.identifiant') <span class="text-danger">*</span></label>
                                    <input type="text" name="identifiant" value="{{ old('identifiant') }}" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">@lang('locale.type_identifiant') <span class="text-danger">*</span></label>
                                    <select name="type_identifiant" class="form-select" required>
                                        <option value="">@lang('locale.select')</option>
                                        @foreach(['CNI', 'PASSEPORT', 'CARTE CONSULAIRE', 'AUTRES'] as $item)
                                            <option>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="mf-btn mf-btn-primary w-100" {{ $free ? '' : 'disabled' }}>
                                        <i class="bi bi-calendar2-check"></i> @lang('locale.submit')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($rooms->isNotEmpty())
        <section class="mf-section alt">
            <div class="container">
                <div class="mb-4">
                    <span class="mf-eyebrow">{{ $room->category }}</span>
                    <h2 class="mf-title mb-0">@lang('locale.similar_rooms')</h2>
                </div>
                <div class="row g-4">
                    @foreach ($rooms as $item)
                        <x-room :room="$item"></x-room>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @push('scripts')
    <script>
        (function () {
            var g = document.querySelector('.mf-gallery');
            if (!g) return;
            var imgs = g.querySelectorAll('.main img'),
                thumbs = g.querySelectorAll('.thumbs button'),
                cur = 0;
            function show(i) {
                if (!imgs.length) return;
                cur = (i + imgs.length) % imgs.length;
                imgs.forEach(function (im, k) { im.classList.toggle('on', k === cur); });
                thumbs.forEach(function (t, k) { t.classList.toggle('on', k === cur); });
            }
            thumbs.forEach(function (t) { t.addEventListener('click', function () { show(+t.dataset.i); }); });
            var p = g.querySelector('.prev'), n = g.querySelector('.next');
            if (p) p.addEventListener('click', function () { show(cur - 1); });
            if (n) n.addEventListener('click', function () { show(cur + 1); });
            g.setAttribute('tabindex', '0');
            g.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowLeft') show(cur - 1);
                if (e.key === 'ArrowRight') show(cur + 1);
            });
            var sx = 0, m = g.querySelector('.main');
            m.addEventListener('touchstart', function (e) { sx = e.touches[0].clientX; }, { passive: true });
            m.addEventListener('touchend', function (e) {
                var dx = e.changedTouches[0].clientX - sx;
                if (Math.abs(dx) > 40) show(cur + (dx < 0 ? 1 : -1));
            });
        })();
    </script>
    @endpush
</x-guest-layout>
