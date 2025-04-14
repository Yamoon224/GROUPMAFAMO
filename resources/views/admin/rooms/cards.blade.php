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
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>@lang('locale.partner', ['suffix'=>'s'])</a></li>
        </ol>
        <a class="text-primary dark:text-white text-[0.8125rem] leading-[1.5]" href="{{ route('partners.pdf') }}"><i class="fa fa-print"></i> @lang('locale.pdf')</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="w-full">
                <div class="flex justify-between items-center mb-3">
                    <div class="flex items-center w-3/5">
                        <input class="relative text-[0.76563rem] placeholder:text-[0.76563rem] py-1 px-[1.1rem] min-h-[2.5rem] border border-b-color block rounded-md duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full form-control-sm" type="text" id="partner-search" placeholder="@lang('locale.search')...">
                    </div>
                    <div class="flex items-center w-2/5">
                        <div class="icon-box w-[1.875rem] h-[1.875rem] leading-[1.7] inline-block relative text-center bg-secondary rounded-md mr-2">
                            <a href="{{ route('partners.index') }}">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5096 2.53165H7.41104C5.50437 2.52432 3.94146 4.04415 3.89654 5.9499V15.7701C3.85437 17.7071 5.38979 19.3121 7.32671 19.3552C7.35512 19.3552 7.38262 19.3561 7.41104 19.3552H14.7343C16.6538 19.2773 18.1663 17.6915 18.1525 15.7701V7.36798L13.5096 2.53165Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.2688 2.52084V5.18742C13.2688 6.48909 14.3211 7.54417 15.6228 7.54784H18.1482" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.0974 14.0786H8.1474" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.2229 10.6388H8.14655" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                        <a class="rounded py-[5px] px-3 text-[13px] text-success bg-success leading-[18px] inline-block border border-success-light bg-success-light hover:text-white hover:bg-success offcanvas-toggle" data-dz-offcanvas="new-partner">+ @lang('locale.add')</a>
                    </div>
                </div>
                <div class="row overflow-y-auto" id="partner-content">
                    @foreach ($partners as $item)
                    <div class="xl:w-1/4 lg:w-1/3 sm:w-1/3">
						<div class="card overflow-hidden">
							<div class="text-center p-4 relative z-[1] overlay-box" style="background-image: url({{ asset('images/big/img1.jpg') }});">
								<div class="profile-photo">
									<img src="{{ asset($item->logo ?? 'images/profile.png') }}" width="100" class="img-fluid rounded-full inline-block" alt="">
								</div>
								<h5 class="mt-4 mb-1 text-white">{{ $item->company }}</h5>
								<p class="text-white mb-0"><a href="{{ route('partners.show', $item->id) }}">{{ $item->type }} <i class="fa fa-eye"></i></a></p>
							</div>
							<ul class="list-group flex flex-col list-group-flush">
								<li class="list-group-item flex p-2 text-body-color dark:text-white text-sm justify-between"><strong class="text-center">{{ $item->owner }}</strong></li>
								<li class="list-group-item flex p-2 text-body-color dark:text-white text-sm justify-between"><span class="mb-0">@lang('locale.phone')</span> <strong class="">{{ $item->phone }}</strong></li>
							</ul>
                        </div>
					</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <x-add-partner></x-add-partner>
    @push('scripts')
	<script src="{{ asset('vendor/tagify/dist/tagify.min.js') }}"></script>
	<script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <script>
        $('#partner-search').on('keyup', function () {
            var search = $(this).val();
            $('#partner-content').load("{{ route('partners.search') }}", {'_token':$('meta[name="csrf-token"]').attr('content'), 'search':search, '_method':'GET'});
        })
    </script>
    @endpush
</x-app-layout>

