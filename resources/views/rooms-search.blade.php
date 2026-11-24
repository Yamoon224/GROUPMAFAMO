@forelse ($rooms as $item)
    <x-room :room="$item"></x-room>
@empty
    <div class="col-12">
        <div class="mf-empty">
            <i class="bi bi-search"></i>
            <p>@lang('locale.rooms_none')</p>
        </div>
    </div>
@endforelse

@if ($rooms->lastPage() > 1)
    <div class="col-12 mt-2">
        <nav class="mf-pager" aria-label="Pagination">
            <a class="{{ $rooms->onFirstPage() ? 'disabled' : '' }}" data-page="{{ $rooms->currentPage() - 1 }}" href="{{ $rooms->previousPageUrl() ?? '#' }}" aria-label="Previous"><i class="bi bi-chevron-left"></i></a>
            @for ($i = 1; $i <= $rooms->lastPage(); $i++)
                <a class="{{ $rooms->currentPage() == $i ? 'active' : '' }}" data-page="{{ $i }}" href="{{ $rooms->url($i) }}">{{ $i }}</a>
            @endfor
            <a class="{{ ! $rooms->hasMorePages() ? 'disabled' : '' }}" data-page="{{ $rooms->currentPage() + 1 }}" href="{{ $rooms->nextPageUrl() ?? '#' }}" aria-label="Next"><i class="bi bi-chevron-right"></i></a>
        </nav>
    </div>
@endif
