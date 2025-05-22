<div id="edit-partner{{ $partner->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">@lang('locale.partner', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('partners.update', $partner->id) }}" method="post">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label for="company" class="col-col-form-label col-form-label-sm">@lang('locale.company') <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $partner->company }}" class="form-control form-control-sm" id="company" name="company" placeholder="@lang('locale.company')" required>
                            </div>  
                            <div class="mb-2">
                                <label for="phone" class="col-col-form-label col-form-label-sm">@lang('locale.phone') <span class="text-danger">*</span></label>
                                <input type="tel" value="{{ $partner->phone }}" class="form-control form-control-sm" id="phone" name="phone" placeholder="@lang('locale.phone')" required>
                            </div>     
                            <div class="mb-2">
                                <label for="owner" class="col-col-form-label col-form-label-sm">@lang('locale.owner')</label>
                                <input type="text" value="{{ $partner->owner }}" class="form-control form-control-sm" id="owner" name="owner" placeholder="@lang('locale.owner')">
                            </div>                                       
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label for="type" class="col-form-label col-form-label-sm">@lang('locale.type', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <select id="type" name="type" class="form-select form-control-sm" required>
                                    <option value="">@lang('locale.select')</option>
                                    @foreach(['ENTREPRISE','PARTICULIER'] as $item)
                                    <option {{ $partner->type == $item ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="mb-2">
                                <label for="email" class="col-col-form-label col-form-label-sm">@lang('locale.email')</label>
                                <input type="email" value="{{ $partner->email }}" class="form-control form-control-sm" id="email" name="email" placeholder="@lang('locale.email')">
                            </div>   
                            <div class="mb-2">
                                <label for="address" class="col-col-form-label col-form-label-sm">@lang('locale.address')</label>
                                <input type="text" value="{{ $partner->address }}" class="form-control form-control-sm" id="address" name="address" placeholder="@lang('locale.address')">
                            </div>                                     
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="about" class="col-col-form-label col-form-label-sm">@lang('locale.about')</label>
                                <textarea class="form-control form-control-sm" id="about" name="about" placeholder="@lang('locale.about')">{{ $partner->about }}</textarea>
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