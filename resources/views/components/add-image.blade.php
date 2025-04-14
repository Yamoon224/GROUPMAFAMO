<div class="fixed top-0 right-0 flex flex-col xl:w-[800px] md:w-[500px] w-[350px] h-[100vh] z-[1045] bg-white dark:bg-[#1E1E1E] text-body-color duration-500 ease-in-out offcanvas is-closed" id="new-image">
    <div class="ml-4 flex items-center justify-between p-4">
        <h5 class="modal-title" id="#gridSystemModal">@lang('locale.image', ['suffix'=>''])</h5>
        <button type="button" class="offcanvas-close h-6 w-6 box-content bg-danger-light rounded-md text-lg mr-4 p-2 opacity-50 hover:opacity-100 text-red">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="p-4 overflow-y-auto overflow-x-hidden dz-scroll">
        <div class="container-fluid px-[15px] py-0">
            <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type='hidden' name='room_id' value='{{ $room->id }}'>
                <div class="row">	
                    <div class="xl:w-full mb-4">
                        <label for="link" class="form-label">@lang('locale.image', ['suffix'=>'']) <span class="text-danger">*</span></label>
                        <input type="file" name="link" accept=".png, .jpg, .jpep" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="link" placeholder="@lang('locale.photo')" required>
                    </div>
                    <div class="w-full mb-3">
                        <label class="form-label">@lang('locale.description')</label>
                        <textarea rows="3" name="description" style="resize: none" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y"></textarea>
                    </div>	
                    <div class="w-full">
                        <button class="btn btn-success xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary offcanvas-close">@lang('locale.submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>	