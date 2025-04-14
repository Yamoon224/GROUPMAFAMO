<x-app-layout>
    @push('links')
	<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    @endpush

    <div class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white">
        <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
            <li>
                <a href="{{ route('dashboard') }}" class="text-[#828690] dark:text-white text-[13px]">
                    <svg class="mb-[3px] mr-1 inline-block" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    @lang('locale.dashboard') 
                </a>
            </li>
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>@lang('locale.payment', ['suffix'=>'s'])</a></li>
        </ol>
        <a class="text-primary dark:text-white text-[0.8125rem] leading-[1.5]" href="{{ route('employees.pdf') }}"><i class="fa fa-print"></i> @lang('locale.pdf')</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="w-full">
                <form action="{{ route('payments.store') }}" method="post">
                    @csrf
                    <div class="row flex">
                        <div class="w-1/4 mb-3"> 
                            <select name="year" class="nice-select style-1 py-1.5 mx-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem] w-full" required>
                                @foreach(['2025'] as $item)
                                    <option {{ $item == date('y') ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/4 mb-3 ml-auto"> <!-- Ajout de ml-auto pour pousser à droite -->
                            <select name="month" class="nice-select style-1 py-1.5 mx-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem] w-full" required>
                                @foreach(monthsofyear() as $key => $item)
                                    <option value="{{ $key+1 }}" {{ $key+1 == date('m') ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="card overflow-hidden relative" id="payment-content">
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
                                                @if (!$item->alreadyPayByMonth(date('m'), date('Y')))
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
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
	<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script>
	<script src="{{ asset('js/plugins-init/datatables.init.min.js') }}"></script>
	<script src="{{ asset('vendor/tagify/dist/tagify.min.js') }}"></script>
	<script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <script>
        $('select[name="month"]').on('change', function () {
            var month = $(this).children('option:selected').val(),
                year = $('select[name="year"]').children('option:selected').val();
            $('#payment-content').load("{{ route('payments.create') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), 'month':month, 'year':year, '_method':'GET'});
        })
        $('select[name="year"]').on('change', function () {
            var year = $(this).children('option:selected').val(),
                month = $('select[name="month"]').children('option:selected').val();
            $('#payment-content').load("{{ route('payments.create') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), 'month':month, 'year':year, '_method':'GET'});
        })
    </script>
    @endpush
</x-app-layout>

