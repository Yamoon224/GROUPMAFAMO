<x-app-layout>
    @push('links')
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    @endpush

    <!-- row -->	
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
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>@lang('locale.contract', ['suffix'=>'s'])</a></li>
        </ol>
    </div>

    <div class="container-fluid">
        <div class="flex justify-between items-center mb-3">
            <h5 class="mb-0">@lang('locale.contract', ['suffix'=>'s'])</h5>
            <div class="flex items-center">
                <div class="icon-box w-[1.875rem] h-[1.875rem] leading-[1.7] inline-block relative text-center bg-secondary rounded-md mr-2">
                    <a href="task-summary.html">
                        <svg width="20" height="20" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.50032 3H2.66699V8.83333H8.50032V3Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.6668 3H11.8335V8.83333H17.6668V3Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.6668 12.1667H11.8335V18H17.6668V12.1667Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.50032 12.1667H2.66699V18H8.50032V12.1667Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                <a class="btn btn-primary duration-500 hover:bg-hover-primary py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary ml-2" href="{{ route('contracts.create') }}">+ @lang('locale.add', ['suffix'=>''])</a>
            </div>
        </div>
        <div class="row">
            <div class="w-full">
                <div class="card flex flex-col">
                    <div class="p-4">
                        <div class="row task">
                            <div class="xl:w-1/4 sm:w-1/4 w-1/2">
                                <div class="border-r border-[#E6E6E6] dark:border-[#444444] max-xl:mb-2">
                                    <div class="flex items-center">
                                        <h2 class="text-primary text-[23px] font-semibold mr-[9px] leading-[1] count">{{ $contracts->count() }}</h2>
                                        <span class="text-sm text-secondary dark:text-body-color font-medium">@lang('locale.contract', ['suffix'=>'s'])</span>
                                    </div>
                                    <p class="text-[13px]">@lang('locale.total')</p>
                                </div>
                            </div>
                            <div class="xl:w-1/4 sm:w-1/4 w-1/2">
                                <div class="border-r border-[#E6E6E6] dark:border-[#444444] max-xl:mb-2">
                                    <div class="flex items-center">
                                        <h2 class="text-warning text-[23px] font-semibold mr-[9px] leading-[1] count">{{ $contracts->where('status', 'EN COURS')->count() }}</h2>
                                        <span class="text-sm text-secondary dark:text-body-color font-medium">@lang('locale.contract', ['suffix'=>'s'])</span>
                                    </div>	
                                    <p class="text-[13px]">@lang('locale.inprogress')</p>
                                </div>
                            </div>
                            <div class="xl:w-1/4 sm:w-1/4 w-1/2">
                                <div class="border-r border-[#E6E6E6] dark:border-[#444444] max-xl:mb-2">
                                    <div class="flex items-center">
                                        <h2 class="text-danger text-[23px] font-semibold mr-[9px] leading-[1] count">{{ $contracts->where('status', 'ANNULE')->count() }}</h2>
                                        <span class="text-sm text-secondary dark:text-body-color font-medium">@lang('locale.contract', ['suffix'=>'s'])</span>
                                    </div>	
                                    <p class="text-[13px]">@lang('locale.canceled')</p>
                                </div>
                            </div>
                            <div class="xl:w-1/4 sm:w-1/4 w-1/2">
                                <div class="border-r border-[#E6E6E6] dark:border-[#444444] max-xl:mb-2">
                                    <div class="flex items-center">
                                        <h2 class="text-success text-[23px] font-semibold mr-[9px] leading-[1] count">{{ $contracts->where('status', 'TERMINE')->count() }}</h2>
                                        <span class="text-sm text-secondary dark:text-body-color font-medium">@lang('locale.contract', ['suffix'=>'s'])</span>
                                    </div>	
                                    <p class="text-[13px]">@lang('locale.completed')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="card flex flex-col">
                    <div class="card-body p-0">
                        <div class="overflow-x-auto active-projects ItemsCheckboxSec task-table dz-scroll pb-2">
                            <div class="p-5"><h5>@lang('locale.list')</h5></div>
                            <table id="empoloyeestbl2" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-[13px] py-2.5 pl-4 pr-0 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap style-1">
                                            <div class="form-check custom-checkbox block min-h-[1.3125rem] pl-[1.5em] mb-0.5">
                                                <input type="checkbox" class="form-check-input checkAll" id="checkInput" required>
                                                <label class="form-check-label" for="checkInput"></label>
                                            </div>
                                        </th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">#</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.partner', ['suffix'=>''])</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.contract', ['suffix'=>''])</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.cost')</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.delay')</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.affectation', ['suffix'=>'s'])</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none text-left whitespace-nowrap">@lang('locale.status')</th>
                                        <th class="text-right text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-nonewhitespace-nowrap">@lang('locale.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contracts as $item)
                                    <tr>
                                        <td class="text-[13px] font-normal py-2.5 pl-4 pr-0 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#444444]">
                                            <div class="form-check custom-checkbox block min-h-[1.3125rem] pl-[1.5em] mb-0.5">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox3" required>
                                                <label class="form-check-label" for="customCheckBox3"></label>
                                            </div>
                                        </td>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap"><span class="text-[13px] font-normal text-body-color dark:text-white">{{ $loop->iteration }}</span></td>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                            <div class="products">
                                                <div>
                                                    <h6 class="text-sm">{{ $item->partner->company }}</h6>
                                                    <span class="text-[13px] font-normal text-body-color dark:text-white">{{ $item->partner->owner }}</span>
                                                </div>	
                                            </div>
                                        </td>
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
        <div class="row m-0 flex w-full overflow-x-auto flex-nowrap dz-scroll max-md:block max-md:w-auto">
            <div class="md:w-[322px] md:min-w-[322px] pl-0 flex-[1_0_0%]">
                <div class="card h-full border-0 bg-transparent mb-0">
                    <div class="flex-auto draggable-zone dropzoneContainer">
                        <div class="mb-5 py-[0.938rem] px-[0.938rem] shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] border rounded-md bg-white dark:bg-[#242424] border-primary">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h5 class="mb-0">Not Started</h5>
                                    <span class="text-body-color text-sm">Tasks assigned to me: 18</span>
                                </div>
                                <div class="w-10 h-10 relative inline-block text-center leading-[2.5rem] bg-primary-light rounded-full">
                                    <h5 class="inline-block text-primary totalCount">18</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-[322px] md:min-w-[322px] pl-0 flex-[1_0_0%]">
                <div class="card h-full border-0 bg-transparent mb-0">
                    <div class="flex-auto draggable-zone dropzoneContainer">
                        <div class="mb-5 py-[0.938rem] px-[0.938rem] shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] border rounded-md bg-white dark:bg-[#242424] border-purple">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h5 class="mb-0">Not Started</h5>
                                    <span class="text-body-color text-sm">Tasks assigned to me: 18</span>
                                </div>
                                <div class="w-10 h-10 relative inline-block text-center leading-[2.5rem] bg-purple-light  rounded-full">
                                    <h5 class="inline-block text-purple totalCount">18</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-[322px] md:min-w-[322px] pl-0 flex-[1_0_0%]">
                <div class="card h-full border-0 bg-transparent mb-0">
                    <div class="flex-auto draggable-zone dropzoneContainer">
                        <div class="mb-5 py-[0.938rem] px-[0.938rem] shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] border rounded-md bg-white dark:bg-[#242424] border-warning">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h5 class="mb-0">Not Started</h5>
                                    <span class="text-body-color text-sm">Tasks assigned to me: 18</span>
                                </div>
                                <div class="w-10 h-10 relative inline-block text-center leading-[2.5rem] bg-[#ffeccc80]  rounded-full">
                                    <h5 class="inline-block text-warning totalCount">18</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-[322px] md:min-w-[322px] pl-0 flex-[1_0_0%]">
                <div class="card h-full border-0 bg-transparent mb-0">
                    <div class="flex-auto draggable-zone dropzoneContainer">
                        <div class="mb-5 py-[0.938rem] px-[0.938rem] shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] border rounded-md bg-white dark:bg-[#242424] border-danger">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h5 class="mb-0">Not Started</h5>
                                    <span class="text-body-color text-sm">Tasks assigned to me: 13</span>
                                </div>
                                <div class="w-10 h-10 relative inline-block text-center leading-[2.5rem] bg-danger-light  rounded-full">
                                    <h5 class="inline-block text-danger totalCount">13</h5>
                                </div>
                            </div>
                        </div>
                        <div class="border border-[#E6E6E6] dark:border-[#444444] mb-5 shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] rounded-md bg-white dark:bg-[#242424] draggable-handle draggable cursor-all-scroll">
                            <div class="p-[0.938rem]">
                                <div class="flex items-center">
                                    <div>
                                        <h6 class="text-sm">HTML template Issue Complete</h6>
                                        <span class="text-xs text-body-color">INV-100023456</span>
                                    </div>	
                                </div>
                                <div class="my-2">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic555.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic1.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                </div>
                                <div class="my-2">
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium mr-1">Issue</span>
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium ml-1">HTML</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="font-medium text-secondary dark:text-white mr-2">Status</p>
                                    <select class="status-select status-pending nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="pending">Pending</option>
                                      <option value="testing">Testing</option>
                                      <option value="complete">Complete</option>
                                      <option value="progress">In Progress</option>
                                    </select>
                                </div>
                                    
                            </div>	
                            <div class="p-[0.938rem] border-t border-[#E6E6E6] dark:border-[#444444] flex items-center justify-between">
                                <div class="footer-data">
                                    <span class="text-primary text-xs">Start Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="text-primary text-xs">End Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="block text-primary text-xs">Priority</span>
                                    <select class="status-select status-high nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="high" selected>High</option>
                                      <option value="medium">Medium</option>
                                      <option value="low">Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border border-[#E6E6E6] dark:border-[#444444] mb-5 shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] rounded-md bg-white dark:bg-[#242424] draggable-handle draggable cursor-all-scroll">
                            <div class="p-[0.938rem]">
                                <div class="flex items-center">
                                    <div>
                                        <h6 class="text-sm">HTML template Issue Complete</h6>
                                        <span class="text-xs text-body-color">INV-100023456</span>
                                    </div>	
                                </div>
                                <div class="my-2">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic555.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic1.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                </div>
                                <div class="my-2">
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium mr-1">Issue</span>
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium ml-1">HTML</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="font-medium text-secondary dark:text-white mr-2">Status</p>
                                    <select class="status-select status-pending nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="pending">Pending</option>
                                      <option value="testing">Testing</option>
                                      <option value="complete">Complete</option>
                                      <option value="progress">In Progress</option>
                                    </select>
                                </div>
                                    
                            </div>	
                            <div class="p-[0.938rem] border-t border-[#E6E6E6] dark:border-[#444444] flex items-center justify-between">
                                <div class="footer-data">
                                    <span class="text-primary text-xs">Start Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="text-primary text-xs">End Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="block text-primary text-xs">Priority</span>
                                    <select class="status-select status-medium nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="medium">Medium</option>
                                      <option value="low">Low</option>
                                      <option value="high">High</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-[322px] md:min-w-[322px] pl-0 flex-[1_0_0%]">
                <div class="card h-full border-0 bg-transparent mb-0">
                    <div class="flex-auto draggable-zone dropzoneContainer">
                        <div class="mb-5 py-[0.938rem] px-[0.938rem] shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] border rounded-md bg-white dark:bg-[#242424] border-success">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h5 class="mb-0">Complete</h5>
                                    <span class="text-body-color text-sm">Tasks assigned to me: 21</span>
                                </div>
                                <div class="w-10 h-10 relative inline-block text-center leading-[2.5rem] bg-success-light  rounded-full">
                                    <h5 class="inline-block text-success totalCount">13</h5>
                                </div>
                            </div>
                        </div>
                        <div class="border border-[#E6E6E6] dark:border-[#444444] mb-5 shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] rounded-md bg-white dark:bg-[#242424] draggable-handle draggable cursor-all-scroll">
                            <div class="p-[0.938rem]">
                                <div class="flex items-center">
                                    <div>
                                        <h6 class="text-sm">HTML template Issue Complete</h6>
                                        <span class="text-xs text-body-color">INV-100023456</span>
                                    </div>	
                                </div>
                                <div class="my-2">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic555.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic1.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                </div>
                                <div class="my-2">
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium mr-1">Issue</span>
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium ml-1">HTML</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="font-medium text-secondary dark:text-white mr-2">Status</p>
                                    <select class="status-select status-pending nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="pending">Pending</option>
                                      <option value="testing">Testing</option>
                                      <option value="complete">Complete</option>
                                      <option value="progress">In Progress</option>
                                    </select>
                                </div>
                                    
                            </div>	
                            <div class="p-[0.938rem] border-t border-[#E6E6E6] dark:border-[#444444] flex items-center justify-between">
                                <div class="footer-data">
                                    <span class="text-primary text-xs">Start Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="text-primary text-xs">End Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="block text-primary text-xs">Priority</span>
                                    <select class="status-select status-high nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="high" selected>High</option>
                                      <option value="medium">Medium</option>
                                      <option value="low">Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border border-[#E6E6E6] dark:border-[#444444] mb-5 shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] rounded-md bg-white dark:bg-[#242424] draggable-handle draggable cursor-all-scroll">
                            <div class="p-[0.938rem]">
                                <div class="flex items-center">
                                    <div>
                                        <h6 class="text-sm">HTML template Issue Complete</h6>
                                        <span class="text-xs text-body-color">INV-100023456</span>
                                    </div>	
                                </div>
                                <div class="my-2">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic555.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic1.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                </div>
                                <div class="my-2">
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium mr-1">Issue</span>
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium ml-1">HTML</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="font-medium text-secondary dark:text-white mr-2">Status</p>
                                    <select class="status-select status-pending nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="pending">Pending</option>
                                      <option value="testing">Testing</option>
                                      <option value="complete">Complete</option>
                                      <option value="progress">In Progress</option>
                                    </select>
                                </div>
                                    
                            </div>	
                            <div class="p-[0.938rem] border-t border-[#E6E6E6] dark:border-[#444444] flex items-center justify-between">
                                <div class="footer-data">
                                    <span class="text-primary text-xs">Start Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="text-primary text-xs">End Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="block text-primary text-xs">Priority</span>
                                    <select class="status-select status-medium nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="medium">Medium</option>
                                      <option value="low">Low</option>
                                      <option value="high">High</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border border-[#E6E6E6] dark:border-[#444444] mb-5 shadow-[0px_0px_13px_0px_rgba(82,63,105,0.05)] rounded-md bg-white dark:bg-[#242424] draggable-handle draggable cursor-all-scroll">
                            <div class="p-[0.938rem]">
                                <div class="flex items-center">
                                    <div>
                                        <h6 class="text-sm">HTML template Issue Complete</h6>
                                        <span class="text-xs text-body-color">INV-100023456</span>
                                    </div>	
                                </div>
                                <div class="my-2">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic555.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic1.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                    <img src="assets/images/contacts/pic666.jpg" class="avatar inline-block w-[1.875rem] h-[1.875rem] me-[-13px] rounded-full border-2 border-white dark:border-[#444444] relative object-cover duration-300 hover:z-[1]" alt="">
                                </div>
                                <div class="my-2">
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium mr-1">Issue</span>
                                    <span class="text-primary bg-primary-light dark:bg-[#1E1E1E] text-xs py-[5px] px-3 rounded-md leading-[1.5] font-medium ml-1">HTML</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="font-medium text-secondary dark:text-white mr-2">Status</p>
                                    <select class="status-select status-pending nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="pending">Pending</option>
                                      <option value="testing">Testing</option>
                                      <option value="complete">Complete</option>
                                      <option value="progress">In Progress</option>
                                    </select>
                                </div>
                                    
                            </div>	
                            <div class="p-[0.938rem] border-t border-[#E6E6E6] dark:border-[#444444] flex items-center justify-between">
                                <div class="footer-data">
                                    <span class="text-primary text-xs">Start Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="text-primary text-xs">End Date</span>
                                    <p class="text-body-color text-[13px]">06 Feb 2024</p>
                                </div>
                                <div class="footer-data">
                                    <span class="block text-primary text-xs">Priority</span>
                                    <select class="status-select status-high nice-select py-[3px] pl-2.5 pr-5 border-0 style-3 justify-end items-center text-xs font-medium">
                                      <option value="high" selected>High</option>
                                      <option value="medium">Medium</option>
                                      <option value="low">Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('vendor/chart.js/chart.bundle.min.js') }}"></script>
	
	<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script>
	<script src="{{ asset('js/plugins-init/datatables.init.min.js') }}"></script>
	<script src="{{ asset('vendor/tagify/dist/tagify.min.js') }}"></script>
	<script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>

    <script>
		$(document).ready(function() {
            var counters = $(".count");
            var countersQuantity = counters.length;
            var counter = [];

            for (i = 0; i < countersQuantity; i++) {
                counter[i] = parseInt(counters[i].innerHTML);
            }

            var count = function(start, value, id) {
                var localStart = start;
                setInterval(function() {
                if (localStart < value) {
                    localStart++;
                    counters[id].innerHTML = localStart;
                }
                }, 500);
            }

            for (j = 0; j < countersQuantity; j++) {
                count(0, counter[j], j);
            }
		});	
	</script>
    @endpush
</x-app-layout>

