<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">@lang('locale.employee', ['suffix'=>'s'])</a></li>
                        <li class="breadcrumb-item active">@lang('locale.edit')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.employee', ['suffix'=>''])</h4>
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
                            <a href="#employee-edit" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil-document-layout-center"></i> @lang('locale.edit')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="employee-edit">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('employees.update', $employee->id) }}" method="post">
                                        @csrf @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="fullname" class="col-col-form-label col-form-label-sm">@lang('locale.fullname') <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $employee->name }}" class="form-control form-control-sm" id="fullname" name="name" placeholder="@lang('locale.fullname')" required>
                                                </div>                                       
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.gender')<span class="text-danger">*</span></label>
                                                    <select name="gender" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['Mr'=>'Homme','Mme'=>'Femme'] as $key => $item)
                                                            <option value="{{ $key }}" {{ $key == $employee->gender ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                        
                                            </div>
        
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="phone" class="col-col-form-label col-form-label-sm">@lang('locale.phone') <span class="text-danger">*</span></label>
                                                    <input type="tel" value="{{ $employee->phone }}" class="form-control form-control-sm" name="phone" id="phone" placeholder="@lang('locale.phone')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.family')<span class="text-danger">*</span></label>
                                                    <select name="family" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['CELIBATAIRE','MARIE(E)','DIVORCE(E)'] as $item)
                                                            <option {{ $item == $employee->family ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> 
                                                <div class="mb-2">
                                                    <label for="position" class="col-col-form-label col-form-label-sm">@lang('locale.position') <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $employee->name }}" class="form-control form-control-sm" name="position" id="position" placeholder="@lang('locale.position')" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="email" class="col-col-form-label col-form-label-sm">@lang('locale.email')</label>
                                                    <input type="email" value="{{ $employee->email }}" class="form-control form-control-sm" name="email" id="email" placeholder="@lang('locale.email')">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="diploma" class="col-form-label col-form-label-sm">@lang('locale.diploma') <span class="text-danger">*</span></label>
                                                    <select id="diploma" name="diploma" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['CEP','BTS','BEPC','BACCALAUREAT','LICENCE','MASTER','PhD', 'AUTRE'] as $item)
                                                        <option {{ $item == $employee->diploma ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="contractbegin" class="col-form-label col-form-label-sm">@lang('locale.contractbegin') <span class="text-danger">*</span></label>
                                                    <input type="date" value="{{ $employee->contractbegin }}" name="contractbegin" class="form-control form-control-sm" id="contractbegin" placeholder="@lang('locale.contractbegin')" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="address" class="col-form-label col-form-label-sm">@lang('locale.address') <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $employee->address }}" name="address" class="form-control form-control-sm" id="address" placeholder="@lang('locale.address')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="contracttype" class="col-form-label col-form-label-sm">@lang('locale.contracttype') <span class="text-danger">*</span></label>
                                                    <select id="contracttype" name="contracttype" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['CDI','CDD','STAGE','AUTRE'] as $item)
                                                        <option {{ $item == $employee->contracttype ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="contractend" class="col-form-label col-form-label-sm">@lang('locale.contractend') <span class="text-danger">*</span></label>
                                                    <input type="date" value="{{ $employee->contractend }}" name="contractend" class="form-control form-control-sm" id="contractend" placeholder="@lang('locale.contractend')" required>
                                                </div>
                                            </div>                                    
        
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                                <div class="mb-2">
                                                    <label for="brut" class="col-form-label col-form-label-sm">@lang('locale.brut') <span class="text-danger">*</span></label>
                                                    <input type="number" value="{{ $employee->brut }}" name="brut" class="form-control form-control-sm" id="brut" placeholder="@lang('locale.brut')" min="100000" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="warrantyperson" class="col-form-label col-form-label-sm">@lang('locale.warrantyperson') <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $employee->warrantyperson }}" name="warrantyperson" class="form-control form-control-sm" id="warrantyperson" placeholder="@lang('locale.warrantyperson')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="acompte" class="col-form-label col-form-label-sm">@lang('locale.acompte')</label>
                                                    <input type="number" value="{{ $employee->acompte }}" name="acompte" class="form-control form-control-sm" id="acompte" placeholder="@lang('locale.acompte')">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="cnss" class="col-form-label col-form-label-sm">@lang('locale.cnss')</label>
                                                    <input type="number" value="{{ $employee->cnss }}" name="cnss" class="form-control form-control-sm" id="cnss" placeholder="@lang('locale.cnss')">
                                                </div>                                                
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="prime" class="col-form-label col-form-label-sm">@lang('locale.prime') <span class="text-danger">*</span></label>
                                                    <input type="number" value="{{ $employee->prime }}" name="prime" class="form-control form-control-sm" id="prime" value="0" min="0" placeholder="@lang('locale.prime')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="warrantyphone" class="col-form-label col-form-label-sm">@lang('locale.warrantyphone') <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $employee->warrantyphone }}" name="warrantyphone" class="form-control form-control-sm" id="warrantyphone" placeholder="@lang('locale.warrantyphone')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="sanction" class="col-form-label col-form-label-sm">@lang('locale.sanction') <span class="text-danger">*</span></label>
                                                    <input type="number" value="{{ $employee->sanction }}" name="sanction" class="form-control form-control-sm" id="sanction" placeholder="@lang('locale.sanction')" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="rts" class="col-form-label col-form-label-sm">@lang('locale.rts')</label>
                                                    <input type="number" value="{{ $employee->rts }}" name="rts" class="form-control form-control-sm" id="rts" placeholder="@lang('locale.rts')">
                                                </div>                                                                                       
                                            </div>   
                                            
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="hastopay">@lang('locale.hastopay')</label>
                                                    <input type="checkbox" name="hastopay" id="hastopay" {{ $employee->hastopay == 'true' ? 'checked' : '' }} data-switch="success"/>
                                                    <label for="hastopay" data-on-label="@lang('locale.yes')" data-off-label="@lang('locale.no')"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="has-to-pay">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="checkout" class="col-form-label col-form-label-sm">@lang('locale.bank')</label>
                                                    <select id="checkout" name="checkout_id" class="form-select form-control-sm">
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach($checkouts as $item)
                                                        <option value="{{ $item->id }}" {{ $employee->checkout_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="rib" class="col-form-label col-form-label-sm">@lang('locale.rib')</label>
                                                    <input type="text" value="{{ $employee->rib }}" name="rib" class="form-control form-control-sm" id="rib" placeholder="@lang('locale.rib')">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
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

    <script>
        if($('#hastopay').is(':checked')) {
            $('#has-to-pay').show();
        } else {
            $('#has-to-pay').hide();
            $('#has-to-pay select').children('option:selected').prop('value', '');
            $('#has-to-pay input').attr('value', '');
        }
        $('#hastopay').on('click', function () {
            if($(this).is(':checked')) {
                $('#has-to-pay').show();
            } else {
                $('#has-to-pay').hide();
                $('#has-to-pay select').children('option:selected').prop('value', '');
                $('#has-to-pay input').attr('value', '');
            }
        })
    </script>
</x-app-layout>

