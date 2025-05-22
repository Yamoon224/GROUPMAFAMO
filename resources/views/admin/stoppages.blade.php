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
                        <li class="breadcrumb-item active">@lang('locale.stoppage', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.stoppage', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    {{-- <div class="ribbon ribbon-primary float-end"><a href="{{ route('stoppages.pdf') }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.stoppage', ['suffix'=>'s'])</a></div> --}}
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#stoppage-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('locale.stoppage', ['suffix'=>'s'])
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#stoppage-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="stoppage-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.type', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.employee', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.reason')</th>
                                    <th class="text-white">@lang('locale.began_at')</th>
                                    <th class="text-white">@lang('locale.ended_at')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($stoppages as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{  $item->type }}</td>
                                        <td>{{ $item->employee->name." - #".$item->employee->ref }}</td>
                                        <td>{{ $item->reason }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->began_at)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->ended_at)) }}</td>
                                        <td>
                                            <a role="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-stoppage{{ $item->id }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('stoppages.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <x-edit-stoppage :stoppage="$item" :employees="$employees"></x-edit-stoppage>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="stoppage-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('stoppages.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.employee', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <select name="employee_id" class="form-control select2" data-toggle="select2" required>
                                                        <option value=''>@lang('locale.select')</option>
                                                        @foreach($employees as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name." - #".$item->ref }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>      
                                                <div class="mb-2">
                                                    <label for="beganat" class="col-form-label col-form-label-sm">@lang('locale.began_at')</label>
                                                    <input type="date" name="began_at" value="{{ date('Y-m-d') }}" class="form-control" id="beganat" placeholder="@lang('locale.began_at')">
                                                </div>             
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.type', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <select name="type" class="form-control" required>
                                                        <option value=''>@lang('locale.select')</option>
                                                        @foreach(['CONGE','LICENCEMENT','SUSPENSION'] as $item)
                                                        <option>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>  
                                                <div class="mb-2">
                                                    <label for="endedat" class="col-form-label col-form-label-sm">@lang('locale.ended_at')</label>
                                                    <input type="date" name="ended_at" class="form-control" id="endedat" placeholder="@lang('locale.ended_at')">
                                                </div>  
                                            </div> 
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="reason" class="col-form-label col-form-label-sm">@lang('locale.reason') <span class="text-danger">*</span></label>
                                                    <textarea name="reason" class="form-control" id="reason" placeholder="@lang('locale.reason')" required></textarea>
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





