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
                        <li class="breadcrumb-item active">@lang('locale.partner', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.partner', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-primary float-end"><a href="{{ route('partners.pdf') }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.partner', ['suffix'=>'s'])</a></div>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#partner-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil-table"></i> @lang('locale.table')
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#partner-card" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil-apps"></i> @lang('locale.card')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#partner-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil-document-layout-center"></i> @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="partner-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.created_at')</th>
                                    <th class="text-white">@lang('locale.company')</th>
                                    <th class="text-white">@lang('locale.phone')</th>
                                    <th class="text-white">@lang('locale.email')</th>
                                    <th class="text-white">@lang('locale.owner')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($partners as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->type.' : '.$item->company }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->owner }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#edit-partner{{ $item->id }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('partners.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="partner-card">
                            <div class="row">
                                <div class="col-md-6 col-sm-8 mx-auto mb-2">
                                    <div class="input-group">
                                        <input type="search" id="partners-search" class="form-control" placeholder="@lang('locale.search')..." id="partner-search">
                                        <span class="input-group-text mdi mdi-magnify search-icon bg-primary text-white"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="results-search">
                                @foreach ($partners as $item)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="card text-center card-bottom-primary">
                                        <div class="card-body">
                                            <img src="{{ asset($item->logo ?? 'images/profile.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                            <h6 class="mb-0 mt-2">{{ $item->type }}</h6>
                                            <p class="text-muted font-14">{{ $item->company }}</p>
                                            <a role="button" class="btn btn-soft-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#edit-partner{{ $item->id }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('partners.destroy', $item->id) }}" method="post" style="display: inline-block">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-soft-danger btn-sm mb-2" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </div> 
                                    </div> <!-- end card -->
                                </div>
                                @endforeach
                            </div>
                        </div> 
                        <div class="tab-pane" id="partner-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('partners.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="company" class="col-col-form-label col-form-label-sm">@lang('locale.company') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="company" name="company" placeholder="@lang('locale.company')" required>
                                                </div>  
                                                <div class="mb-2">
                                                    <label for="phone" class="col-col-form-label col-form-label-sm">@lang('locale.phone') <span class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control form-control-sm" id="phone" name="phone" placeholder="@lang('locale.phone')" required>
                                                </div>     
                                                <div class="mb-2">
                                                    <label for="owner" class="col-col-form-label col-form-label-sm">@lang('locale.owner')</label>
                                                    <input type="text" class="form-control form-control-sm" id="owner" name="owner" placeholder="@lang('locale.owner')">
                                                </div>                                       
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="type" class="col-form-label col-form-label-sm">@lang('locale.type', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <select id="type" name="type" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['ENTREPRISE','PARTICULIER'] as $item)
                                                        <option>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>  
                                                <div class="mb-2">
                                                    <label for="email" class="col-col-form-label col-form-label-sm">@lang('locale.email')</label>
                                                    <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="@lang('locale.email')">
                                                </div>   
                                                <div class="mb-2">
                                                    <label for="address" class="col-col-form-label col-form-label-sm">@lang('locale.address')</label>
                                                    <input type="text" class="form-control form-control-sm" id="address" name="address" placeholder="@lang('locale.address')">
                                                </div>                                     
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="about" class="col-col-form-label col-form-label-sm">@lang('locale.about')</label>
                                                    <textarea class="form-control form-control-sm" id="about" name="about" placeholder="@lang('locale.about')"></textarea>
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
    @foreach ($partners as $item)
    <x-edit-partner :partner="$item"></x-edit-partner>
    @endforeach

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

        $('#partners-search').on('keyup', function () {
            let search = $(this).val();
            $('#results-search').load("{{ route('partners.search') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), '_method':'GET', 'search':search});
        })
    </script>
    @endpush
</x-app-layout>

