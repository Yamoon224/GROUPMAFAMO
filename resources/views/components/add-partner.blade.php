<div class="fixed top-0 right-0 flex flex-col xl:w-[800px] md:w-[500px] w-[350px] h-[100vh] z-[1045] bg-white dark:bg-[#1E1E1E] text-body-color duration-500 ease-in-out offcanvas is-closed" id="new-partner">
    <div class="ml-4 flex items-center justify-between p-4">
        <h5 class="modal-title" id="#gridSystemModal">@lang('locale.partner', ['suffix'=>''])</h5>
        <button type="button" class="offcanvas-close h-6 w-6 box-content bg-danger-light rounded-md text-lg mr-4 p-2 opacity-50 hover:opacity-100 text-red">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="p-4 overflow-y-auto overflow-x-hidden dz-scroll">
        <div class="container-fluid px-[15px] py-0">
            <form action="{{ route('partners.store') }}" method="post">
                @csrf
                <div class="row">	
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">@lang('locale.type', ['suffix'=>''])<span class="text-danger">*</span></label>
                        <select name="type" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                            <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                            <option value="ENTREPRISE">ENTREPRISE</option>
                            <option value="PARTICULIER">PARTICULIER</option>
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="company" class="form-label">@lang('locale.company') <span class="text-danger">*</span></label>
                        <input type="text" name="company" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="company" placeholder="@lang('locale.company')" required>
                    </div>	
                    <div class="xl:w-1/2 mb-4">
                        <label for="phone" class="form-label">@lang('locale.phone') <span class="text-danger">*</span></label>
                        <input type="tel" name="phone" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="phone" placeholder="@lang('locale.phone')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="email" class="form-label">@lang('locale.email') <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="email" placeholder="@lang('locale.email')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="address" class="form-label">@lang('locale.address') <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="address" placeholder="@lang('locale.address')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="owner" class="form-label">@lang('locale.owner') <span class="text-danger">*</span></label>
                        <input type="text" name="owner" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="owner" placeholder="@lang('locale.owner')" required>
                    </div>
                    <div class="w-full mb-3">
                        <label class="form-label">@lang('locale.about')</label>
                        <textarea rows="3" name="about" style="resize: none" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y"></textarea>
                    </div>	
                    <div class="w-full">
                        <button class="btn btn-success xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary offcanvas-close">@lang('locale.submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>	