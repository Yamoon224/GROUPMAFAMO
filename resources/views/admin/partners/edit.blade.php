<x-app-layout>
    <div class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white">
        <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
            <li>
                <a href="{{ route('partners.index') }}" class="text-[#828690] dark:text-white text-[13px]">
                    <svg class="mb-[3px] mr-1 inline-block" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    @lang('locale.partner', ['suffix'=>'s']) 
                </a>
            </li>
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>{{ $partner->company }}</a></li>
        </ol>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body relative p-[1.875rem]">
                        <form action="{{ route('partners.update', $partner-> id) }}" method="post">
                            @csrf @method('PUT')
                            <div class="row">	
                                <div class="xl:w-1/2 mb-4 mx-auto">
                                    <label class="form-label">@lang('locale.type', ['suffix'=>''])<span class="text-danger">*</span></label>
                                    <select name="type" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                                        <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                                        @foreach (['ENTREPRISE', 'PARTICULIER'] as $item)
                                        <option {{ $item == $partner->type ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="xl:w-1/2 mb-4 mx-auto">
                                    <label for="company" class="form-label">@lang('locale.company') <span class="text-danger">*</span></label>
                                    <input type="text" name="company" value="{{ $partner->company }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="company" placeholder="@lang('locale.company')" required>
                                </div>	
                                <div class="xl:w-1/2 mb-4 mx-auto">
                                    <label for="phone" class="form-label">@lang('locale.phone') <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" value="{{ $partner->phone }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="phone" placeholder="@lang('locale.phone')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4 mx-auto">
                                    <label for="email" class="form-label">@lang('locale.email') <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ $partner->email }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="email" placeholder="@lang('locale.email')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4 mx-auto">
                                    <label for="address" class="form-label">@lang('locale.address') <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="{{ $partner->address }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="address" placeholder="@lang('locale.address')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4 mx-auto">
                                    <label for="owner" class="form-label">@lang('locale.owner') <span class="text-danger">*</span></label>
                                    <input type="text" name="owner" value="{{ $partner->owner }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="owner" placeholder="@lang('locale.owner')" required>
                                </div>
                                <div class="w-full mb-3">
                                    <label class="form-label">@lang('locale.about')</label>
                                    <textarea rows="3" name="about" style="resize: none" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y">{{ $partner->about }}</textarea>
                                </div>	
                                <div class="w-full justify-end">
                                    <button class="rounded py-[5px] px-3 text-[13px] text-primary bg-primary leading-[18px] inline-block border border-primary-light bg-primary-light hover:text-white hover:bg-primary">@lang('locale.submit')</button>
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
    @endpush
</x-app-layout>

