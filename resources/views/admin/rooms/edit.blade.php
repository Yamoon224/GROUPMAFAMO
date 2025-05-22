<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}">@lang('locale.room', ['suffix'=>'s'])</a></li>
                        <li class="breadcrumb-item active">@lang('locale.edit')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('locale.room', ['suffix'=>''])</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#room-edit" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil-document-layout-center"></i> @lang('locale.edit')
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="room-edit">
                            <div class="card ribbon-box">
                                <div class="ribbon ribbon-primary float-start"><span class="text-danger">*</span> @lang('locale.fields_required')</div>
                                <div class="card-body">
                                    <form action="{{ route('rooms.update', $room->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label for="establishment" class="col-form-label col-form-label-sm">@lang('locale.establishment', ['suffix'=>''])</label>
                                                    <select id="establishment" name="establishment_id" class="form-select form-control-sm" required>
                                                        @foreach($establishments as $item)
                                                        <option value="{{ $item->id }}" {{ $room->establishment_id == $item->id ? 'selected' : '' }}>{{ $item->establishment }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>  
                                                <div class="mb-2">
                                                    <label for="room" class="col-col-form-label col-form-label-sm">@lang('locale.room', ['suffix'=>'']) <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $room->name }}" class="form-control form-control-sm" name="name" id="room" placeholder="@lang('locale.room', ['suffix'=>''])" required>
                                                </div>                                    
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="mb-2">
                                                    <label class="col-form-label col-form-label-sm">@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : '']) <span class="text-danger">*</span></label>
                                                    <select name="category" class="form-select form-control-sm" required>
                                                        <option value="">@lang('locale.select')</option>
                                                        @foreach(['SEJOUR', 'LOCATION', 'VENTE'] as $item)
                                                            <option {{ $room->category == $item ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>    
                                                <div class="mb-2">
                                                    <label for="address" class="col-col-form-label col-form-label-sm">@lang('locale.address') <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ $room->address }}" class="form-control form-control-sm" name="address" id="address" placeholder="@lang('locale.address')" required>
                                                </div>                                    
                                            </div>
        
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="price" class="col-col-form-label col-form-label-sm">@lang('locale.nightly') (GNF) <span class="text-danger">*</span></label>
                                                    <input type="number" value="{{ $room->price }}" min="10000" class="form-control form-control-sm" name="price" id="price" placeholder="@lang('locale.nightly')" required>
                                                </div>    
                                            </div>                                    
        
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                                <div class="mb-2">
                                                    <label for="front" class="col-form-label col-form-label-sm">@lang('locale.img_front')</label>
                                                    <input type="file" name="front" class="form-control form-control-sm" id="front" placeholder="@lang('locale.img_front')">
                                                </div>
                                            </div> 
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                                <div class="mb-2">
                                                    <label for="back" class="col-form-label col-form-label-sm">@lang('locale.img_back')</label>
                                                    <input type="file" name="back" class="form-control form-control-sm" id="back" placeholder="@lang('locale.img_back')">
                                                </div>
                                            </div>  
                                            <div class="col-12">                                        
                                                <div class="mb-2">
                                                    <label for="description" class="col-form-label col-form-label-sm">@lang('locale.description')</label>
                                                    <textarea name="description" class="form-control form-control-sm" id="description" placeholder="@lang('locale.description')">{{ $room->description }}</textarea>
                                                </div>
                                            </div>   
                                            <div class="col-12">
                                                <button class="btn btn-block w-100 btn-soft-primary">@lang('locale.submit')</button>    
                                            </div>                   	
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                        <!-- end preview-->
                    </div> 
                    <!-- end tab-content-->
                </div> 
                <!-- end card body-->
            </div> 
            <!-- end card -->
        </div>
        <!-- end col-->
    </div> 
    <!-- end row-->
</x-app-layout>



