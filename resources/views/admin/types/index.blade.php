
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
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>@lang('locale.type', ['suffix'=>'s'])</a></li>
        </ol>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="w-full">
                <div class="card overflow-hidden relative">
                    <div class="card-body p-0">
                        <div class="overflow-x-auto active-projects style-1">
                            <div class="tbl-caption flex justify-between items-center flex-wrap p-5 relative z-[2]">
                                <h4 class="max-sm:mb-2.5">@lang('locale.type', ['suffix'=>'s'])</h4>
                                <div>
                                    <a class="rounded py-[5px] px-3 text-[13px] text-success bg-success leading-[18px] inline-block border border-success-light bg-success-light hover:text-white hover:bg-success dz-modal-btn" data-dz-modal="new-type">+ @lang('locale.add')</a>
                                </div>
                            </div>
                            <table id="empoloyees-tblwrapper" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-[13px] py-2.5 pl-4 pr-0 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">#</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.type', ['suffix'=>''])</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-left">@lang('locale.created_at')</th>
                                        <th class="text-[13px] py-2.5 px-4 bg-[#F0F4F9] text-[#374557] capitalize font-medium bg-none whitespace-nowrap text-right">@lang('locale.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $item)
                                    <tr>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 pl-4 pr-0 font-normal whitespace-nowrap">
                                            <span class="text-body-color dark:text-white text-[13px]">{{ $loop->iteration }}</span>
                                        </td>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                            <div class="products flex items-center">
                                                <div>
                                                    <h6 class="text-sm whitespace-nowrap">{{ $item->type }}</h6>
                                                    <span class="text-body-color dark:text-white text-xs">{{ $item->description }}</span>	
                                                </div>	
                                            </div>
                                        </td>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap">
                                            <span class="text-body-color dark:text-white text-[13px]">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span>
                                        </td>	
                                        <td class="border-b border-[#E6E6E6] dark:border-[#444444] text-[13px] py-2.5 px-4 font-normal whitespace-nowrap text-right">
                                            <a class="rounded py-[5px] px-3 text-[13px] text-primary bg-primary leading-[18px] inline-block border border-primary-light bg-primary-light hover:text-white hover:bg-primary dz-modal-btn" data-dz-modal="edit-type{{ $item->id }}" style="display: inline-block"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('types.destroy', $item->id) }}" method="post" style="display: inline-block">
                                                @method('DELETE') @csrf
                                                <button class="rounded py-[5px] px-3 text-[13px] text-danger bg-danger leading-[18px] inline-block border border-danger-light bg-danger-light hover:text-white hover:bg-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <x-edit-type :type="$item"></x-edit-type>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-add-type></x-add-type>
    @push('scripts')
    <script src="{{ asset('vendor/chart.js/chart.bundle.min.js') }}"></script>
	
	<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script>
	<script src="{{ asset('js/plugins-init/datatables.init.min.js') }}"></script>
	<script src="{{ asset('vendor/tagify/dist/tagify.min.js') }}"></script>
	<script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>
    @endpush
</x-app-layout>



