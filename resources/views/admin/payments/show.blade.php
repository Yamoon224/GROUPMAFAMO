<x-app-layout>
    <div class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white">
        <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
            <li>
                <a href="{{ route('employees.index') }}" class="text-[#828690] dark:text-white text-[13px]">@lang('locale.employee', ['suffix'=>''])</a>
            </li>
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>{{ $employee->name }}</a></li>
        </ol>
    </div>
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="w-full">
                <div class="card card-profile">
                    <div class="p-[30px] max-w-[380px] my-auto rounded-md bg-white dark:bg-[#000000e6] text-center">
                        <div class="img-wrraper relative mb-2.5">                              
                            <div class="">
                                <img src="{{ asset($employee->photo ?? 'images/profile.png') }}" class="inline-block rounded-full h-20 w-20 border-[7px] border-[#3e5fce14]" alt=""></div>
                                <a class="icon-wrapper absolute bottom-0 mx-6 h-[30px] w-[30px] bg-white dark:bg-black dark:shadow-[0_0_6px_3px_rgba(255,255,255,0.1)] dark:text-white text-primary text-center leading-[30px] rounded-full shadow-[0_0_6px_3px_rgba(68,102,242,0.1)]" href="{{ route('employees.edit', $employee->id) }}"><i class="fa-solid fa-pencil"></i></a>
                            </div>
                            <div class="user-details">
                                <div class="title">
                                    <a><h4 class="mb-2">{{ $employee->name }}</h4></a>
                                    <h6 class="mb-2 text-body-color">Ref ID: {{ $employee->ref }}</h6>
                                </div>
                                <ul class="flex justify-center">
                                    <li class="sm:py-[14px] py-[5px] sm:px-5 px-2.5 mx-[9px] mt-5 bg-primary-light rounded-md">
                                        <div class="sm:text-base text-sm font-medium dark:text-white">{{ moneyformat($employee->brut) }}</div>
                                        <span class="text-body-color sm:text-sm text-xs">@lang('locale.brut')</span>
                                    </li>
									<li class="sm:py-[14px] py-[5px] sm:px-5 px-2.5 mx-[9px] mt-5 bg-primary-light rounded-md">
                                        <div class="sm:text-base text-sm font-medium dark:text-white">{{ moneyformat($employee->net) }}</div>
                                        <span class="text-body-color sm:text-sm text-xs">@lang('locale.net')</span>
                                    </li>
                                </ul>
                            </div>
                        </div>	
                    </div>	
                </div>
            </div>
        </div>
        <div class="row">
            <div class="xl:w-1/4 col-xxl-4 w-full">
                <div class="row">
                    <div class="w-full">
                        <div class="card">
                            <div class="sm:px-5 sm:pt-5 pb-0 p-4">
                                <div>
                                    <div class="mb-5 bg-transparent">
                                        <h2 class="card-toggle-btn relative rounded-md duration-500 cursor-pointer">
                                            <button class="relative flex items-center justify-between w-full text-base">
                                                @lang('locale.about') <i class="fal fa-angle-down font-['Font_Awesome_6_Free'] font-semibold arrow"></i>
                                            </button>
                                        </h2>
                                        <div class="py-4 content">
                                            <div class="about-me">
                                                <ul>
                                                    <li class="flex items-center mb-[15px]">
                                                        <i class="fa-solid fa-briefcase text-center mx-1 text-[15px] mr-[15px] rounded text-primary bg-primary-light leading-[35px] w-[35px] h-[35px] block"></i>
                                                        <div>
                                                            <h6>@lang('locale.diploma') & @lang('locale.contracttype')</h6>
                                                            <span class="text-body-color sm:text-sm text-xs">{{ $employee->diploma.' | '.$employee->contracttype.' | '.$employee->position }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="flex items-center mb-[15px]">
                                                        <i class="fa-solid fa-book text-center mx-1 text-[15px] mr-[15px] rounded text-primary bg-primary-light leading-[35px] w-[35px] h-[35px] block"></i>
                                                        <div>
                                                            <h6>@lang('locale.contract', ['suffix'=>''])</h6>
                                                            <span class="text-body-color sm:text-sm text-xs">{{ date('d/m/Y', strtotime($employee->contractbegin)) .' - '. date('d/m/Y', strtotime($employee->contractend)) }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="flex items-center mb-[15px]">
                                                        <i class="fa-solid fa-location-dot text-center mx-1 text-[15px] mr-[15px] rounded text-primary bg-primary-light leading-[35px] w-[35px] h-[35px] block"></i>
                                                        <div>
                                                            <h6>@lang('locale.address') : {{ $employee->address }}</h6>
                                                            <span class="text-body-color sm:text-sm text-xs">{{ $employee->phone." | ".$employee->email }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="flex items-center mb-[15px]">
                                                        <i class="fa-solid fa-location-dot text-center mx-1 text-[15px] mr-[15px] rounded text-primary bg-primary-light leading-[35px] w-[35px] h-[35px] block"></i>
                                                        <div>
                                                            <h6>@lang('locale.warrantyperson')</h6>
                                                            <span class="text-body-color sm:text-sm text-xs">{{ $employee->warrantyperson.' | '.$employee->warrantyphone }}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-3/4 col-xxl-8 w-full">
                <div class="row">
                    <div class="w-full">
                        <div class="card flex flex-col">
							<div class="card-body">
								<div class="overflow-x-auto active-projects">
                                    <div class="p-5">
                                        <h4 class="heading">@lang('locale.pay_fiche') : {{ $employee->name }}</h4>
                                    </div>
									<table id="empoloyees-tblwrapper" class="table w-full">
										<thead>
											<th class="text-[13px] py-2.5 pl-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">#</th>
											<th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.month', ['suffix'=>''])</th>
											<th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.brut')</th>
											<th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.prime')</th>
											<th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-right">@lang('locale.net')</th>
										</thead>
										<tbody>
											@foreach(getMonthsBetween($employee->contractbegin, $employee->contractend) as $item)
											<tr>
												<td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-[1.125rem] px-5 font-normal whitespace-nowrap">
													<a href="javascript:void(0)" class="text-primary dark:text-white">{{ $loop->iteration }}</a>
												</td>
												<td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-[1.125rem] px-5 font-normal whitespace-nowrap"><span class="text-body-color dark:text-white text-[13px]">{{ $item }}</span></td>
												<td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-[1.125rem] px-5 font-normal whitespace-nowrap">
													<span class="text-body-color dark:text-white text-[13px]">{{ moneyformat($employee->brut) }}</span>
												</td>
												<td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-[1.125rem] px-5 font-normal whitespace-nowrap">
													<span class="text-body-color dark:text-white text-[13px]">{{ moneyformat($employee->prime) }}</span>
												</td>
												<td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-[1.125rem] px-5 font-normal whitespace-nowrap text-right">
													<span class="text-body-color dark:text-white text-[13px]">{{ moneyformat($employee->net) }}</span>
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
    @endpush
</x-app-layout>

