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
                        <li class="breadcrumb-item active">@lang('locale.appointment', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.appointment', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-primary float-end"><a href="{{ route('appointments.pdf') }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.appointment', ['suffix'=>'s'])</a></div>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#appointment-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('locale.appointment', ['suffix'=>'s'])
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#appointment-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="appointment-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.company')</th>
                                    <th class="text-white">@lang('locale.visitor')</th>
                                    <th class="text-white">@lang('locale.phone')</th>
                                    <th class="text-white">@lang('locale.appointment_date')</th>
                                    <th class="text-white">@lang('locale.observations')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->company ?? 'PARTICULIER' }}</td>
                                        <td>{{ $item->visitor }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->expected_at)) }} : </td>
                                        <td>[{{ $item->began_at.' - '.$item->ended_at }}]</td>
                                        <td>{{ $item->observations }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-soft-primary" href="{{ route('appointments.edit', $item->id) }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('appointments.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="appointment-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('appointments.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="company" class="col-form-label col-form-label-sm">@lang('locale.company')</label>
                                                    <input type="text" name="company" class="form-control form-control-sm" id="company" placeholder="@lang('locale.company')">
                                                </div>          
                                                <div class="mb-2">
                                                    <label for="phone" class="col-form-label col-form-label-sm">@lang('locale.phone') <span class="text-danger">*</span></label>
                                                    <input type="tel" name="phone" class="form-control form-control-sm" id="phone" placeholder="@lang('locale.phone')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="began_at" class="col-form-label col-form-label-sm">@lang('locale.began_at') <span class="text-danger">*</span></label>
                                                    <input type="time" name="began_at" class="form-control form-control-sm" id="began_at" placeholder="@lang('locale.began_at')" required>
                                                </div>                          
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="visitor" class="col-form-label col-form-label-sm">@lang('locale.visitor') <span class="text-danger">*</span></label>
                                                    <input type="text" name="visitor" class="form-control form-control-sm" id="visitor" placeholder="@lang('locale.visitor')" required>
                                                </div>                                                  
                                                <div class="mb-2">
                                                    <label for="expected_at" class="col-form-label col-form-label-sm">@lang('locale.appointment_date') <span class="text-danger">*</span></label>
                                                    <input type="date" name="expected_at" class="form-control form-control-sm" id="expected_at" value="{{ date('Y-m-d') }}" placeholder="@lang('locale.appointment_date')" required>
                                                </div> 
                                                <div class="mb-2">
                                                    <label for="ended_at" class="col-form-label col-form-label-sm">@lang('locale.ended_at') <span class="text-danger">*</span></label>
                                                    <input type="time" name="ended_at" class="form-control form-control-sm" id="ended_at" placeholder="@lang('locale.ended_at')" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="observations" class="col-form-label col-form-label-sm">@lang('locale.observations')</label>
                                                    <textarea name="observations" class="form-control form-control-sm" id="observations" placeholder="@lang('locale.observations')"></textarea>
                                                </div>	                                  
                                            </div>      
                                            <div class="col-12">
                                                <button class="btn btn-block w-100 btn-soft-primary">@lang('locale.submit')</button>    
                                            </div>                   	
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                        <!-- end preview-->
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
    {{-- <script src="{{ asset('assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js') }}"></script> --}}

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



