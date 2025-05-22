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
                        <li class="breadcrumb-item active">@lang('locale.equipment', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.equipment', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-primary float-end"><a href="{{ route('equipments.pdf') }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.equipment', ['suffix'=>'s'])</a></div>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#equipment-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('locale.equipment', ['suffix'=>'s'])
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#equipment-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="equipment-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.equipment', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.price')</th>
                                    <th class="text-white">@lang('locale.qty')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($equipments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ moneyformat($item->price) }}</td>
                                        <td>{{ $item->qty." ".$item->unit }}</td>
                                        <td>
                                            <a role="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-equipment{{ $item->id }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('equipments.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <x-edit-equipment :equipment="$item"></x-edit-equipment>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="equipment-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('equipments.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="equipment" class="col-form-label col-form-label-sm">@lang('locale.equipment', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control form-control-sm" id="equipment" placeholder="@lang('locale.equipment', ['suffix'=>''])" required>
                                                </div> 
                                            </div> 
                                             <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="price" class="col-form-label col-form-label-sm">@lang('locale.price') <span class="text-danger">*</span></label>
                                                    <input type="number" min="500" name="price" class="form-control form-control-sm" id="price" placeholder="@lang('locale.price')" required>
                                                </div>                  
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="qty" class="col-form-label col-form-label-sm">@lang('locale.qty') <span class="text-danger">*</span></label>
                                                    <input type="number" min="1" name="qty" class="form-control form-control-sm" id="qty" placeholder="@lang('locale.qty')" required>
                                                </div> 
                                            </div> 
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="unit" class="col-form-label col-form-label-sm">@lang('locale.unit') <span class="text-danger">*</span></label>
                                                    <input type="text" name="unit" class="form-control form-control-sm" id="unit" placeholder="@lang('locale.unit')" required>
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





