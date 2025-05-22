<div id="edit-cashflow{{ $cashflow->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="primary-header-modalLabel">@lang('locale.cashflow', ['suffix'=>''])</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="{{ route('cashflows.update', $cashflow->id) }}" method="post">
                @method('PUT')
                <div class="modal-body">
                    @csrf 
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.checkout', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                <select name="checkout_id" class="form-control select2" data-toggle="select2" required>
                                    <option value=''>@lang('locale.select')</option>
                                    @foreach($checkouts as $item)
                                    <option value="{{ $item->id }}" {{ $cashflow->checkout_id == $item->id ? 'selected' : '' }}>{{ $item->name." - ".$item->title }}</option>
                                    @endforeach
                                </select>
                            </div>                                  
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">   
                            <div class="mb-2">
                                <label class="col-form-label col-form-label-sm">@lang('locale.label') <span class="text-danger">*</span></label>
                                <select name="label" class="form-control select2" data-toggle="select2" required>
                                    <option value=''>@lang('locale.select')</option>
                                    @foreach(['ENTREE', 'SORTIE'] as $item)
                                    <option {{ $cashflow->label == $item ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>                                 
                        </div>
                        <div class="col-12">   
                            <div class="mb-2">
                                <label for="amount" class="col-col-form-label col-form-label-sm">@lang('locale.amount') <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $cashflow->amount }}" class="form-control form-control-sm" name="amount" id="amount" placeholder="@lang('locale.amount')" required>
                            </div>  
                            <div class="mb-2">
                                <label for="description" class="col-col-form-label col-form-label-sm">@lang('locale.description')</label>
                                <textarea class="form-control form-control-sm" name="description" id="description" placeholder="@lang('locale.description')">{{ $cashflow->description }}</textarea>
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