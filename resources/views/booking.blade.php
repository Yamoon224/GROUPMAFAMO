<x-guest-layout>
    <section class="mf-section">
        <div class="container">
            <div class="mf-done mx-auto text-center">
                <div class="check"><i class="bi bi-check-lg"></i></div>
                <h1>@lang('locale.booking_done')</h1>
                <p class="text-muted mb-1">{{ session('message') }}</p>
                <p class="text-muted mb-4">@lang('locale.booking_thanks')</p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    @if(session()->has('booking') && session('sejour'))
                        <a class="mf-btn mf-btn-primary" href="{{ route('bookings.receipt', session('booking')) }}"><i class="bi bi-receipt"></i> @lang('locale.billing', ['suffix'=>''])</a>
                    @endif
                    <a class="mf-btn mf-btn-outline" href="{{ route('home') }}">@lang('locale.booking_back_home')</a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
