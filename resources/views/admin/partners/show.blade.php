<x-app-layout>
    @push('links')
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">
    @endpush

    <div class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white">
        <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
            <li><a href="javascript:void(0)" class="text-[#828690] dark:text-white text-[13px]">@lang('locale.partner', ['suffix'=>''])</a></li>
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>{{ $partner->company }}</a></li>
        </ol>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="w-full">
                <div class="profile card card-body p-4 pb-0">
                    <div class="profile-head">
                        <div class="photo-content relative">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="sm:flex block sm:py-[0.9375rem] sm:px-5 max-sm:pb-5">
                            <div class="profile-photo sm:w-[6.65rem] w-[5rem] relative sm:mr-2.5 max-sm:mb-[1.25rem] max-sm:mx-auto mt-[-4.5rem] z-[1]">
                                <img src="{{ asset($partner->logo ?? 'images/profile.png') }}" class="max-w-full h-auto rounded-full" alt="LOGO">
                            </div>
                            <div class="sm:flex block w-full max-sm:text-center">
                                <div class="profile-name px-4 pt-2">
                                    <h4 class="text-primary text-lg">{{ $partner->company }}</h4>
                                    <p class="mb-4">{{ $partner->owner }}</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-[#464a53] text-lg">{{ $partner->email }}</h4>
                                    <p class="mb-4">{{ $partner->phone }}</p>
                                </div>
                                <div class="dropdown ml-auto max-sm:absolute max-sm:top-[1.875rem] max-sm:right-[1.875rem]">
                                    <a href="javascript:void(0);" class="p-[0.4375rem] w-[2.4rem] h-[2.4rem] bg-primary-light text-primary rounded-md flex justify-center items-center dz-dropdown duration-500 hover:bg-primary btn-primary light" data-dz-dropdown="DzProfileDropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none"   fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g>
                                        </svg>
                                    </a>
                                    <ul id="DzProfileDropdown" class="dz-dropdown-menu dropdown-menu-end absolute translate-x-[-195px] translate-y-[18px] overflow-hidden rounded-md z-[9] bg-white dark:bg-[#242424] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] min-w-[13rem] text-left hidden">
                                        <li class="dropdown-item py-2 px-[1.25rem] block w-full text-body-color text-[13px] hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-transparent dark:hover:text-white"><a href="{{ route('partners.edit', $partner->id) }}"><i class="fa fa-edit text-primary mr-2"></i> @lang('locale.edit')</a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="w-full">
                <div class="card flex flex-col h-auto">
                    <div class="card-body sm:p-5 p-2">
                        <div class="profile-tab">
                            <div class="dz-tab-area">
                                <ul class="nav nav-tabs flex flex-wrap border-b border-b-color">
                                    <li class="nav-item"><a href="#about-me" class="nav-link px-4 py-2 sm:mr-[1.875rem] mr-0 block text-[#828690] sm:text-base text-sm font-medium border-b-[0.0125rem] duration-500 hover:text-primary border-transparent tab-btn active show" data-tab="tab-one">@lang('locale.about')</a></li>
                                    <li class="nav-item"><a href="#profile-settings" class="nav-link px-4 py-2 sm:mr-[1.875rem] mr-0 block text-[#828690] sm:text-base text-sm font-medium border-b-[0.0125rem] duration-500 hover:text-primary border-transparent tab-btn" data-tab="tab-two">@lang('locale.contract', ['suffix'=>'s'])</a></li>
                                </ul>
                                <div class="tab-content-area">
                                    <div id="tab-one" class="tab-content active show">
                                        @if(!empty($partner->about))
                                        <div class="profile-about-me">
                                            <div class="pt-6 border-bottom-1 pb-2">
                                                <h4 class="text-primary text-lg mb-2">@lang('locale.about')</h4>
                                                <p class="mb-2">{{ $partner->about }}.</p>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="profile-skills my-2">
                                            <a href="javascript:void(0);" class="btn btn-primary py-[0.438rem] text-xs font-medium rounded text-primary bg-primary-light leading-5 inline-block  duration-500 hover:bg-primary hover:text-white mb-1 light mr-1 px-4">{{ $partner->type }}</a>
                                        </div>
                                        <div class="profile-personal-info">
                                            <div class="row mb-2">
                                                <div class="sm:w-1/4 w-5/12">
                                                    <h5 class="font-medium mb-2">@lang('locale.company') <span class="pull-end">:</span></h5>
                                                </div>
                                                <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs">{{ $partner->company }}</span></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="sm:w-1/4 w-5/12">
                                                    <h5 class="font-medium mb-2">@lang('locale.email') <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs">{{ $partner->email }}</span></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="sm:w-1/4 w-5/12">
                                                    <h5 class="font-medium mb-2">@lang('locale.address') <span class="pull-end">:</span></h5>
                                                </div>
                                                <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs">{{ $partner->address }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-two" class="tab-content">
                                        <div class="pt-4">
                                            <div class="overflow-x-auto active-projects ItemsCheckboxSec task-table dz-scroll pb-2">
                                                <div class="p-5"><h5>@lang('locale.contract', ['suffix'=>'s'])</h5></div>
                                                <table id="empoloyeestbl2" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">#</th>
                                                            <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.contract', ['suffix'=>''])</th>
                                                            <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.cost')</th>
                                                            <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.delay')</th>
                                                            <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.affectation', ['suffix'=>'s'])</th>
                                                            <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.status')</th>
                                                            <th class="text-right text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-nonewhitespace-nowrap">@lang('locale.actions')</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($partner->contracts as $item)
                                                        <tr>
                                                            <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap"><span class="text-[13px] font-normal text-body-color dark:text-white">{{ $loop->iteration }}</span></td>
                                                            <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                                                <div class="products">
                                                                    <div>
                                                                        <h6 class="text-sm">{{ $item->title }}</h6>
                                                                        <span class="text-[13px] font-normal text-body-color dark:text-white">Ref ID:{{ $item->ref }}</span>
                                                                    </div>	
                                                                </div>
                                                            </td>
                                                            <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                                                <div class="products">
                                                                    <div>
                                                                        <h6 class="text-sm">@lang('locale.cost'): {{ moneyformat($item->cost) }}</h6>
                                                                        <span class="text-[13px] font-normal text-body-color dark:text-white">@lang('locale.workforce'): {{ moneyformat($item->workforce) }}</span>
                                                                    </div>	
                                                                </div>
                                                            </td>
                                                            <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                                                <div class="products">
                                                                    <div>
                                                                        <h6 class="text-sm">@lang('locale.began_at'): {{ date('d/m/Y', strtotime($item->began_at)) }}</h6>
                                                                        <span class="text-[13px] font-normal text-body-color dark:text-white">@lang('locale.ended_at'): {{ date('d/m/Y', strtotime($item->ended_at)) }}</span>
                                                                    </div>	
                                                                </div>
                                                            </td>
                                                            <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                                                <div class="avatar-list avatar-list-stacked">
                                                                    @foreach($item->affectations as $affected)
                                                                    <img src="{{ asset($item->photo ?? 'images/profile.png') }}" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="PROFILE">
                                                                    @endforeach
                                                                </div>
                                                            </td>	
                                                            <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                                                <span class="text-{{ $item->status =='NON DEBUTE' ? 'primary' : ($item->status == 'EN COURS' ? 'warning' : ($item->status == 'TERMINE' ? 'success' : 'danger')) }} bg-{{ $item->status =='NON DEBUTE' ? 'primary' : ($item->status == 'EN COURS' ? 'warning' : ($item->status == 'TERMINE' ? 'success' : 'danger')) }}-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium mr-1">{{ $item->status }}</span>
                                                            </td>
                                                            <td class="text-right border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                                                <a class="rounded py-[5px] px-3 text-[13px] text-primary bg-primary leading-[18px] inline-block border border-primary-light bg-primary-light hover:text-white hover:bg-primary" href="{{ route('contracts.edit', $item->id) }}" style="display: inline-block"><i class="fa fa-edit"></i></a>
                                                                <form action="{{ route('contracts.destroy', $item->id) }}" method="post" style="display: inline-block">
                                                                    @method('DELETE') @csrf
                                                                    <button class="rounded py-[5px] px-3 text-[13px] text-danger bg-danger leading-[18px] inline-block border border-danger-light bg-danger-light hover:text-white hover:bg-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="fa fa-trash"></i></button>
                                                                </form>
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
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script>
	<script src="{{ asset('js/plugins-init/datatables.init.min.js') }}"></script>
	<script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script> 
    @endpush
</x-app-layout>

