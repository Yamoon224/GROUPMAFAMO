<div class="fixed top-0 right-0 flex flex-col xl:w-[800px] md:w-[500px] w-[350px] h-[100vh] z-[1045] bg-white dark:bg-[#1E1E1E] text-body-color duration-500 ease-in-out offcanvas is-closed" id="new-employee">
    <div class="ml-4 flex items-center justify-between p-4">
        <h5 class="modal-title" id="#gridSystemModal">@lang('locale.employee', ['suffix'=>''])</h5>
        <button type="button" class="offcanvas-close h-6 w-6 box-content bg-danger-light rounded-md text-lg mr-4 p-2 opacity-50 hover:opacity-100 text-red">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="p-4 overflow-y-auto overflow-x-hidden dz-scroll">
        <div class="container-fluid px-[15px] py-0">
            <form action="{{ route('employees.store') }}" method="post">
                @csrf
                <div class="row">	
                    <div class="xl:w-full mb-4">
                        <label for="name" class="form-label">@lang('locale.name') <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="name" placeholder="@lang('locale.name')" required>
                    </div>	
                    <div class="xl:w-1/2 mb-4">
                        <label for="phone" class="form-label">@lang('locale.phone') <span class="text-danger">*</span></label>
                        <input type="tel" name="phone" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="phone" placeholder="@lang('locale.phone')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="email" class="form-label">@lang('locale.email')</label>
                        <input type="email" name="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="email" placeholder="@lang('locale.email')">
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="address" class="form-label">@lang('locale.address') <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="address" placeholder="@lang('locale.address')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">@lang('locale.gender')<span class="text-danger">*</span></label>
                        <select name="gender" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                            <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                            @foreach(['Mr','Mme'] as $item)
                                <option>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">@lang('locale.diploma')<span class="text-danger">*</span></label>
                        <select name="diploma" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                            <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                            @foreach(['CEP','BTS','BEPC','BACCALAUREAT','LICENCE','MASTER','PhD', 'AUTRE'] as $item)
                                <option>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">@lang('locale.family')<span class="text-danger">*</span></label>
                        <select name="family" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                            <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                            @foreach(['CELIBATAIRE','MARIE(E)','DIVORCE(E)'] as $item)
                                <option>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">@lang('locale.contracttype')<span class="text-danger">*</span></label>
                        <select name="contracttype" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                            <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                            @foreach(['CDI','CDD','STAGE','AUTRE'] as $item)
                                <option>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="position" class="form-label">@lang('locale.position') <span class="text-danger">*</span></label>
                        <input type="text" name="position" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="position" placeholder="@lang('locale.position')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="contractbegin" class="form-label">@lang('locale.contractbegin') <span class="text-danger">*</span></label>
                        <input type="date" name="contractbegin" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="contractbegin" placeholder="@lang('locale.contractbegin')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="contractend" class="form-label">@lang('locale.contractend') <span class="text-danger">*</span></label>
                        <input type="date" name="contractend" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="contractend" placeholder="@lang('locale.contractend')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="brut" class="form-label">@lang('locale.brut') <span class="text-danger">*</span></label>
                        <input type="number" name="brut" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="brut" placeholder="@lang('locale.brut')" min="100000" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="prime" class="form-label">@lang('locale.prime') <span class="text-danger">*</span></label>
                        <input type="number" name="prime" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="prime" value="0" min="0" placeholder="@lang('locale.prime')" required>
                    </div>	
                    <div class="xl:w-1/2 mb-4">
                        <label for="warrantyperson" class="form-label">@lang('locale.warrantyperson') <span class="text-danger">*</span></label>
                        <input type="text" name="warrantyperson" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="warrantyperson" placeholder="@lang('locale.warrantyperson')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="warrantyphone" class="form-label">@lang('locale.warrantyphone') <span class="text-danger">*</span></label>
                        <input type="text" name="warrantyphone" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="warrantyphone" placeholder="@lang('locale.warrantyphone')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="rib" class="form-label">@lang('locale.rib')</label>
                        <input type="text" name="rib" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="rib" placeholder="@lang('locale.rib')">
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="bank" class="form-label">@lang('locale.bank')</label>
                        <input type="text" name="bank" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="bank" placeholder="@lang('locale.bank')">
                    </div>	
                    <div class="w-full">
                        <button class="btn btn-success xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary offcanvas-close">@lang('locale.submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>	