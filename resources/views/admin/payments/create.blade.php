
<link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />


<div class="card ribbon-box">
    <div class="card-body">
        <div class="ribbon ribbon-primary float-end">
            <a href="{{ route('payments.pdf', compact('year', 'month', 'checkout')) }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.salary', ['suffix'=>'s'])</a>
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
                            <td><input type="number" name="salaries[{{ $item->id }}]" value="{{ $item->alreadyPayByMonth($month, $year) ? $item->alreadyPayByMonth($month, $year)->salary : $item->brut }}" {{ $item->alreadyPayByMonth($month, $year) ? 'readonly' : '' }} class="form-control form-control-sm" required></td>
                            <td><input type="number" name="primes[{{ $item->id }}]" value="{{ $item->alreadyPayByMonth($month, $year) ? $item->alreadyPayByMonth($month, $year)->prime : $item->prime }}" {{ $item->alreadyPayByMonth($month, $year) ? 'readonly' : '' }} class="form-control form-control-sm" required></td>
                            <td>
                                @if (!$item->alreadyPayByMonth($month, $year))
                                @php( $notpaidamount += $item->brut+$item->prime )
                                @php( $notpaidemployee += 1 )
                                <input type="checkbox" name="payments[{{ $item->id }}]" id="paid{{ $item->id }}" data-switch="success"/>
                                <label for="paid{{ $item->id }}" data-on-label="@lang('locale.paid')" data-off-label="No"></label>
                                @else
                                @php( $paidamount += $item->alreadyPayByMonth($month, $year)->salary+$item->alreadyPayByMonth($month, $year)->prime )
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
</script>