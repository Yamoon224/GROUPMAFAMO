<div id="edit-establishment{{ $establishment->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">@lang('locale.establishment', ['suffix'=>''])</h4>
                <button establishment="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('establishments.update', $establishment->id) }}" method="post">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">   
                            <div class="mb-2">
                                <label for="establishment" class="col-col-form-label col-form-label-sm">@lang('locale.establishment', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $establishment->establishment }}" class="form-control form-control-sm" id="establishment" name="establishment" placeholder="@lang('locale.establishment', ['suffix'=>''])" required>
                            </div> 
                            <div class="mb-2">
                                <label for="description" class="col-col-form-label col-form-label-sm">@lang('locale.description')</label>
                                <textarea class="form-control form-control-sm" name="description" id="description" placeholder="@lang('locale.description')">{{ $establishment->description }}</textarea>
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