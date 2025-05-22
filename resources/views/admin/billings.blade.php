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
                        <li class="breadcrumb-item active">@lang('locale.billing', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.billing', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#billing-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('locale.billing', ['suffix'=>'s'])
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#billing-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="billing-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.ref')</th>
                                    <th class="text-white">@lang('locale.quotation', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.amount')</th>
                                    <th class="text-white">@lang('locale.remain')</th>
                                    <th class="text-white">@lang('locale.observations')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($billings as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $item->ref }}</td>
                                        <td>{{ $item->quotation->title }}</td>
                                        <td>{{ moneyformat($item->amount) }}</td>
                                        <td>{{ moneyformat($item->remain) }}</td>
                                        <td>{{ $item->observations }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#edit-billing{{ $item->id }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('billings.destroy', $item->id) }}" method="post" style="display: inline-block">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                        <x-edit-billing :billing="$item"></x-edit-billing>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="billing-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('billings.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.quotation', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <select name="quotation_id" class="form-control select2" data-toggle="select2" required>
                                                        <option value=''>@lang('locale.select')</option>
                                                        @foreach($quotations as $item)
                                                        <option value="{{ $item->id }}" title="{{ $item->cost }}">{{ $item->title." - #".$item->ref }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="amount" class="col-col-form-label col-form-label-sm">@lang('locale.amount') <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm" id="amount" name="amount" placeholder="@lang('locale.amount')" required>
                                                </div>                                    
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">   
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.checkout', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <select name="checkout_id" class="form-control select2" data-toggle="select2" required>
                                                        <option value=''>@lang('locale.select')</option>
                                                        @foreach($checkouts as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name." - ".$item->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="remain" class="col-col-form-label col-form-label-sm">@lang('locale.remain') <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm" name="remain" id="remain" placeholder="@lang('locale.remain')" required>
                                                </div>                                
                                            </div>
                                            <div class="col-12">   
                                                <div class="mb-2">
                                                    <label for="observations" class="col-col-form-label col-form-label-sm">@lang('locale.observations')</label>
                                                    <textarea class="form-control form-control-sm" name="observations" id="observations" placeholder="@lang('locale.observations')"></textarea>
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

