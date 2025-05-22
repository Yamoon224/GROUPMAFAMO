<x-guest-layout>
    <section class="py-md-6 py-4">
        <div class="container">
            <div class="row">
                <!--Filter-->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <!--Filter-->
                            <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap">
                                <div class="col-lg-3 col-xxl-2 col-6 col-md-4">
                                    <select name="type_id" data-choices data-choices-classname="form-select" aria-label="Default select example">
                                        <option value=''>@lang('locale.select')</option>
                                        @foreach ($types as $item)
                                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 col-xxl-2 col-6 col-md-4">
                                    <select name="category" data-choices data-choices-classname="form-select" aria-label="Default select example">
                                        <option value=''>@lang('locale.select')</option>
                                        @foreach (['SEJOUR', 'LOCATION', 'VENTE', 'BAILLE'] as $item)
                                        <option>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row gy-6 gx-4" id="content">
                        @foreach ($rooms as $item)
                        <x-room :room="$item"></x-room>
                        @endforeach
                        <!--Pagination-->
                        @if ($rooms->lastPage() > 1)
                        <div class="col-12 mt-4">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {{-- Lien "Previous" --}}
                                    <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $rooms->previousPageUrl() ?? '#' }}">Previous</a>
                                    </li>

                                    {{-- Liens numérotés --}}
                                    @for ($i = 1; $i <= $rooms->lastPage(); $i++)
                                        <li class="page-item {{ $rooms->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $rooms->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    {{-- Lien "Next" --}}
                                    <li class="page-item {{ !$rooms->hasMorePages() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $rooms->nextPageUrl() ?? '#' }}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $('select[name="category"]').on('change', function () {
            var category = $(this).children('option:selected').val(),
                type = $('select[name="type_id"]').children('option:selected').val();
            $('#content').load("{{ route('rooms.filter') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), 'category':category, 'type':type, '_method':'GET'});
        })
        $('select[name="type_id"]').on('change', function () {
            var type = $(this).children('option:selected').val(),
                category = $('select[name="category"]').children('option:selected').val();
            $('#content').load("{{ route('rooms.filter') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), 'category':category, 'type':type, '_method':'GET'});
        })
    </script>
    @endpush
</x-guest-layout>