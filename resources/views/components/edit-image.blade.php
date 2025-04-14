<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055] translate-y-[-50px] dz-modal-box model-close" id="edit-image{{ $image->id }}">
    <div class="modal-dialog modal-dialog-center max-w-[500px] mx-auto my-[1.75rem] w-auto relative pointer-events-none">
        <div class="modal-content mx-[10px] flex flex-col relative rounded-md bg-white dark:bg-[#242424] w-full pointer-events-auto">
            <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                <h1 class="modal-title text-base" id="exampleModalLabel1">@lang('locale.image', ['suffix'=>''])</h1>
                <button type="button" class="btn-close p-4"></button>
            </div>
            <div class="modal-body relative p-[1.875rem]">
                <form action="{{ route('photos.update', $image->id) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <input type='hidden' name='room_id' value='{{ $room->id }}'>
                    <div class="row">	
                        <div class="xl:w-full mb-4">
                            <label for="link" class="form-label">@lang('locale.image', ['suffix'=>''])</label>
                            <input type="file" name="link" accept=".png, .jpg, .jpep" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="link" placeholder="@lang('locale.photo')">
                        </div>
                        <div class="w-full mb-3">
                            <label class="form-label">@lang('locale.description')</label>
                            <textarea rows="3" name="description" style="resize: none" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y">{{ $image->description }}</textarea>
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