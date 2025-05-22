<div id="edit-stoppage{{ $stoppage->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">@lang('locale.stoppage', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('stoppages.update', $stoppage->id) }}" method="post">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.employee', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <select name="employee_id" class="form-control select2" data-toggle="select2" required>
                                    <option value=''>@lang('locale.select')</option>
                                    @foreach($employees as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $stoppage->employee_id ? 'selected' : '' }}>{{ $item->name." - #".$item->ref }}</option>
                                    @endforeach
                                </select>
                            </div>      
                            <div class="mb-2">
                                <label for="beganat" class="col-form-label col-form-label-sm">@lang('locale.began_at')</label>
                                <input type="date" name="began_at" value="{{ $stoppage->began_at }}" class="form-control" id="beganat" placeholder="@lang('locale.began_at')">
                            </div>             
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.type', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <select name="type" class="form-control" required>
                                    <option value=''>@lang('locale.select')</option>
                                    @foreach(['CONGE','LICENCEMENT','SUSPENSION'] as $item)
                                    <option {{ $item == $stoppage->type ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="mb-2">
                                <label for="endedat" class="col-form-label col-form-label-sm">@lang('locale.ended_at')</label>
                                <input type="date" name="ended_at" value="{{ $stoppage->ended_at }}" class="form-control" id="endedat" placeholder="@lang('locale.ended_at')">
                            </div>  
                        </div> 
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="reason" class="col-form-label col-form-label-sm">@lang('locale.reason') <span class="text-danger">*</span></label>
                                <textarea name="reason" class="form-control" id="reason" placeholder="@lang('locale.reason')" required>{{ $stoppage->reason }}</textarea>
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