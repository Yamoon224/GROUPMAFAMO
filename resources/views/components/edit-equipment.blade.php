<div id="edit-equipment{{ $equipment->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">@lang('locale.equipment', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('equipments.update', $equipment->id) }}" method="post">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="equipment" class="col-form-label col-form-label-sm">@lang('locale.equipment', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $equipment->name }}" name="name" class="form-control form-control-sm" id="equipment" placeholder="@lang('locale.equipment', ['suffix'=>''])" required>
                            </div> 
                        </div> 
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="mb-2">
                                <label for="price" class="col-form-label col-form-label-sm">@lang('locale.price') <span class="text-danger">*</span></label>
                                <input type="number" value="{{ $equipment->price }}" min="500" name="price" class="form-control form-control-sm" id="price" placeholder="@lang('locale.price')" required>
                            </div>                  
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="mb-2">
                                <label for="qty" class="col-form-label col-form-label-sm">@lang('locale.qty') <span class="text-danger">*</span></label>
                                <input type="number" value="{{ $equipment->qty }}" min="1" name="qty" class="form-control form-control-sm" id="qty" placeholder="@lang('locale.qty')" required>
                            </div> 
                        </div> 
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="mb-2">
                                <label for="unit" class="col-form-label col-form-label-sm">@lang('locale.unit') <span class="text-danger">*</span></label>
                                <input type="text" name="unit" value="{{ $equipment->unit }}" class="form-control form-control-sm" id="unit" placeholder="@lang('locale.unit')" required>
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