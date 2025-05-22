<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('locale.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('locale.profile')</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ auth()->user()->name }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <!-- Profile -->
            <div class="card bg-primary">
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="{{ asset('images/profile.png') }}" alt="PROFILE" class="rounded-circle img-thumbnail">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <h4 class="mt-1 mb-1 text-white">{{ auth()->user()->name }}</h4>
                                        <p class="font-13 text-white-50">{{ auth()->user()->group->name }}</p>

                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1 text-white">@lang('locale.email')</h5>
                                                <p class="mb-0 font-13 text-white-50">{{ auth()->user()->email }}</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-1 text-white">@lang('locale.phone')</h5>
                                                <p class="mb-0 font-13 text-white-50">{{ auth()->user()->phone }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row -->

                </div> <!-- end card-body/ profile-user-box-->
            </div><!--end profile/ card -->
        </div> 
        <!-- end col-->
    </div>
    <!-- end row -->
</x-app-layout>





