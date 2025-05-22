<div id="edit-billing{{ $billing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="primary-header-modalLabel">@lang('locale.billing', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('billings.update', $billing->id) }}" method="post">
                @method('PUT')
                <div class="modal-body">
                    @csrf 
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.quotation', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <select name="quotation_id" class="form-control select2" data-toggle="select2" required>
                                    <option value=''>@lang('locale.select')</option>
                                    @foreach($quotations as $item)
                                    <option value="{{ $item->id }}" title="{{ $item->cost }}" {{ $billing->quotation_id == $item->id ? 'selected' : '' }}>{{ $item->title." - #".$item->ref }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label for="amount" class="col-col-form-label col-form-label-sm">@lang('locale.amount') <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm" id="amount" value="{{ $billing->amount }}" name="amount" placeholder="@lang('locale.amount')" required>
                            </div>                                    
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">   
                            <div class="mb-2">
                                <label for="remain" class="col-col-form-label col-form-label-sm">@lang('locale.remain') <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm" name="remain" value="{{ $billing->remain }}" id="remain" placeholder="@lang('locale.remain')" required>
                            </div>                                
                        </div>
                        <div class="col-12">   
                            <div class="mb-2">
                                <label for="observations" class="col-col-form-label col-form-label-sm">@lang('locale.observations')</label>
                                <textarea class="form-control form-control-sm" name="observations" id="observations" placeholder="@lang('locale.observations')">{{ $billing->observations }}</textarea>
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