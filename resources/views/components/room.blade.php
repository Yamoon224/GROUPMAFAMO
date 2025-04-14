<div class="col-xl-3 col-lg-3 col-md-4 col-6">
    <div class="product-card">
        <div class=" text-center product-card-img mb-4">
            <a href="{{ route('rooms.book', [$room->id, $room->name]) }}">
                <img src="{{ asset($room->front) }}" alt="PHOTO I" class="img-fluid">
                <img src="{{ asset($room->back) }}" alt="PHOTO II" class="img-fluid product-img-hover">
            </a>
            <div class="product-card-btn">
                <button type="button" class="btn btn-primary btn-icon btn-sm animate-pulse " data-bs-toggle="modal" data-bs-target="#quickViewModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye animate-target" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                    </svg>
                </button>
            </div>
            <div class="position-absolute top-0 p-2 px-3 d-flex flex-column gap-2 align-items-start">
                <span class="badge bg-{{ $room->category == 'SEJOUR' ? 'info' : ($room->category == 'LOCATION' ? 'primary' : ($room->category == 'VENTE' ? 'success' : 'warning')) }}">{{ $room->category }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="small fw-medium text-uppercase">{{ $room->type->type }}</span>
            {{-- <div class="d-flex gap-3 align-items-center">
                <span class="">
                    4.3
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill align-baseline text-warning" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                </span>
                <button type="button"
                    class="btn btn-light bg-transparent border-0 p-0 animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart animate-target" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                    </svg>
                </button>
            </div> --}}
        </div>
        <div class="mb-3">
            <h3 class="fs-6 mb-0 product-heading d-inline-block text-truncate"><a href="{{ route('rooms.book', [$room->id, $room->name]) }}">{{ $room->name }}</a></h3>
            <p class="mb-0 lh-1 text-dark fw-semibold">{{ moneyformat($room->price, session('currency')) }}</p>
        </div>
    </div>
</div>