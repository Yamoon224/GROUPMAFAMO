<x-app-layout>
    @push('links')
    <link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('locale.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('locale.payment', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.payment', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{ route('payments.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="mb-2">
                                    <select name="year" class="form-select form-control-sm" required>
                                        @foreach(['2025'] as $item)
                                            <option {{ $item == date('y') ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="mb-2">
                                    <select name="month" class="form-select form-control-sm" required>
                                        @foreach(monthsofyear() as $key => $item)
                                            <option value="{{ $key+1 }}" {{ $key+1 == date('m') ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="mb-2">
                                    <select name="checkout" class="form-select form-control-sm" required>
                                        @foreach($checkouts as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" id="payment-content">
                <div class="card ribbon-box">
                    <div class="card-body">
                        <div class="ribbon ribbon-primary float-end">
                            <a href="{{ route('payments.pdf', ['year'=>date('Y'), 'month'=>date('m'), 'checkout'=>$checkouts->first()->id]) }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.salary', ['suffix'=>'s'])</a>
                        </div>
                        <ul class="nav nav-tabs nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#salaries-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    @lang('locale.salary', ['suffix'=>'s'])
                                </a>                            
                            </li>
                        </ul> 
                        <!-- end nav-->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="salaries-table">
                                <table id="scroll-vertical-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                    <thead class="bg-primary">
                                        <th class="text-white">#</th>
                                        <th class="text-white">@lang('locale.ref')</th>
                                        <th class="text-white">@lang('locale.employee', ['suffix'=>''])</th>
                                        <th class="text-white">@lang('locale.phone')</th>
                                        <th class="text-white">@lang('locale.position')</th>
                                        <th class="text-white">@lang('locale.brut')</th>
                                        <th class="text-white">@lang('locale.prime')</th>
                                        <th class="text-white">@lang('locale.status')</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $paidemployee = 0; $paidamount = 0;
                                            $notpaidemployee = 0; $notpaidamount = 0;
                                        @endphp

                                        @foreach ($employees as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>#{{ $item->ref }}</td>
                                            <td>{{ $item->gender.' '.$item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->position }}</td>
                                            <td><input type="number" name="salaries[{{ $item->id }}]" value="{{ $item->alreadyPayByMonth(date('m'), date('Y')) ? $item->alreadyPayByMonth(date('m'), date('Y'))->salary : $item->brut }}" {{ $item->alreadyPayByMonth(date('m'), date('Y')) ? 'readonly' : '' }} class="form-control form-control-sm" required></td>
                                            <td><input type="number" name="primes[{{ $item->id }}]" value="{{ $item->alreadyPayByMonth(date('m'), date('Y')) ? $item->alreadyPayByMonth(date('m'), date('Y'))->prime : $item->prime }}" {{ $item->alreadyPayByMonth(date('m'), date('Y')) ? 'readonly' : '' }} class="form-control form-control-sm" required></td>
                                            <td>
                                                @if (!$item->alreadyPayByMonth(date('m'), date('Y')))
                                                @php( $notpaidamount += $item->brut+$item->prime )
                                                @php( $notpaidemployee += 1 )
                                                <input type="checkbox" name="payments[{{ $item->id }}]" id="paid{{ $item->id }}" data-switch="success"/>
                                                <label for="paid{{ $item->id }}" data-on-label="@lang('locale.paid')" data-off-label="@lang('locale.no')"></label>
                                                @else
                                                @php( $paidamount += $item->alreadyPayByMonth(date('m'), date('Y'))->salary+$item->alreadyPayByMonth(date('m'), date('Y'))->prime )
                                                @php( $paidemployee += 1 )
                                                <div class="text-success">@lang('locale.paid') <i class="mdi mdi-check-decagram text-success"></i></div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">@lang('locale.paid') : {{ $paidemployee." => ".moneyformat($paidamount) }}</td>
                                            <td colspan="2">@lang('locale.notpaid') : {{ $notpaidemployee." => ".moneyformat($notpaidamount) }}</td>
                                            <td colspan="4">{{ moneyformat($paidamount)." / ".moneyformat($employees->sum('net')) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div> 
                        </div> 
                        <!-- end tab-content-->
                    </div> 
                    <!-- end card body-->
                </div> 
                <!-- end card -->
            </div>

            <div class="col-12">
                <button class="btn btn-soft-primary w-100">@lang('locale.submit')</button>
            </div>
        </div> 
    </form>
    <!-- end row-->

    @push('scripts')
    <!-- Datatables js -->
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- Datatable Demo Aapp js -->
    <script>
        $("#scroll-vertical-datatable").DataTable({
            scrollY:"350px",
            scrollCollapse:!0,
            paging:!1,
            language:{
                paginate:{
                    previous:"<i class='mdi mdi-chevron-left'>",
                    next:"<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback:function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        })

        $('select[name="month"]').on('change', function () {
            var month = $(this).children('option:selected').val(),
                checkout = $('select[name="checkout"]').children('option:selected').val(),
                year = $('select[name="year"]').children('option:selected').val();
            $('#payment-content').load("{{ route('payments.create') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), 'month':month, 'year':year, 'checkout':checkout, '_method':'GET'});
        })
        $('select[name="year"]').on('change', function () {
            var year = $(this).children('option:selected').val(),
                month = $('select[name="month"]').children('option:selected').val(),
                checkout = $('select[name="checkout"]').children('option:selected').val();
            $('#payment-content').load("{{ route('payments.create') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), 'month':month, 'year':year, 'checkout':checkout, '_method':'GET'});
        })
        $('select[name="checkout"]').on('change', function () {
            var checkout = $(this).children('option:selected').val(),
                month = $('select[name="month"]').children('option:selected').val();
                year = $('select[name="year"]').children('option:selected').val();
            $('#payment-content').load("{{ route('payments.create') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), 'month':month, 'year':year, 'checkout':checkout, '_method':'GET'});
        })
    </script>
    @endpush
</x-app-layout>

