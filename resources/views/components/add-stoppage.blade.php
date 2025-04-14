<div class="fixed top-0 right-0 flex flex-col xl:w-[800px] md:w-[500px] w-[350px] h-[100vh] z-[1045] bg-white dark:bg-[#1E1E1E] text-body-color duration-500 ease-in-out offcanvas is-closed" id="new-stoppage">
    <div class="ml-4 flex items-center justify-between p-4">
        <h5 class="modal-title" id="#gridSystemModal">@lang('locale.stoppage', ['suffix'=>''])</h5>
        <button type="button" class="offcanvas-close h-6 w-6 box-content bg-danger-light rounded-md text-lg mr-4 p-2 opacity-50 hover:opacity-100 text-red">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="p-4 overflow-y-auto overflow-x-hidden dz-scroll">
        <div class="container-fluid px-[15px] py-0">
            <form action="{{ route('stoppages.store') }}" method="post">
                @csrf
                <div class="row">	
                    <div class="xl:w-full mb-4">
                        <label class="form-label">@lang('locale.employee', ['suffix'=>'']) <span class="text-danger">*</span></label>
                        <select name="employee_id" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                            <option data-display="@lang('locale.select')">@lang('locale.select')</option>
                            @foreach($employees as $item)
                                <option value="{{ $item->id }}">{{ $item->name." | ".$item->phone." | ".$item->ref }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="xl:w-full mb-4">
                        <label class="form-label">@lang('locale.type', ['suffix'=>'']) <span class="text-danger">*</span></label>
                        <select name="type" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]" required>
                            @foreach(['CONGE','LICENCEMENT','SUSPENSION'] as $item)
                                <option>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="began_at" class="form-label">@lang('locale.beganat') <span class="text-danger">*</span></label>
                        <input type="date" name="began_at" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="began_at" placeholder="@lang('locale.beganat')" required>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="ended_at" class="form-label">@lang('locale.endedat') <span class="text-danger">*</span></label>
                        <input type="date" name="ended_at" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="ended_at" placeholder="@lang('locale.endedat')" required>
                    </div>
                    
                    <div class="w-full mb-3">
                        <label class="form-label">@lang('locale.reason') <span class="text-danger">*</span></label>
                        <textarea rows="3" name="reason" style="resize: none" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y"></textarea>
                    </div>	
                    <div class="w-full">
                        <button class="btn btn-success xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary offcanvas-close">@lang('locale.submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>	