<li class="side-nav-item">
    <a href="{{ route('employees.index') }}" class="side-nav-link">
        <i class="uil-users-alt"></i> <span>@lang('locale.employee', ['suffix'=>'s'])</span>
    </a>
</li>
<li class="side-nav-item">
    <a href="{{ route('partners.index') }}" class="side-nav-link">
        <i class="uil-users-alt"></i> <span>@lang('locale.customer', ['suffix'=>'s'])</span>
    </a>
</li>
<li class="side-nav-item">
    <a href="{{ route('quotations.index') }}" class="side-nav-link">
        <i class="uil uil-invoice"></i> <span>@lang('locale.quotation', ['suffix'=>'s'])</span>
    </a>
</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#secretarial" aria-expanded="false" aria-controls="secretarial" class="side-nav-link">
        <i class="uil uil-file-edit-alt"></i>
        <span> @lang('locale.secretarial') </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="secretarial">
        <ul class="side-nav-second-level">
            <li><a href="{{ route('appointments.index') }}">@lang('locale.appointment', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('correspondences.index') }}">@lang('locale.correspondence', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('equipments.index') }}">@lang('locale.equipment', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('dotations.index') }}">@lang('locale.dotation', ['suffix'=>'s'])</a></li>
            <li><a href="{{ route('stoppages.index') }}">@lang('locale.stoppage', ['suffix'=>'s'])</a></li>
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
