<footer class="mf-footer" id="contact">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5">
                <a href="{{ route('home') }}" class="brand d-inline-block mb-3">
                    <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }}">
                </a>
                <p class="pe-lg-5 mb-0">@lang('locale.footer_about')</p>
            </div>
            <div class="col-6 col-lg-3">
                <h5>@lang('locale.footer_links')</h5>
                <ul>
                    <li><a href="{{ route('home') }}#services">@lang('locale.our_services')</a></li>
                    <li><a href="{{ route('public.rooms.index') }}">@lang('locale.our_rooms')</a></li>
                    <li><a href="{{ route('home') }}#equipe">@lang('locale.our_team')</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-4">
                <h5>@lang('locale.menu_contact')</h5>
                <ul>
                    <li><i class="bi bi-geo-alt-fill text-warning me-2"></i>Conakry, Guinée</li>
                    <li><a href="tel:+224610421717"><i class="bi bi-telephone-fill text-warning me-2"></i>+224 610 42 17 17</a></li>
                </ul>
            </div>
        </div>
        <div class="bottom d-flex flex-column flex-md-row justify-content-between gap-2">
            <span>© {{ date('Y') }} {{ config('app.name') }}. @lang('locale.footer_rights')</span>
            <span>@lang('locale.footer_by') <a href="https://editosyste.jss-gn.com/" target="_blank" rel="noopener">EDITOSYSTEM</a></span>
        </div>
    </div>
</footer>

<button type="button" class="mf-top" aria-label="Haut de page"><i class="bi bi-arrow-up"></i></button>
