@php
    $url = route('rooms.book', [$room->id, $room->name]);
    $label = optional($room->establishment)->name;
@endphp
<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
    <article class="mf-room">
        <div class="media">
            <span class="tag">{{ $room->category }}</span>
            <img src="{{ asset($room->front) }}" alt="{{ $room->name }}" loading="lazy"
                 onerror="this.onerror=null;this.src='{{ asset('images/logo.webp') }}';this.classList.add('fallback')">
            @if($room->back)
                <img class="back" src="{{ asset($room->back) }}" alt="" loading="lazy" onerror="this.remove()">
            @endif
        </div>
        <div class="body">
            @if($label)<div class="addr text-uppercase fw-semibold" style="font-size:.72rem;letter-spacing:.05em">{{ $label }}</div>@endif
            <h3><a href="{{ $url }}">{{ $room->name }}</a></h3>
            @if($room->address)<div class="addr"><i class="bi bi-geo-alt"></i> {{ $room->address }}</div>@endif
            <div class="foot">
                <span class="price">{{ moneyformat($room->price, session('currency')) }}</span>
                <span class="go"><i class="bi bi-arrow-right"></i></span>
            </div>
        </div>
    </article>
</div>
