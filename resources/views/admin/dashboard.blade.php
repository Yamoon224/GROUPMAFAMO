<x-app-layout>
    @pushOnce('links')
    @endPushOnce
    
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="d-flex">
                        <div class="input-group">
                            <span class="input-group-text bg-primary border-primary text-white">@lang('locale.from')</span>
                            <input type="date" class="form-control form-control-light" name="from">
                        </div>
                        <div class="input-group ms-2">
                            <span class="input-group-text bg-primary border-primary text-white">@lang('locale.to')</span>
                            <input type="date" class="form-control form-control-light" name="to">
                        </div>
                    </div>
                </div>
                <h4 class="page-title">@lang('locale.dashboard')</h4>
            </div>
        </div>
    </div>

    <div class="row" id="data-content"></div>

    @pushOnce('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.6.0/echarts.min.js"></script>
    <script>
        $('#data-content').load("{{ route('databoard') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), '_method':'GET', 'from':'', 'to':''});
        $('input[name="from"]').on('change', function () {
            let from = $(this).val(),
                to = $('input[name="to"]').val();
            $('#data-content').load("{{ route('databoard') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), '_method':'GET', 'from':from, 'to':to});
        })

        $('input[name="to"]').on('change', function () {
            let to = $(this).val(),
                from = $('input[name="from"]').val();
            $('#data-content').load("{{ route('databoard') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), '_method':'GET', 'from':from, 'to':to});
        })
    </script>
    @endPushOnce
</x-app-layout>
