<div id="edit-correspondence{{ $correspondence->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">@lang('locale.correspondence', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('correspondences.update', $correspondence->id) }}" method="post">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.type', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <select name="type" class="form-select form-control-sm" required>
                                    <option value="">@lang('locale.select')</option>
                                    @foreach(['ENTRANT', 'SORTANT'] as $item)
                                        <option {{ $item == $correspondence->type ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label for="correspondent" class="col-form-label col-form-label-sm">@lang('locale.correspondent') <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $correspondence->correspondent }}" name="correspondent" class="form-control form-control-sm" id="correspondent" placeholder="@lang('locale.correspondent')">
                            </div>  
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="object" class="col-form-label col-form-label-sm">@lang('locale.object') <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $correspondence->object }}" name="object" class="form-control form-control-sm" id="object" placeholder="@lang('locale.object')">
                            </div>   
                            <div class="mb-2">
                                <label for="message" class="col-form-label col-form-label-sm">@lang('locale.message') <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control form-control-sm" id="message" placeholder="@lang('locale.observations')" required>{{ $correspondence->object }}</textarea>
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