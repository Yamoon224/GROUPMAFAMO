<div class="col-xl-3 col-lg-3 col-md-4 col-6">
    <div class="product-card">
        <div class=" text-center product-card-img mb-2">
            <a href="{{ route('rooms.book', [$room->id, $room->name]) }}">
                <img src="{{ asset($room->front) }}" alt="PHOTO I" class="img-fluid">
                <img src="{{ asset($room->back) }}" alt="PHOTO II" class="img-fluid product-img-hover">
            </a>
            <div class="product-card-btn">
                <a href="{{ route('rooms.book', [$room->id, $room->name]) }}" class="btn btn-primary btn-icon btn-sm animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye animate-target" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                    </svg>
                </a>
            </div>
            <div class="position-absolute top-0 p-2 px-3 d-flex flex-column gap-2 align-items-start">
                <span class="badge bg-{{ $room->category == 'SEJOUR' ? 'info' : ($room->category == 'LOCATION' ? 'primary' : ($room->category == 'VENTE' ? 'success' : 'warning')) }}">{{ $room->category }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="small fw-medium text-uppercase">{{ $room->type->type }} / {{ $room->address }}</span>
        </div>
        <div class="mb-2">
            <h3 class="fs-6 mb-0 product-heading d-block text-truncate"><a href="{{ route('rooms.book', [$room->id, $room->name]) }}">{{ $room->name }}</a></h3>
            <p class="mb-0 lh-1 text-dark fw-semibold">{{ moneyformat($room->price, session('currency')) }}</p>
        </div>
    </div>
</div>