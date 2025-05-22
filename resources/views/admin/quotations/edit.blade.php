<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('quotations.index') }}">@lang('locale.quotation', ['suffix'=>'s'])</a></li>
                        <li class="breadcrumb-item active">@lang('locale.edit')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.quotation', ['suffix'=>''])</h4>
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
                            <a href="#quotation-edit" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil-document-layout-center"></i> @lang('locale.edit')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="quotation-edit">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('quotations.update', $quotation->id) }}" method="post">
                                        @csrf @method('PUT')
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
                                                                <input type="text" value="{{ $quotation->title }}" class="form-control" id="title" name="title" placeholder="@lang('locale.title')" required>
                                                            </div> 
                                                            <div class="mb-2">
                                                                <label for="cost" class="col-col-form-label col-form-label-sm">@lang('locale.cost') <span class="text-danger">*</span></label>
                                                                <input type="number" value="{{ $quotation->cost }}" class="form-control form-control-sm" id="cost" name="cost" placeholder="@lang('locale.cost')" required>
                                                            </div>      
                                                            <div class="mb-2">
                                                                <label for="began_at" class="col-col-form-label col-form-label-sm">@lang('locale.began_at') <span class="text-danger">*</span></label>
                                                                <input type="date" value="{{ $quotation->began_at }}" class="form-control form-control-sm" id="began_at" name="began_at" placeholder="@lang('locale.began_at')" required>
                                                            </div>                      
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="mb-2">
                                                                <label class="col-form-label col-form-label-sm">@lang('locale.partner', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                                <select name="partner_id" class="form-select select2" data-toggle="select2" required>
                                                                    <option value="">@lang('locale.select')</option>
                                                                    @foreach($partners as $item)
                                                                        <option value="{{ $item->id }}" {{ $item->id == $quotation->partner_id ? 'selected' : '' }}>{{ $item->company." - ".$item->owner }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>     
                                                            <div class="mb-2">
                                                                <label for="workforce" class="col-col-form-label col-form-label-sm">@lang('locale.workforce') <span class="text-danger">*</span></label>
                                                                <input type="number" value="{{ $quotation->workforce }}" class="form-control form-control-sm" id="workforce" name="workforce" placeholder="@lang('locale.workforce')" required>
                                                            </div>  
                                                            <div class="mb-2">
                                                                <label for="ended_at" class="col-col-form-label col-form-label-sm">@lang('locale.ended_at') <span class="text-danger">*</span></label>
                                                                <input type="date" value="{{ $quotation->ended_at }}" class="form-control form-control-sm" id="ended_at" name="ended_at" placeholder="@lang('locale.ended_at')" required>
                                                            </div>                           
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="mb-2">
                                                                <label for="description" class="col-col-form-label col-form-label-sm">@lang('locale.description')</label>
                                                                <textarea class="form-control form-control-sm" id="description" name="description" placeholder="@lang('locale.description')">{{ $quotation->description }}</textarea>
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
                                                                    @foreach ($quotation->details as $item)
                                                                    <tr>
                                                                        <td><input type="text" name="details[{{ $item->id }}][category]" value="{{ $item->category }}" placeholder="@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : ''])" class="form-control form-control-sm" required></td>
                                                                        <td><input type="text" name="details[{{ $item->id }}][label]" value="{{ $item->label }}" placeholder="@lang('locale.label')" class="form-control form-control-sm" required></td>
                                                                        <td><input type="text" name="details[{{ $item->id }}][unit]" value="{{ $item->unit }}" placeholder="@lang('locale.unit')" class="form-control form-control-sm" required></td>
                                                                        <td><input type="text" name="details[{{ $item->id }}][qty]" value="{{ $item->qty }}" placeholder="@lang('locale.qty')" class="form-control form-control-sm" required></td>
                                                                        <td><input type="text" name="details[{{ $item->id }}][price]" value="{{ $item->price }}" placeholder="@lang('locale.price')" class="form-control form-control-sm" required></td>
                                                                        <td><a role="button" title="Supprimer cette Ligne" class="btn btn-sm btn-soft-danger"><i class="uil uil-trash-alt text-danger" onclick="deleter(this)"></i></a></td>
                                                                    </tr>
                                                                    @endforeach
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
                                                                <tbody id="affectations-body">
                                                                    @foreach ($quotation->affectations as $item)
                                                                    <tr>
                                                                        <td><input type='hidden' name="affectations[{{ $item->id }}][employee_id]" value="{{ $item->employee_id }}"> {{ $item->employee->name." - ".$item->employee->phone }}</td>
                                                                        <td><input type='text' name="affectations[{{ $item->id }}][position]" class="form-control form-control-sm" value="{{ $item->position }}" required></td>
                                                                        <td><a role="button" title="Supprimer cette Ligne" class="btn btn-sm btn-soft-danger"><i class="uil uil-trash-alt text-danger" onclick="deleter(this)"></i></a></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div> 
                                                    </div>
                                                    <ul class="pager wizard mb-0 list-inline mt-1">
                                                        <li class="previous list-inline-item">
                                                            <button type="button" class="btn btn-soft-danger"><i class="mdi mdi-arrow-left me-1"></i> @lang('locale.previous')</button>
                                                        </li>
                                                        <li class="next list-inline-item float-end">
                                                            <button class="btn btn-success">@lang('locale.submit') <i class="uil uil-file-check-alt"></i></button>
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
    @endpush
</x-app-layout>





