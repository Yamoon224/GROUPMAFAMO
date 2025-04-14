@foreach ($employees as $item)
<div class="xl:w-1/4 lg:w-1/3 sm:w-1/3">
    <div class="card overflow-hidden flex flex-col">
        <div class="sm:p-5 p-4 flex-auto">
            <div class="text-center">
                <div class="profile-photo">
                    <img src="{{ asset($item->photo ?? 'images/profile.png') }}" width="100" class="img-fluid rounded-full inline-block" alt="">
                </div>
                <h5 class="mt-3 mb-1">{{ $item->gender." ".$item->name }}</h5>
                <p class="mb-2">Ref ID: #{{ $item->ref }}</p>
                <a class="btn inline-block font-medium text-[15px] leading-5 py-[0.719rem] rounded-[2.5rem] border border-primary text-primary hover:bg-hover-primary hover:text-white duration-300 mt-4 px-12" href="{{ route('employees.show', $item->id) }}">@lang('locale.show') @lang('locale.profile')</a>
            </div>
        </div>
        
        <div class="card-footer px-5 text-center border-t border-[#E6E6E6] dark:border-[#444444]">
            <div class="row">
                <div class="w-1/2 pt-4 pb-4 border-r border-b-color">
                    <h3 class="mb-1"><i class="fa fa-phone"></i></h3><span class="text-body-color dark:text-white text-sm">{{ $item->phone }}</span>
                </div>
                <div class="w-1/2 pt-4 pb-4">
                    <h3 class="mb-1"><i class="fa fa-briefcase"></i></h3><span class="text-body-color dark:text-white text-sm">{{ $item->position }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach