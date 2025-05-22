<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}">@lang('locale.room', ['suffix'=>'s'])</a></li>
                        <li class="breadcrumb-item active">@lang('locale.show')</li>
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
                            <a href="#room-show" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="uil uil-building"></i> @lang('locale.details')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#room-image" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="uil uil-image-plus"></i> @lang('locale.image', ['suffix'=>'s'])
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="room-show">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="mb-2">
                                                <label for="establishment" class="col-form-label col-form-label-sm">@lang('locale.establishment', ['suffix'=>''])</label>
                                                <select id="establishment" name="establishment_id" readonly class="form-select form-control-sm">
                                                    <option> {{ $room->establishment->establishment }}</option>
                                                </select>
                                            </div>  
                                            <div class="mb-2">
                                                <label for="room" class="col-col-form-label col-form-label-sm">@lang('locale.room', ['suffix'=>''])</label>
                                                <input type="text" readonly value="{{ $room->name }}" class="form-control form-control-sm" name="name" id="room" placeholder="@lang('locale.room', ['suffix'=>''])">
                                            </div>                                    
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="mb-2">
                                                <label class="col-form-label col-form-label-sm">@lang('locale.category', ['suffix'=>app()->getLocale() == 'en' ? 'y' : ''])</label>
                                                <select name="category" readonly class="form-select form-control-sm">
                                                    <option>{{ $room->category }}</option>
                                                </select>
                                            </div>    
                                            <div class="mb-2">
                                                <label for="address" class="col-col-form-label col-form-label-sm">@lang('locale.address')</label>
                                                <input type="text" readonly value="{{ $room->address }}" class="form-control form-control-sm" name="address" id="address" placeholder="@lang('locale.address')">
                                            </div>                                    
                                        </div>
    
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label for="price" class="col-col-form-label col-form-label-sm">@lang('locale.nightly')</label>
                                                <input type="text" readonly value="{{ moneyformat($room->price) }}" min="10000" class="form-control form-control-sm" name="price" id="price" placeholder="@lang('locale.nightly')">
                                            </div>    
                                        </div>                                    
    
                                        <div class="col-12">                                        
                                            <div class="mb-2">
                                                <label for="description" class="col-form-label col-form-label-sm">@lang('locale.description')</label>
                                                <textarea name="description" class="form-control form-control-sm" id="description" placeholder="@lang('locale.description')" readonly>{{ $room->description }}</textarea>
                                            </div>
                                        </div>                     	
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="tab-pane" id="room-image">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="float-end">
                                                <a role="button" data-bs-toggle="modal" data-bs-target="#add-image" class="btn btn-sm btn-soft-success">@lang('locale.add')</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner" role="listbox">
                                                            @foreach ($room->images as $key => $item)
                                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                <img src="{{ asset($item->link) }}" alt="PHOTO" class="d-block img-fluid">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h3 class="text-white">
                                                                        <form action="{{ route('photos.index', $item->id) }}" method="post">
                                                                            @csrf @method('DELETE')
                                                                            <button class="btn btn-soft-danger">@lang('locale.delete')</button>
                                                                        </form>
                                                                    </h3>
                                                                    <p>{{ $item->description ?? __('locale.no_description') }}</p>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">@lang('locale.previous')</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">@lang('locale.next')</span>
                                                        </a>
                                                    </div>   
                                                </div>                           	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div> 
                <!-- end card body-->
            </div> 
            <!-- end card -->
        </div>
        <!-- end col-->
    </div> 
    <!-- end row-->

    <x-add-image></x-add-image>
</x-app-layout>



