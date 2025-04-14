<x-app-layout>
    <div class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white">
        <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
            <li>
                <a href="{{ route('employees.index') }}" class="text-[#828690] dark:text-white text-[13px]">
                    <svg class="mb-[3px] mr-1 inline-block" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    @lang('locale.partner', ['suffix'=>'s']) 
                </a>
            </li>
            <li class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"><a>@lang('locale.edit')</a></li>
        </ol>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body relative p-[1.875rem]">
                        <form action="{{ route('employees.update', $employee->id) }}" method="post">
                            @csrf @method('PUT')
                            <div class="row">	
                                <div class="xl:w-full mb-4">
                                    <label for="name" class="form-label">@lang('locale.name') <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $employee->name }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="name" placeholder="@lang('locale.name')" required>
                                </div>	
                                <div class="xl:w-1/2 mb-4">
                                    <label for="phone" class="form-label">@lang('locale.phone') <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" value="{{ $employee->phone }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="phone" placeholder="@lang('locale.phone')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="email" class="form-label">@lang('locale.email')</label>
                                    <input type="email" name="email" value="{{ $employee->email }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="email" placeholder="@lang('locale.email')">
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="address" class="form-label">@lang('locale.address') <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="{{ $employee->address }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="address" placeholder="@lang('locale.address')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label class="form-label">@lang('locale.gender')<span class="text-danger">*</span></label>
                                    <select name="gender" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                                        <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                                        @foreach(['Mr','Mme'] as $item)
                                            <option {{ $employee->gender == $item ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label class="form-label">@lang('locale.diploma')<span class="text-danger">*</span></label>
                                    <select name="diploma" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                                        <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                                        @foreach(['CEP','BTS','BEPC','BACCALAUREAT','LICENCE','MASTER','PhD', 'AUTRE'] as $item)
                                            <option {{ $employee->diploma == $item ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label class="form-label">@lang('locale.family')<span class="text-danger">*</span></label>
                                    <select name="family" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                                        <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                                        @foreach(['CELIBATAIRE','MARIE(E)','DIVORCE(E)'] as $item)
                                            <option {{ $employee->family == $item ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label class="form-label">@lang('locale.contracttype')<span class="text-danger">*</span></label>
                                    <select name="contracttype" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                                        <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                                        @foreach(['CDI','CDD','STAGE','AUTRE'] as $item)
                                            <option {{ $employee->contracttype == $item ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="position" class="form-label">@lang('locale.position') <span class="text-danger">*</span></label>
                                    <input type="text" name="position" value="{{ $employee->position }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="position" placeholder="@lang('locale.position')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="contractbegin" class="form-label">@lang('locale.contractbegin') <span class="text-danger">*</span></label>
                                    <input type="date" name="contractbegin" value="{{ $employee->contractbegin }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="contractbegin" placeholder="@lang('locale.contractbegin')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="contractend" class="form-label">@lang('locale.contractend') <span class="text-danger">*</span></label>
                                    <input type="date" name="contractend" value="{{ $employee->contractend }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="contractend" placeholder="@lang('locale.contractend')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="brut" class="form-label">@lang('locale.brut') <span class="text-danger">*</span></label>
                                    <input type="number" name="brut" value="{{ $employee->brut }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="brut" placeholder="@lang('locale.brut')" min="100000" required>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="prime" class="form-label">@lang('locale.prime') <span class="text-danger">*</span></label>
                                    <input type="number" name="prime" value="{{ $employee->prime }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="prime" value="0" min="0" placeholder="@lang('locale.prime')" required>
                                </div>	
                                <div class="xl:w-1/2 mb-4">
                                    <label for="warrantyperson" class="form-label">@lang('locale.warrantyperson') <span class="text-danger">*</span></label>
                                    <input type="text" name="warrantyperson" value="{{ $employee->warrantyperson }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="warrantyperson" placeholder="@lang('locale.warrantyperson')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="warrantyphone" class="form-label">@lang('locale.warrantyphone') <span class="text-danger">*</span></label>
                                    <input type="text" name="warrantyphone" value="{{ $employee->warrantyphone }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="warrantyphone" placeholder="@lang('locale.warrantyphone')" required>
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="rib" class="form-label">@lang('locale.rib')</label>
                                    <input type="text" name="rib" value="{{ $employee->rib }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="rib" placeholder="@lang('locale.rib')">
                                </div>
                                <div class="xl:w-1/2 mb-4">
                                    <label for="bank" class="form-label">@lang('locale.bank')</label>
                                    <input type="text" name="bank" value="{{ $employee->bank }}" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="bank" placeholder="@lang('locale.bank')">
                                </div>	
                                <div class="w-full">
                                    <button class="btn btn-success xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary offcanvas-close">@lang('locale.submit')</button>
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

