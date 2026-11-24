<x-guest-layout>
    <header class="mf-pagehead">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb mf-crumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('locale.menu_home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('locale.our_rooms')</li>
                </ol>
            </nav>
            <h1>@lang('locale.rooms_title')</h1>
            <p>@lang('locale.rooms_subtitle')</p>
        </div>
    </header>

    <section class="mf-section pt-4">
        <div class="container">
            <div class="mf-filters">
                <div class="mf-chips" role="group" aria-label="@lang('locale.filter_category')" id="categoryChips">
                    <button type="button" class="active" data-category="">@lang('locale.filter_all')</button>
                    @foreach (['SEJOUR', 'LOCATION', 'VENTE', 'BAILLE'] as $cat)
                        <button type="button" data-category="{{ $cat }}">{{ $cat }}</button>
                    @endforeach
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <select id="establishment" class="form-select mf-select" aria-label="@lang('locale.filter_establishment')">
                        <option value="">@lang('locale.filter_establishment') — @lang('locale.filter_all')</option>
                        @foreach ($establishments as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mf-icon-btn" id="resetFilters" title="@lang('locale.rooms_reset')">
                        <i class="bi bi-arrow-counterclockwise"></i><span class="d-none d-md-inline">@lang('locale.rooms_reset')</span>
                    </button>
                </div>
            </div>

            <div class="row g-4" id="content" aria-live="polite">
                @include('rooms-search', ['rooms' => $rooms])
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        (function () {
            var content = document.getElementById('content'),
                select = document.getElementById('establishment'),
                chips = document.querySelectorAll('#categoryChips button'),
                category = '';

            function load(page) {
                var q = new URLSearchParams();
                if (category) q.set('category', category);
                if (select.value) q.set('type', select.value);
                if (page) q.set('page', page);
                content.style.opacity = .45;
                fetch("{{ route('rooms.filter') }}?" + q.toString(), { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(function (r) { return r.text(); })
                    .then(function (html) { content.innerHTML = html; })
                    .catch(function () {})
                    .finally(function () { content.style.opacity = 1; });
            }

            chips.forEach(function (b) {
                b.addEventListener('click', function () {
                    chips.forEach(function (x) { x.classList.remove('active'); });
                    b.classList.add('active');
                    category = b.dataset.category;
                    load();
                });
            });
            select.addEventListener('change', function () { load(); });
            document.getElementById('resetFilters').addEventListener('click', function () {
                select.value = ''; category = '';
                chips.forEach(function (x, i) { x.classList.toggle('active', i === 0); });
                load();
            });
            content.addEventListener('click', function (e) {
                var a = e.target.closest('.mf-pager a');
                if (!a) return;
                e.preventDefault();
                if (a.classList.contains('disabled') || a.classList.contains('active')) return;
                load(a.dataset.page);
                window.scrollTo({ top: content.offsetTop - 160, behavior: 'smooth' });
            });
        })();
    </script>
    @endpush
</x-guest-layout>
