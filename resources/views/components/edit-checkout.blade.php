<div id="edit-checkout{{ $checkout->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="primary-header-modalLabel">@lang('locale.checkout', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('checkouts.update', $checkout->id) }}" method="post">
                @method('PUT')
                <div class="modal-body">
                    @csrf 
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label for="checkout" class="col-col-form-label col-form-label-sm">@lang('locale.checkout', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $checkout->name }}" class="form-control form-control-sm" id="checkout" name="name" placeholder="@lang('locale.checkout', ['suffix'=>''])" required>
                            </div>                                    
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">   
                            <div class="mb-2">
                                <label for="title" class="col-col-form-label col-form-label-sm">@lang('locale.title') <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $checkout->title }}" class="form-control form-control-sm" name="title" id="title" placeholder="@lang('locale.title')" required>
                            </div>                                
                        </div>
                        <div class="col-12">   
                            <div class="mb-2">
                                <label for="ref" class="col-col-form-label col-form-label-sm">@lang('locale.ref') <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $checkout->ref }}" class="form-control form-control-sm" name="ref" id="ref" placeholder="@lang('locale.ref')" required>
                            </div>  
                            <div class="mb-2">
                                <label for="description" class="col-col-form-label col-form-label-sm">@lang('locale.description')</label>
                                <textarea class="form-control form-control-sm" name="description" id="description" placeholder="@lang('locale.description')">{{ $checkout->description }}</textarea>
                            </div>                                
                        </div>    
                        <div class="col-12">
                            <button class="btn btn-block w-100 btn-soft-primary">@lang('locale.submit')</button>    
                        </div>                   	
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>