<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#accountability" aria-expanded="false" aria-controls="accountability" class="side-nav-link">
        <i class="uil uil-books"></i>
        <span> @lang('locale.accountability') </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="accountability">
        <ul class="side-nav-second-level">
            <li><a href="{{ route('checkouts.index') }}">@lang('locale.checkout', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('billings.index') }}">@lang('locale.billing', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('cashflows.index') }}">@lang('locale.cashflow', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('payments.index') }}">@lang('locale.payment', ['suffix'=>'s'])</a></li>
        </ul>
    </div>
</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#booking" aria-expanded="false" aria-controls="booking" class="side-nav-link">
        <i class="uil uil-plane-departure"></i>
        <span> @lang('locale.booking', ['suffix'=>'s']) </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="booking">
        <ul class="side-nav-second-level">
            <li><a href="{{ route('establishments.index') }}">@lang('locale.establishment', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('rooms.index') }}">@lang('locale.room', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('bookings.index') }}">@lang('locale.booking', ['suffix'=>'s'])</a></li>
        </ul>
    </div>
</li>