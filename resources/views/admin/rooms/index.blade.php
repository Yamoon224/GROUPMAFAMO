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
                        <li class="breadcrumb-item active">@lang('locale.room', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.room', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-primary float-end"><a href="{{ route('rooms.pdf') }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.room', ['suffix'=>'s'])</a></div>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#room-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil-table"></i> @lang('locale.table')
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#room-card" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil-apps"></i> @lang('locale.card')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#room-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil-document-layout-center"></i> @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="room-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.establishment', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : ''])</th>
                                    <th class="text-white">@lang('locale.room', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.nightly')</th>
                                    <th class="text-white">@lang('locale.address')</th>
                                    <th class="text-white">@lang('locale.status')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->establishment->establishment }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ moneyformat($item->price) }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-soft-info" href="{{ route('rooms.show', $item->id) }}" style="display: inline-block"><i class="mdi mdi-file-pdf-box"></i></a>
                                            <a class="btn btn-sm btn-soft-primary" href="{{ route('rooms.edit', $item->id) }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('rooms.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="room-card">
                            <div class="row">
                                <div class="col-md-6 col-sm-8 mx-auto mb-2">
                                    <div class="input-group">
                                        <input type="search" id="rooms-search" class="form-control" placeholder="@lang('locale.search')..." id="room-search">
                                        <span class="input-group-text mdi mdi-magnify search-icon bg-primary text-white"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="results-search">
                                @foreach ($rooms as $item)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="card text-center card-top-primary">
                                        <div class="card-body">
                                            <img src="{{ asset($item->front ?? 'images/profile.png')}}" class="avatar-lg img-thumbnail" alt="IMAGE VUE D'EN FACE">
                                            <h5 class="mb-0 mt-2">{{ $item->establishment->establishment }}</h5>
                                            <p class="text-muted font-14">{{ $item->name }}</p>

                                            {{-- <a role="button" class="btn btn-soft-info btn-sm mb-2" href="{{ route('rooms.show', $item->id) }}" style="display: inline-block"><i class="uil uil-user"></i></a> --}}
                                            <a role="button" class="btn btn-soft-primary btn-sm mb-2" href="{{ route('rooms.edit', $item->id) }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('rooms.destroy', $item->id) }}" method="post" style="display: inline-block">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-soft-danger btn-sm mb-2" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card -->
                                </div>
                                @endforeach
                            </div>
                        </div> 
                        <div class="tab-pane" id="room-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="establishment" class="col-form-label col-form-label-sm">@lang('locale.establishment', ['suffix'=>''])</label>
                                                    <select id="establishment" name="establishment_id" class="form-select form-control-sm" required>
                                                        @foreach($establishments as $item)
                                                        <option value="{{ $item->id }}">{{ $item->establishment }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>  
                                                <div class="mb-2">
                                                    <label for="room" class="col-col-form-label col-form-label-sm">@lang('locale.room', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" name="name" id="room" placeholder="@lang('locale.room', ['suffix'=>''])" required>
                                                </div>                                    
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : '']) <span class="text-danger">*</span></label>
                                                    <select name="category" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['SEJOUR', 'LOCATION', 'VENTE'] as $key => $item)
                                                            <option>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>    
                                                <div class="mb-2">
                                                    <label for="address" class="col-col-form-label col-form-label-sm">@lang('locale.address') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" name="address" id="address" placeholder="@lang('locale.address')" required>
                                                </div>                                    
                                            </div>
        
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="price" class="col-col-form-label col-form-label-sm">@lang('locale.nightly') (GNF) <span class="text-danger">*</span></label>
                                                    <input type="number" min="10000" class="form-control form-control-sm" name="price" id="price" placeholder="@lang('locale.nightly')" required>
                                                </div>    
                                            </div>                                    
        
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                                <div class="mb-2">
                                                    <label for="front" class="col-form-label col-form-label-sm">@lang('locale.img_front') <span class="text-danger">*</span></label>
                                                    <input type="file" name="front" class="form-control form-control-sm" id="front" placeholder="@lang('locale.img_front')" required>
                                                </div>
                                            </div> 
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                                <div class="mb-2">
                                                    <label for="back" class="col-form-label col-form-label-sm">@lang('locale.img_back') <span class="text-danger">*</span></label>
                                                    <input type="file" name="back" class="form-control form-control-sm" id="back" placeholder="@lang('locale.img_back')" required>
                                                </div>
                                            </div>  
                                            <div class="col-12">                                        
                                                <div class="mb-2">
                                                    <label for="description" class="col-form-label col-form-label-sm">@lang('locale.description')</label>
                                                    <textarea name="description" class="form-control form-control-sm" id="description" placeholder="@lang('locale.description')"></textarea>
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

        $('#rooms-search').on('keyup', function () {
            let search = $(this).val();
            $('#results-search').load("{{ route('rooms.search') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), '_method':'GET', 'search':search});
        })
    </script>
    @endpush
</x-app-layout>



