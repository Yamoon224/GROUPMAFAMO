<div id="add-image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">@lang('locale.image', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="link" class="col-form-label col-form-label-sm">@lang('locale.link')</label>
                                <input type="file" name="link" class="form-control" id="link" required>
                            </div>
                            <div class="mb-2">
                                <label for="description" class="col-form-label col-form-label-sm">@lang('locale.description')</label>
                                <textarea name="description" class="form-control" id="description" placeholder="@lang('locale.description')"></textarea>
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