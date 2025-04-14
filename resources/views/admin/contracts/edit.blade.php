<x-app-layout>
    @push('links')
    <link rel="stylesheet" href="{{ asset('icons/line-awesome/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('icons/simple-line-icons/css/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('icons/themify-icons/css/themify-icons.css') }}">	
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    @endpush

    <!-- row -->	
    <div class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white">
        <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
            <li><a href="{{ route('contracts.index') }}" class="text-[#828690] dark:text-white text-[13px]">@lang('locale.contract', ['suffix'=>'s'])</a></li>
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>@lang('locale.edit', ['param'=>__('locale.contract', ['suffix'=>''])])</a></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="w-full col-xxl-12">
                <div class="card">
                    <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative border-b border-[#E6E6E6] dark:border-[#444444]">
                        <h4 class="card-title capitalize">@lang('locale.edit', ['param'=>__('locale.contract', ['suffix'=>''])])</h4>
                    </div>
                    <div class="sm:p-5 p-4">
                        <form action="{{ route('contracts.update', $contract->id) }}" method="post">
                            @csrf @method('PUT')
                            <div class="accordion accordion-primary accordion-wrapper">
                                <div class="accordion-item mb-2">
                                    <div class="accordion-header dark:text-white bg-primary-light text-primary py-[0.7rem] px-3 border border-transparent rounded-md relative cursor-pointer text-sm duration-500 accordion-btn active" data-dz-item="collapseOne">
                                        <span class="accordion-header-icon"></span>
                                        <span class="accordion-header-text">@lang('locale.contract', ['suffix'=>''])</span>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapseOne" class="accordion-content">
                                        <div class="accordion-body-text py-3.5 px-3 sm:text-sm text-xs text-body-color">
                                            <div class="row">
                                                <div class="lg:w-1/2 mb-2">
                                                    <div class="mb-4">
                                                        <label class="text-body-color dark:text-white">@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : '']) <span class="required text-danger">*</span></label>
                                                        <select class="single-select" name="contract[category_id]" required>
                                                            @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}" {{ $contract->category_id == $item->id ? 'selected' : '' }}>{{ $item->category }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="lg:w-1/2 mb-2">
                                                    <div class="mb-4">
                                                        <label class="text-body-color dark:text-white">@lang('locale.partner', ['suffix'=>'']) <span class="required text-danger">*</span></label>
                                                        <select class="single-select" name="contract[partner_id]" required>
                                                            @foreach ($partners as $item)
                                                            <option value="{{ $item->id }}" {{ $contract->partner_id == $item->id ? 'selected' : '' }}>{{ $item->type.' : '.$item->company }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="lg:w-full mb-2">
                                                    <div class="mb-4">
                                                        <label class="text-body-color dark:text-white">@lang('locale.title') <span class="required text-danger">*</span></label>
                                                        <input type="text" name="contract[title]" value="{{ $contract->title }}" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" placeholder="@lang('locale.title')" required>
                                                    </div>
                                                </div>
                                                <div class="lg:w-1/2 mb-2">
                                                    <div class="mb-4">
                                                        <label class="text-body-color dark:text-white">@lang('locale.cost') <span class="required text-danger">*</span></label>
                                                        <input type="number" name="contract[cost]" value="{{ $contract->cost }}" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" placeholder="@lang('locale.cost')" required>
                                                    </div>
                                                </div>
                                                <div class="lg:w-1/2 mb-2">
                                                    <div class="mb-4">
                                                        <label class="text-body-color dark:text-white">@lang('locale.workforce') <span class="required text-danger">*</span></label>
                                                        <input type="number" name="contract[workforce]" value="{{ $contract->workforce }}" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" placeholder="@lang('locale.workforce')" required>
                                                    </div>
                                                </div>
                                                <div class="lg:w-1/2 mb-2">
                                                    <div class="mb-4">
                                                        <label class="text-body-color dark:text-white">@lang('locale.began_at') <span class="required text-danger">*</span></label>
                                                        <input type="date" name="contract[began_at]" value="{{ $contract->began_at }}" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="began_at" required>
                                                    </div>
                                                </div>
                                                <div class="lg:w-1/2 mb-2">
                                                    <div class="mb-4">
                                                        <label class="text-body-color dark:text-white">@lang('locale.ended_at') <span class="required text-danger">*</span></label>
                                                        <input type="date" name="contract[ended_at]" value="{{ $contract->ended_at }}" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="ended_at" required>
                                                    </div>
                                                </div>
                                                <div class="w-full mb-4">
                                                    <div class="mb-4">
                                                        <label class="text-body-color dark:text-white">@lang('locale.description')</label>
                                                        <textarea rows="3" style="resize: none" name="contract[description]" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y">{{ $contract->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-2">
                                    <div class="accordion-header dark:text-white bg-primary-light text-primary py-[0.7rem] px-3 border border-transparent rounded-md relative cursor-pointer text-sm duration-500 accordion-btn" data-dz-item="collapseTwo">
                                        <span class="accordion-header-icon"></span>
                                        <span class="accordion-header-text">@lang('locale.details')</span>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapseTwo" class="accordion-content hide">
                                        <div class="accordion-body-text py-3.5 px-3 sm:text-sm text-xs text-body-color">
                                            <div class="row">
                                                <div class="flex items-center">
                                                    <a class="rounded py-[5px] px-3 text-[13px] text-success bg-success leading-[18px] inline-block border border-success-light bg-success-light hover:text-white hover:bg-success" id="new-row">+ @lang('locale.new', ['param'=>__('locale.row')])</a>
                                                </div>
                                                <div class="overflow-x-auto table-scroll">
                                                    <table class="table table-bordered table-striped mb-4 min-w-[30rem] w-full">
                                                        <thead>
                                                            <tr>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : ''])</th>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.label')</th>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.unit')</th>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.qty')</th>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.price')</th>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.actions')</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody">
                                                            @foreach($contract->details as $detail)
                                                            <tr>
                                                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                                                                    <input type='text' name="details[{{ $loop->iteration }}][category]" value="{{ $detail->category }}" placeholder="@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : ''])" class="form-control form-control-sm" required>
                                                                </td>
                                                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                                                                    <input type='text' name="details[{{ $loop->iteration }}][label]" value="{{ $detail->label }}" class="form-control form-control-sm" placeholder="@lang('locale.label')" required>
                                                                </td>
                                                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                                                                    <input type='text' name="details[{{ $loop->iteration }}][unit]" value="{{ $detail->unit }}" class="form-control form-control-sm" placeholder="@lang('locale.unit')" required>
                                                                </td>
                                                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                                                                    <input type='number' name="details[{{ $loop->iteration }}][qty]" value="{{ $detail->qty }}" step="0.01" min="1" class="form-control form-control-sm" placeholder="@lang('locale.qty')" required>
                                                                </td>
                                                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left">
                                                                    <input type='number' name="details[{{ $loop->iteration }}][price]" value="{{ $detail->price }}" min="500" class="form-control form-control-sm" placeholder="@lang('locale.price')" required>
                                                                </td>
                                                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                                                                    <i class="fa fa-trash text-danger" onclick="deleter(this)"></i>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-2">
                                    <div class="accordion-header dark:text-white bg-primary-light text-primary py-[0.7rem] px-3 border border-transparent rounded-md relative cursor-pointer text-sm duration-500 accordion-btn" data-dz-item="collapseThree">
                                        <span class="accordion-header-icon"></span>
                                        <span class="accordion-header-text">@lang('locale.affectation', ['suffix'=>'s'])</span>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapseThree" class="accordion-content hide">
                                        <div class="accordion-body-text py-3.5 px-3 sm:text-sm text-xs text-body-color">
                                            <div class="row">
                                                <div class="lg:w-1/3 mb-2">
                                                    <div class="mb-4">
                                                        <select class="single-select" id="employeeId" required>
                                                            @foreach ($employees as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name.' | '.$item->phone." | ".$item->ref }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="lg:w-1/3 mb-2">
                                                    <div class="mb-4">
                                                        <input type="text" id="position" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none form-control-sm w-full" placeholder="@lang('locale.position')" >
                                                    </div>
                                                </div>
                                                <div class="lg:w-1/3 mb-2">
                                                    <a class="rounded py-[5px] px-3 text-[13px] text-success bg-success leading-[18px] inline-block border border-success-light bg-success-light hover:text-white hover:bg-success" id="new-row-affectation">+ @lang('locale.new', ['param'=>__('locale.affectation', ['suffix'=>''])])</a>
                                                </div>
                                            </div>
                                            <div class="row">                                                
                                                <div class="overflow-x-auto table-scroll">
                                                    <table class="table table-bordered table-striped mb-4 min-w-[30rem] w-full">
                                                        <thead>
                                                            <tr>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.employee', ['suffix'=>''])</th>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.position')</th>
                                                                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap font-medium sm:text-base text-sm text-left">@lang('locale.actions')</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody-affectation">
                                                            @foreach($contract->affectations as $item)
                                                            <tr>
                                                                <td>
                                                                    {{ $item->employee->name." | ".$item->employee->phone." | ".$item->employee->ref }}
                                                                    <input type="hidden" name="affectations[{{$loop->iteration}}][employee_id]" value="{{ $item->employee_id }}"> 
                                                                </td>
                                                                <td>
                                                                    <input type='text' name="affectations[{{$loop->iteration}}][position]" value="{{ $item->position }}" class="form-control form-control-sm" placeholder="@lang('locale.unit')" required>
                                                                </td>
                                                                <td>
                                                                    <i class="fa fa-trash text-danger" onclick="deleter(this)"></i>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <button class="block w-full btn btn-success xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary offcanvas-close">@lang('locale.submit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
	<script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script> 
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/select2-init.js') }}"></script>
    <script src="{{ asset('js/details.js') }}"></script>
    @endpush
</x-app-layout>

