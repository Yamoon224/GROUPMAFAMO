<div id="edit-user{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="primary-header-modalLabel">@lang('locale.user', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @method('PUT')
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label for="fullname" class="col-col-form-label col-form-label-sm">@lang('locale.fullname') <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $user->name }}" class="form-control form-control-sm" id="fullname" name="name" placeholder="@lang('locale.fullname')" required>
                            </div>     
                            <div class="mb-2">
                                <label for="email" class="col-col-form-label col-form-label-sm">@lang('locale.email')</label>
                                <input type="email" value="{{ $user->email }}" class="form-control form-control-sm" name="email" id="email" placeholder="@lang('locale.email')">
                            </div>                                 
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.group', ['suffix'=>''])<span class="text-danger">*</span></label>
                                <select name="group_id" class="form-select form-control-sm" required>
                                    <option value="">@lang('locale.select')</option>
                                    @foreach($groups as $item)
                                        <option value="{{ $item->id }}" {{ $user->group_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>       
                            <div class="mb-2">
                                <label for="phone" class="col-col-form-label col-form-label-sm">@lang('locale.phone') <span class="text-danger">*</span></label>
                                <input type="tel" value="{{ $user->phone }}" class="form-control form-control-sm" name="phone" id="phone" placeholder="@lang('locale.phone')" required>
                            </div>                               
                        </div>                    	
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">@lang('locale.submit')</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
