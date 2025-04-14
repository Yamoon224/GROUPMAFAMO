<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">

<div class="card-body p-0">
    <div class="overflow-x-auto active-projects ItemsCheckboxSec task-table dz-scroll pb-2">
        <div class="p-5">
            <h4 class="max-sm:mb-2.5">@lang('locale.payment', ['suffix'=>'s'])</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-[13px] py-2.5 pl-4 pr-0 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap style-1">
                        <div class="form-check custom-checkbox block min-h-[1.3125rem] pl-[1.5em] mb-0.5">
                            <input type="checkbox" class="form-check-input checkAll" id="checkInput">
                            <label class="form-check-label" for="checkInput"></label>
                        </div>
                    </th>
                    <th class="text-[13px] py-2.5 pl-4 pr-0 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">#</th>
                    <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.employee', ['suffix'=>''])</th>
                    <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.address')</th>
                    <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.position')</th>
                    <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.brut')</th>
                    <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.prime')</th>
                    <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.checkout', ['suffix'=>''])</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $item)
                <tr>
                    <td class="text-[13px] font-normal py-2.5 pl-4 pr-0 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#444444]">
                        @if (!$item->alreadyPayByMonth($month, $year))
                        <div class="form-check custom-checkbox block min-h-[1.3125rem] pl-[1.5em] mb-0.5">
                            <input type="checkbox" name="payments[{{ $item->id }}]" class="form-check-input" id="customCheckBox{{ $item->id }}">
                            <label class="form-check-label" for="customCheckBox{{ $item->id }}"></label>
                        </div>
                        @else
                        <i class="fa fa-check text-success"></i>
                        @endif
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 pl-4 pr-0 font-normal whitespace-nowrap">
                        <span class="text-body-color dark:text-white text-[13px]">{{ $loop->iteration }}</span>
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                        <div class="products flex items-center">
                            <img src="{{ asset( $item->photo ?? 'images/profile.png') }}" class="inline-block mr-2.5 w-[2.813rem] min-w-[2.813rem] h-[2.813rem] rounded-md relative object-cover avatar-md" alt="">
                            <div>
                                <h6 class="text-sm whitespace-nowrap">{{ $item->gender.' '.$item->name }}</h6>
                                <span class="text-body-color dark:text-white text-xs">{{ $item->diploma.' | #'.$item->ref }}</span>	
                            </div>	
                        </div>
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                        <div>
                            <h6 class="text-sm whitespace-nowrap">{{ $item->phone }}</h6>
                            <span class="text-body-color dark:text-white text-xs">{{ $item->family.' | '.$item->address }}</span>	
                        </div>	
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                        <div>
                            <h6 class="text-sm whitespace-nowrap">{{ $item->contracttype }}</h6>
                            <span class="text-body-color dark:text-white text-xs">{{ $item->position }}</span>	
                        </div>	
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                        <div>
                            <input class="relative text-[0.76563rem] placeholder:text-[0.76563rem] py-1 px-[1.1rem] min-h-[2.5rem] border border-b-color block rounded-md duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full form-control-sm" type="number" name="salaries[{{ $item->id }}]" value="{{ $item->brut }}" placeholder="@lang('locale.prime')">
                        </div>	
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                        <div>
                            <input class="relative text-[0.76563rem] placeholder:text-[0.76563rem] py-1 px-[1.1rem] min-h-[2.5rem] border border-b-color block rounded-md duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full form-control-sm" type="number" name="primes[{{ $item->id }}]" value="{{ $item->prime }}" placeholder="@lang('locale.prime')">
                        </div>	
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                        <select class="status-select nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium" name="checkouts[{{ $item->id }}]">
                            @foreach ($checkouts as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
    <div class="mx-6">
        <button class="w-full mb-2 inline-block rounded font-medium xl:text-[15px] text-xs leading-5 xl:py-[0.719rem] xl:px-[1.563rem] py-2.5 px-4 border border-success-light text-success bg-success-light hover:text-white hover:bg-success duration-300">@lang('locale.submit')</button>
    </div>
</div>

<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.min.js') }}"></script>
<script src="{{ asset('vendor/tagify/dist/tagify.min.js') }}"></script>
<script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>