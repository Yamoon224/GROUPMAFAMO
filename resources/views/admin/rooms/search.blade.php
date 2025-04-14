@foreach ($partners as $item)
<div class="xl:w-1/4 lg:w-1/3 sm:w-1/3">
    <div class="card overflow-hidden">
        <div class="text-center p-4 relative z-[1] overlay-box" style="background-image: url(assets/images/big/img1.jpg);">
            <div class="profile-photo">
                <img src="assets/images/profile/profile.png" width="100" class="img-fluid rounded-full inline-block" alt="">
            </div>
            <h5 class="mt-4 mb-1 text-white">{{ $item->company }}</h5>
            <p class="text-white mb-0"><a href="{{ route('partners.show', $item->id) }}">{{ $item->type }} <i class="fa fa-eye"></i></a></p>
        </div>
        <ul class="list-group flex flex-col list-group-flush">
            <li class="list-group-item flex p-4 text-body-color dark:text-white text-sm justify-between"><span class="mb-0">@lang('locale.owner')</span> <strong class="">{{ $item->owner }}</strong></li>
            <li class="list-group-item flex p-4 text-body-color dark:text-white text-sm justify-between"><span class="mb-0">@lang('locale.phone')</span> <strong class="">{{ $item->phone }}</strong></li>
        </ul>
    </div>
</div>
@endforeach