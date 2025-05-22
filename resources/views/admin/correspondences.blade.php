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
                        <li class="breadcrumb-item active">@lang('locale.correspondence', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.correspondence', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-primary float-end"><a href="{{ route('correspondences.pdf') }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.correspondence', ['suffix'=>'s'])</a></div>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#correspondence-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('locale.correspondence', ['suffix'=>'s'])
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#correspondence-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="correspondence-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.created_at')</th>
                                    <th class="text-white">@lang('locale.type', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.correspondent')</th>
                                    <th class="text-white">@lang('locale.object')</th>
                                    <th class="text-white">@lang('locale.message')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($correspondences as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->correspondent }}</td>
                                        <td>{{ $item->object }}</td>
                                        <td>{{ $item->message }} : </td>
                                        <td>
                                            <a role="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-correspondence{{ $item->id }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('correspondences.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <x-edit-correspondence :correspondence="$item"></x-edit-correspondence>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="correspondence-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('correspondences.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.type', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <select name="type" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['ENTRANT', 'SORTANT'] as  $item)
                                                            <option>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="correspondent" class="col-form-label col-form-label-sm">@lang('locale.correspondent') <span class="text-danger">*</span></label>
                                                    <input type="text" name="correspondent" class="form-control form-control-sm" id="correspondent" placeholder="@lang('locale.correspondent')">
                                                </div>  
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="object" class="col-form-label col-form-label-sm">@lang('locale.object') <span class="text-danger">*</span></label>
                                                    <input type="text" name="object" class="form-control form-control-sm" id="object" placeholder="@lang('locale.object')">
                                                </div>   
                                                <div class="mb-2">
                                                    <label for="message" class="col-form-label col-form-label-sm">@lang('locale.message') <span class="text-danger">*</span></label>
                                                    <textarea name="message" class="form-control form-control-sm" id="message" placeholder="@lang('locale.observations')" required></textarea>
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



