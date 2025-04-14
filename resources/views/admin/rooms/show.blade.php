<x-app-layout>
    @push('links')
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">
    @endpush

    <div class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white">
        <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
            <li><a href="{{ route('rooms.index') }}" class="text-[#828690] dark:text-white text-[13px]">@lang('locale.room', ['suffix'=>'s'])</a></li>
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>{{ $room->name }}</a></li>
        </ol>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="w-full">
                <div class="card">
                    <div class="card-header flex justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2]">
                        <h4 class="heading blog-title relative">{{ $room->type->type." ".$room->name }}</h4>
                        <a href="javascript:void(0)" class="btn hover:bg-hover-primary duration-500 py-[5px] px-3 text-[13px] font-normal rounded text-white bg-primary leading-[18px] inline-block border border-primary offcanvas-toggle" data-dz-offcanvas="new-image">+ @lang('locale.add') @lang('locale.image', ['suffix'=>''])</a>
                    </div>
                    <div class="card-body sm:p-5 p-4">
                        <div class="row">
                            <div class="w-1/2">
                                <div class="blog-img relative">
                                    <img src="{{ asset($room->front) }}" alt="PHOTO I" class="sm:h-[400px] h-[300px] w-full object-cover rounded-md">
                                    <div class="absolute py-5 px-[15px] bottom-0">
                                        <h2 class="xl:text-3xl text-xl text-white leading-[1.1] font-semibold mb-2">PHOTO I</h2>
                                        <img src="{{ asset('images/profile.png') }}" class="h-[1.275rem] w-[1.275rem] relative inline-block object-cover rounded-full mr-2 small-post" alt="">
                                        <span class="text-white text-sm">{{ $room->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="blog-img relative">
                                    <img src="{{ asset($room->back) }}" alt="PHOTO II" class="sm:h-[400px] h-[300px] w-full object-cover rounded-md">
                                    <div class="absolute py-5 px-[15px] bottom-0">
                                        <h2 class="xl:text-3xl text-xl text-white leading-[1.1] font-semibold mb-2">PHOTO II</h2>
                                        <img src="{{ asset('images/profile.png') }}" class="h-[1.275rem] w-[1.275rem] relative inline-block object-cover rounded-full mr-2 small-post" alt="">
                                        <span class="text-white text-sm">{{ $room->address }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($room->images as $item)
                            <div class="xl:w-1/2 w-full">
                                <div class="flex mt-[25px] max-sm:flex-wrap">
                                    <img src="{{ asset($item->link) }}" alt="PHOTO" class="sm:w-[160px] w-full mr-[18px] sm:h-[130px] h-[200px] object-cover rounded-md">
                                    <div class="post-1">
                                        <div class="max-xl:mt-[15px]">
                                            <span class="text-xs py-[0.3125rem] px-2 leading-[0.6875rem] font-medium text-white text-center whitespace-nowrap rounded inline-block bg-info dz-modal-btn" data-dz-modal="edit-image{{ $item->id }}"><i class="fa fa-edit"></i> @lang('locale.edit')</span>
                                            <h4 class="text-[13px] mt-1.5 mb-2">{{ $item->description ?? __('locale.no_description') }}.</h4>
                                            <div>
                                                <img src="{{ asset('images/profile.png') }}" class="h-[1.275rem] w-[1.275rem] relative inline-block object-cover rounded-full mr-2 small-post" alt="PROFILE">
                                                <span class="text-xs text-body-color"><b class="text-primary">@lang('locale.created_at')</b> {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <x-edit-image :room="$room" :image="$item"></x-edit-image>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-add-image :room="$room"></x-add-image>
    @push('scripts')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script>
	<script src="{{ asset('js/plugins-init/datatables.init.min.js') }}"></script>
	<script src="{{ asset('vendor/niceselect/js/jquery.nice-select.min.js') }}"></script> 
    @endpush
</x-app-layout>

