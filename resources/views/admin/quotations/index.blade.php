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
                        <li class="breadcrumb-item active">@lang('locale.quotation', ['suffix'=>'s'])</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.quotation', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-primary float-end"><a href="" class="text-white"><i class="mdi mdi-file-pdf-box me-1"></i> @lang('locale.quotation', ['suffix'=>'s'])</a></div>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#quotation-table" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil-table"></i> @lang('locale.table')
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="#quotation-card" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil-apps"></i> @lang('locale.card')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#quotation-add" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil-document-layout-center"></i> @lang('locale.add')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="quotation-table">
                            <table id="scroll-horizontal-datatable" class="table table-striped table-sm table-hover nowrap w-100">
                                <thead class="bg-primary">
                                    <th class="text-white">#</th>
                                    <th class="text-white">@lang('locale.partner', ['suffix'=>''])</th>
                                    <th class="text-white">@lang('locale.ref')</th>
                                    <th class="text-white">@lang('locale.title')</th>
                                    <th class="text-white">@lang('locale.cost')</th>
                                    <th class="text-white">@lang('locale.workforce')</th>
                                    <th class="text-white">@lang('locale.delay')</th>
                                    <th class="text-white">@lang('locale.affectation', ['suffix'=>'s'])</th>
                                    <th class="text-white">@lang('locale.status')</th>
                                    <th class="text-white">@lang('locale.actions')</th>
                                </thead>
                                <tbody>
                                    @foreach ($quotations as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->partner->owner }}</td>
                                        <td>#{{ $item->ref }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ moneyformat($item->cost) }}</td>
                                        <td>{{ moneyformat($item->workforce) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->began_at)).' - '.date('d/m/Y', strtotime($item->ended_at)) }}</td>
                                        <td>{{ $item->affectations->count() }} @lang('locale.affectation', ['suffix'=>'s'])</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-soft-info" href="{{ route('quotations.pdf', $item->id) }}" style="display: inline-block"><i class="mdi mdi-file-pdf-box"></i></a>
                                            <a class="btn btn-sm btn-soft-primary" href="{{ route('quotations.edit', $item->id) }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
                                            <form action="{{ route('quotations.destroy', $item->id) }}" method="post" style="display: inline-block; margin-bottom: 0px">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-soft-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        <div class="tab-pane" id="quotation-card">
                            <div class="row">
                                <div class="col-md-6 col-sm-8 mx-auto mb-2">
                                    <div class="input-group">
                                        <input type="search" id="quotations-search" class="form-control" placeholder="@lang('locale.search')..." id="quotation-search">
                                        <span class="input-group-text mdi mdi-magnify search-icon bg-primary text-white"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="results-search">
                                @foreach ($quotations as $item)
                                <div class="col-md-6 col-xxl-3 col-sm-6 col-xs-12">
                                    <div class="card d-block">
                                        <div class="card-body">
                                            <div class="dropdown card-widgets">
                                                <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('quotations.edit', $item->id) }}" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>@lang('locale.edit')</a>
                                                    <form action="{{ route('quotations.destroy', $item->id) }}" method="post">
                                                        @method('DELETE') @csrf
                                                        <button class="btn btn-soft-danger dropdown-item" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i> @lang('locale.delete')</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- project title-->
                                            <h4 class="mt-0">
                                                <a class="text-title">{{ $item->title }}</a>
                                            </h4>
                                            <div class="badge bg-{{ $item->status == 'TERMINE' ? 'success' : ($item->status == 'NON DEBUTE' ? 'info' : ($item->status == 'EN COURS' ? 'warning' : 'danger'))}}">{{ $item->status }}</div>
                                            <p class="text-muted font-13 my-3">{{ $item->description }}</p>
                                            <!-- project detail-->
                                            <p class="mb-1">
                                                <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                    <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                                                    <b>{{ moneyformat($item->cost) }}</b> @lang('locale.cost')
                                                </span>
                                                <span class="text-nowrap mb-2 d-inline-block">
                                                    <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                    <b>{{ moneyformat($item->workforce) }}</b> @lang('locale.workforce')
                                                </span>
                                            </p>
                                            <div>
                                                @foreach ($item->affectations->take(3) as $affectation)
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $affectation->employee->name }}" class="d-inline-block">
                                                    <img src="{{ asset($affectation->employee->photo ?? 'images/photo.png') }}" class="rounded-circle avatar-xs" alt="PHOTO">
                                                </a>
                                                @endforeach
                                                <a class="d-inline-block text-muted fw-bold ms-2">
                                                    {{ $item->affectations->count() > 3 ? '+'.($item->affectations->count()-3).' '.__('locale.more') : '' }}
                                                </a>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                @endforeach
                            </div>
                        </div> 
                        <div class="tab-pane" id="quotation-add">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('quotations.store') }}" method="post">
                                        @csrf
                                        <div id="progressbarwizard">
                                            <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                                <li class="nav-item">
                                                    <a href="#project-tab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                        <i class="uil uil-building font-18 align-middle me-1"></i>
                                                        <span class="d-none d-sm-inline">@lang('locale.project')</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#quotation-tab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                        <i class="uil uil-file-alt font-18 align-middle me-1"></i>
                                                        <span class="d-none d-sm-inline">@lang('locale.quotation', ['suffix'=>''])</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#affectation-tab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                        <i class="uil uil-users-alt font-18 align-middle me-1"></i>
                                                        <span class="d-none d-sm-inline">@lang('locale.affectation', ['suffix'=>'s'])</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content b-0 mb-0">
                                                <div id="bar" class="progress mb-3" style="height: 7px;">
                                                    <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                </div>

                                                <div class="tab-pane" id="project-tab">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="mb-2">
                                                                <label for="title" class="col-col-form-label col-form-label-sm">@lang('locale.title') <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="title" name="title" placeholder="@lang('locale.title')" required>
                                                            </div> 
                                                            <div class="mb-2">
                                                                <label for="cost" class="col-col-form-label col-form-label-sm">@lang('locale.cost') <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control form-control-sm" id="cost" name="cost" placeholder="@lang('locale.cost')" required>
                                                            </div>      
                                                            <div class="mb-2">
                                                                <label for="began_at" class="col-col-form-label col-form-label-sm">@lang('locale.began_at') <span class="text-danger">*</span></label>
                                                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-sm" id="began_at" name="began_at" placeholder="@lang('locale.began_at')" required>
                                                            </div>                      
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="mb-2">
                                                                <label class="col-form-label col-form-label-sm">@lang('locale.partner', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                                <select name="partner_id" class="form-select select2" data-toggle="select2" required>
                                                                    <option value="">@lang('locale.select')</option>
                                                                    @foreach($partners as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->company." - ".$item->owner }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>     
                                                            <div class="mb-2">
                                                                <label for="workforce" class="col-col-form-label col-form-label-sm">@lang('locale.workforce') <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control form-control-sm" id="workforce" name="workforce" placeholder="@lang('locale.workforce')" required>
                                                            </div>  
                                                            <div class="mb-2">
                                                                <label for="ended_at" class="col-col-form-label col-form-label-sm">@lang('locale.ended_at') <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control form-control-sm" id="ended_at" name="ended_at" placeholder="@lang('locale.ended_at')" required>
                                                            </div>                           
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="mb-2">
                                                                <label for="description" class="col-col-form-label col-form-label-sm">@lang('locale.description')</label>
                                                                <textarea class="form-control form-control-sm" id="description" name="description" placeholder="@lang('locale.description')"></textarea>
                                                            </div> 
                                                        </div>
                                                    </div> 

                                                    <ul class="list-inline wizard mb-0">
                                                        <li class="next list-inline-item float-end">
                                                            <a class="btn btn-soft-success">@lang('locale.next') <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" id="quotation-tab">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <table class="table table-striped table-sm table-hover nowrap w-100">
                                                                <thead>
                                                                    <th>@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : ''])</th>
                                                                    <th>@lang('locale.label')</th>
                                                                    <th>@lang('locale.unit')</th>
                                                                    <th>@lang('locale.qty')</th>
                                                                    <th>@lang('locale.price')</th>
                                                                    <th><a id="btn-new-row-quotations" role="button" class="btn btn-sm btn-soft-success"><i class="uil uil-file-plus"></i></a></th>
                                                                </thead>
                                                                <tbody id="quotations-body">
                                                                    <tr>
                                                                        <td><input type="text" name="details[1][category]" placeholder="@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : ''])" class="form-control form-control-sm" required></td>
                                                                        <td><input type="text" name="details[1][label]" placeholder="@lang('locale.label')" class="form-control form-control-sm" required></td>
                                                                        <td><input type="text" name="details[1][unit]" placeholder="@lang('locale.unit')" class="form-control form-control-sm" required></td>
                                                                        <td><input type="text" name="details[1][qty]" placeholder="@lang('locale.qty')" class="form-control form-control-sm" required></td>
                                                                        <td><input type="text" name="details[1][price]" placeholder="@lang('locale.price')" class="form-control form-control-sm" required></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> 
                                                    </div>
                                                    <ul class="pager wizard mb-0 list-inline">
                                                        <li class="previous list-inline-item">
                                                            <button type="button" class="btn btn-soft-danger"><i class="mdi mdi-arrow-left me-1"></i> @lang('locale.previous')</button>
                                                        </li>
                                                        <li class="next list-inline-item float-end">
                                                            <button type="button" class="btn btn-soft-success">@lang('locale.next') <i class="mdi mdi-arrow-right ms-1"></i></button>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" id="affectation-tab">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                                            <div class="mb-2">
                                                                <select id="employee-id" class="form-select select2" data-toggle="select2" required>
                                                                    @foreach($employees as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name." - ".$item->phone }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                                            <div class="mb-2">
                                                                <input type="text" class="form-control" id="position" placeholder="@lang('locale.position')" required>
                                                            </div> 
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                                            <div class="mb-2">
                                                                <a role="button" class="w-100 btn btn-soft-success" id="btn-new-row-affectation">@lang('locale.add') <i class="uil uil-user-check"></i></a>
                                                            </div> 
                                                        </div>
                                                        <div class="col-12">
                                                            <table class="table table-striped table-sm table-hover nowrap w-100">
                                                                <thead>
                                                                    <th>@lang('locale.employee', ['suffix'=>''])</th>
                                                                    <th>@lang('locale.position')</th>
                                                                    <th>@lang('locale.actions')</th>
                                                                </thead>
                                                                <tbody id="affectations-body"></tbody>
                                                            </table>
                                                        </div> 
                                                    </div>
                                                    <ul class="pager wizard mb-0 list-inline mt-1">
                                                        <li class="previous list-inline-item">
                                                            <button type="button" class="btn btn-soft-danger"><i class="mdi mdi-arrow-left me-1"></i> @lang('locale.previous')</button>
                                                        </li>
                                                        <li class="next list-inline-item float-end">
                                                            <button class="btn btn-success">@lang('locale.submit')</button>
                                                        </li>
                                                    </ul>
                                                </div>
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
    <script src="{{ asset('assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('assets/js/details.js') }}"></script>

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



