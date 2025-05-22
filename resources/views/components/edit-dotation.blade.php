<div id="edit-dotation{{ $dotation->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">@lang('locale.dotation', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('dotations.update', $dotation->id) }}" method="post">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.employee', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <select name="employee_id" class="form-control select2" data-toggle="select2" required>
                                    <option value=''>@lang('locale.select')</option>
                                    @foreach($employees as $item)
                                    <option value="{{ $item->id }}" {{ $dotation->employee_id == $item->id ? 'selected' : '' }}>{{ $item->name." - #".$item->ref }}</option>
                                    @endforeach
                                </select>
                            </div>                 
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.equipment', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <select name="equipment_id" class="form-control select2" data-toggle="select2" required>
                                    <option value=''>@lang('locale.select')</option>
                                    @foreach($equipments as $item)
                                    <option value="{{ $item->id }}" {{ $dotation->equipment_id == $item->id ? 'selected' : '' }}>{{ $item->name." | ".$item->qty." ".$item->unit }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label for="qty" class="col-form-label col-form-label-sm">@lang('locale.qty') <span class="text-danger">*</span></label>
                                <input type="number" name="qty" value="{{ $dotation->qty }}" class="form-control" id="qty" placeholder="@lang('locale.qty')">
                            </div>   
                        </div>   
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="observations" class="col-form-label col-form-label-sm">@lang('locale.observations')</label>
                                <textarea name="observations" class="form-control" id="observations" placeholder="@lang('locale.observations')">{{ $dotation->observations }}</textarea>
                            </div>	                                  
                        </div>                      	
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">@lang('locale.submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>