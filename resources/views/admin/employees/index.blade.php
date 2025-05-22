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
                        <li class="breadcrumb-item active">@lang('locale.employee', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.employee', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-primary float-end"><a href="{{ route('employees.pdf') }}" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.employee', ['suffix'=>'s'])</a></div>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#employee-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil-table"></i> @lang('locale.table')
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#employee-card" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil-apps"></i> @lang('locale.card')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#employee-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil-document-layout-center"></i> @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="employee-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.ref')</th>
                                    <th class="text-white">@lang('locale.employee', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.phone')</th>
                                    <th class="text-white">@lang('locale.address')</th>
                                    <th class="text-white">@lang('locale.position')</th>
                                    <th class="text-white">@lang('locale.diploma')</th>
                                    <th class="text-white">@lang('locale.family')</th>
                                    <th class="text-white">@lang('locale.contracttype')</th>
                                    <th class="text-white">@lang('locale.salary', ['suffix'=>app()->getLocale() == 'en' ? 'ies' : 's'])</th>
                                    <th class="text-white">@lang('locale.contract', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.warranty')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $item->ref }}</td>
                                        <td>{{ $item->gender.' '.$item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>{{ $item->diploma }}</td>
                                        <td>{{ $item->family }}</td>
                                        <td>{{ $item->contracttype }}</td>
                                        <td>{{ moneyformat($item->brut).' - '.moneyformat($item->prime) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->contractbegin)).' - '.date('d/m/Y', strtotime($item->contractend)) }}</td>
                                        <td>{{ $item->warrantyperson." - ".$item->warrantyphone }}</td>
                                        <td>
                                            {{-- <a class="btn btn-soft-info" href="{{ route('employees.show', $item->id) }}" style="display: inline-block"><i class="uil uil-user"></i></a> --}}
                                            <a class="btn btn-sm btn-soft-primary" href="{{ route('employees.edit', $item->id) }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('employees.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="employee-card">
                            <div class="row">
                                <div class="col-md-6 col-sm-8 mx-auto mb-2">
                                    <div class="input-group">
                                        <input type="search" id="employees-search" class="form-control" placeholder="@lang('locale.search')..." id="employee-search">
                                        <span class="input-group-text mdi mdi-magnify search-icon bg-primary text-white"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="results-search">
                                @foreach ($employees as $item)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="card text-center card-top-primary">
                                        <div class="card-body">
                                            <img src="{{ asset($item->photo ?? 'images/profile.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
        
                                            <h5 class="mb-0 mt-2">{{ $item->gender." ".$item->name }}</h5>
                                            <p class="text-muted font-14">{{ $item->position }}</p>

                                            {{-- <a role="button" class="btn btn-soft-info btn-sm mb-2" href="{{ route('employees.show', $item->id) }}" style="display: inline-block"><i class="uil uil-user"></i></a> --}}
                                            <a role="button" class="btn btn-soft-primary btn-sm mb-2" href="{{ route('employees.edit', $item->id) }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('employees.destroy', $item->id) }}" method="post" style="display: inline-block">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-soft-danger btn-sm mb-2" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card -->
                                </div>
                                @endforeach
                            </div>
                        </div> 
                        <div class="tab-pane" id="employee-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('employees.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="fullname" class="col-col-form-label col-form-label-sm">@lang('locale.fullname') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="fullname" name="name" placeholder="@lang('locale.fullname')" required>
                                                </div>                                       
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.gender')<span class="text-danger">*</span></label>
                                                    <select name="gender" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['Mr'=>'Homme','Mme'=>'Femme'] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                        
                                            </div>
        
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="phone" class="col-col-form-label col-form-label-sm">@lang('locale.phone') <span class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control form-control-sm" name="phone" id="phone" placeholder="@lang('locale.phone')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.family')<span class="text-danger">*</span></label>
                                                    <select name="family" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['CELIBATAIRE','MARIE(E)','DIVORCE(E)'] as $item)
                                                            <option>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> 
                                                <div class="mb-2">
                                                    <label for="position" class="col-col-form-label col-form-label-sm">@lang('locale.position') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" name="position" id="position" placeholder="@lang('locale.position')" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="email" class="col-col-form-label col-form-label-sm">@lang('locale.email')</label>
                                                    <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="@lang('locale.email')">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="diploma" class="col-form-label col-form-label-sm">@lang('locale.diploma') <span class="text-danger">*</span></label>
                                                    <select id="diploma" name="diploma" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['CEP','BTS','BEPC','BACCALAUREAT','LICENCE','MASTER','PhD', 'AUTRE'] as $item)
                                                        <option>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="contractbegin" class="col-form-label col-form-label-sm">@lang('locale.contractbegin') <span class="text-danger">*</span></label>
                                                    <input type="date" value="{{ date('Y-m-d') }}" name="contractbegin" class="form-control form-control-sm" id="contractbegin" placeholder="@lang('locale.contractbegin')" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="address" class="col-form-label col-form-label-sm">@lang('locale.address') <span class="text-danger">*</span></label>
                                                    <input type="text" name="address" class="form-control form-control-sm" id="address" placeholder="@lang('locale.address')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="contracttype" class="col-form-label col-form-label-sm">@lang('locale.contracttype') <span class="text-danger">*</span></label>
                                                    <select id="contracttype" name="contracttype" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['CDI','CDD','STAGE','AUTRE'] as $item)
                                                        <option>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="contractend" class="col-form-label col-form-label-sm">@lang('locale.contractend') <span class="text-danger">*</span></label>
                                                    <input type="date" name="contractend" class="form-control form-control-sm" id="contractend" placeholder="@lang('locale.contractend')" required>
                                                </div>
                                            </div>                                    
        
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                                <div class="mb-2">
                                                    <label for="brut" class="col-form-label col-form-label-sm">@lang('locale.brut') <span class="text-danger">*</span></label>
                                                    <input type="number" name="brut" class="form-control form-control-sm" id="brut" placeholder="@lang('locale.brut')" min="100000" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="warrantyperson" class="col-form-label col-form-label-sm">@lang('locale.warrantyperson') <span class="text-danger">*</span></label>
                                                    <input type="text" name="warrantyperson" class="form-control form-control-sm" id="warrantyperson" placeholder="@lang('locale.warrantyperson')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="checkout" class="col-form-label col-form-label-sm">@lang('locale.bank')</label>
                                                    <select id="checkout" name="checkout_id" class="form-select form-control-sm">
                                                        @foreach($checkouts as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="prime" class="col-form-label col-form-label-sm">@lang('locale.prime') <span class="text-danger">*</span></label>
                                                    <input type="number" name="prime" class="form-control form-control-sm" id="prime" value="0" min="0" placeholder="@lang('locale.prime')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="warrantyphone" class="col-form-label col-form-label-sm">@lang('locale.warrantyphone') <span class="text-danger">*</span></label>
                                                    <input type="text" name="warrantyphone" class="form-control form-control-sm" id="warrantyphone" placeholder="@lang('locale.warrantyphone')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="rib" class="col-form-label col-form-label-sm">@lang('locale.rib')</label>
                                                    <input type="text" name="rib" class="form-control form-control-sm" id="rib" placeholder="@lang('locale.rib')">
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

        $('#employees-search').on('keyup', function () {
            let search = $(this).val();
            $('#results-search').load("{{ route('employees.search') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), '_method':'GET', 'search':search});
        })
    </script>
    @endpush
</x-app-layout>

