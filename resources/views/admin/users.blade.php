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
                        <li class="breadcrumb-item active">@lang('locale.user', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.user', ['suffix'=>'s'])</h4>
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
                            <a href="#user-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('locale.user', ['suffix'=>'s'])
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#user-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="user-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.group', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.fullname')</th>
                                    <th class="text-white">@lang('locale.phone')</th>
                                    <th class="text-white">@lang('locale.email')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->group->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#edit-user{{ $item->id }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            @if ($item->group_id != 1)
                                            <form action="{{ route('users.destroy', $item->id) }}" method="post" style="display: inline-block">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                        <x-edit-user :user="$item" :groups="$groups"></x-edit-user>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="user-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('users.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="fullname" class="col-col-form-label col-form-label-sm">@lang('locale.fullname') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="fullname" name="name" placeholder="@lang('locale.fullname')" required>
                                                </div>     
                                                <div class="mb-2">
                                                    <label for="email" class="col-col-form-label col-form-label-sm">@lang('locale.email') <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="@lang('locale.email')" required>
                                                </div>   
                                                <div class="mb-2">
                                                    <label for="password" class="col-col-form-label col-form-label-sm">@lang('locale.password')</label>
                                                    <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="@lang('locale.password')">
                                                </div>                                  
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.group', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <select name="group_id" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach($groups as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>       
                                                <div class="mb-2">
                                                    <label for="phone" class="col-col-form-label col-form-label-sm">@lang('locale.phone') <span class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control form-control-sm" name="phone" id="phone" placeholder="@lang('locale.phone')" required>
                                                </div>  
                                                <div class="mb-2">
                                                    <label for="password_confirmation" class="col-col-form-label col-form-label-sm">@lang('locale.password_confirmation')</label>
                                                    <input type="password" class="form-control form-control-sm" name="password_confirmation" id="password_confirmation" placeholder="@lang('locale.password_confirmation')">
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

