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
                        <li class="breadcrumb-item active">@lang('locale.booking', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.booking', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    {{-- <div class="ribbon ribbon-primary float-end"><a href="{{ route('bookings.pdf') }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.room', ['suffix'=>'s'])</a></div> --}}
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#room-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil-table"></i> @lang('locale.table')
                            </a>                            
                        </li>
                    </ul> 
                    <div class="tab-content">
                        <div class="tab-pane show active" id="room-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.establishment', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.room', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.customer', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.phone')</th>
                                    <th class="text-white">@lang('locale.email')</th>
                                    <th class="text-white">@lang('locale.amount', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.delay')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->room->establishment->establishment }}</td>
                                        <td>{{ $item->room->name }}</td>
                                        <td>{{ $item->customer }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ moneyformat($item->amount - $item->discount) }}</td>
                                        <td>@lang('locale.from') {{ $item->begin_at ?? '---' }} @lang('locale.to') {{ $item->end_at ?? '---' }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-soft-info" href="{{ route('bookings.show', $item->id) }}" style="display: inline-block"><i class="uil uil-eye"></i></a>
                                            <a class="btn btn-sm btn-soft-primary" href="{{ route('bookings.edit', $item->id) }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('bookings.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div> 
                    <!-- end tab-content-->
                </div> 
                <!-- end card body-->
            </div> 
            <!-- end card -->
        </div>
        <!-- end col-->
    </div> 
    <!-- end row-->

    @push('scripts')
    <!-- Datatables js -->
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- Datatable Demo Aapp js -->
    <script>
        $("#scroll-horizontal-datatable").DataTable({
            scrollX:!0,
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
    @endpush
</x-app-layout>





