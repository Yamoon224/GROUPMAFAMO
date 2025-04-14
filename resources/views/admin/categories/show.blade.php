<x-app-layout>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">@lang('locale.partner', ['suffix'=>''])</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">@lang('locale.partner', ['suffix'=>'s'])</a></li>
                <li class="breadcrumb-item">{{ $partner->company }}</li>
            </ul>
        </div>
    </div>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="mb-2 text-center">
                            <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3">
                                    <img src="{{ asset( $partner->logo ?? 'images/profile.png' ) }}" alt="" class="img-fluid">
                                </div>
                                <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 76%; right: 10px">
                                    <i class="bi bi-patch-check-fill"></i>
                                </div>
                            </div>
                            <div class="mb-4">
                                <a class="fs-14 fw-bold d-block"> {{ $partner->company }}</a>
                                <a class="fs-12 fw-normal text-muted d-block">{{ $partner->owner }}</a>
                            </div>
                            <div class="fs-12 fw-normal text-muted text-center d-flex flex-wrap gap-3 mb-4">
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder">{{ $partner->contracts->count() }}</h6>
                                    <p class="fs-12 text-muted mb-0">@lang('locale.contract', ['suffix'=>'(s)'])</p>
                                </div>
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder">0</h6>
                                    <p class="fs-12 text-muted mb-0">@lang('locale.billing', ['suffix'=>''])</p>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-2">
                            <li class="hstack justify-content-between mb-2">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-map-pin"></i><a class="float-end">{{ $partner->address}}</a></span>
                            </li>
                            <li class="hstack justify-content-between mb-2">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-phone"></i><a href="tel:+224{{ $partner->phone }}" class="float-end"> {{ $partner->phone }}</a></span>
                            </li>
                            <li class="hstack justify-content-between mb-0">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i><a href="mailto:{{ $partner->email }}" class="float-end">{{ $partner->email}}</a></span>
                            </li>
                        </ul>
                        <form action="{{ route('partners.destroy', $partner->id) }}" method="post">
                            @csrf @method('DELETE')
                            <div class="d-flex gap-2 text-center pt-2">
                                <button class="w-50 btn btn-danger" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false">
                                    <i class="feather-trash-2 me-2"></i>
                                    <span>@lang('locale.delete')</span>
                                </button>
                                <a href="{{ route('partners.edit', $partner->id) }}" class="w-50 btn btn-primary">
                                    <i class="feather-edit me-2"></i>
                                    <span>@lang('locale.edit')</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <div class="card border-top-0">
                    <div class="card-header p-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab">@lang('locale.contract', ['suffix'=>'s'])</a>
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#billingTab" role="tab">@lang('locale.billing', ['suffix'=>'s'])</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                            <div class="about-section mb-5">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Profile About:</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Updates</a>
                                </div>
                                <p>John Doe is a frontend developer with over 5 years of experience creating high-quality, user-friendly websites and web applications. He has a strong understanding of web development technologies and a keen eye for design.</p>
                                <p>John is proficient in languages such as HTML, CSS, and JavaScript, and is experienced in using popular frontend frameworks such as React and Angular. He is also well-versed in user experience design and uses his knowledge to create engaging and intuitive user interfaces.</p>
                                <p>Throughout his career, John has worked on a wide range of projects for clients in various industries, including e-commerce, healthcare, and education. He takes a collaborative approach to development and enjoys working closely with clients and other developers to bring their ideas to life.</p>
                            </div>
                            <div class="profile-details mb-5">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Profile Details:</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Edit Profile</a>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Full Name:</div>
                                    <div class="col-sm-6 fw-semibold">Alexandra Della</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Surname:</div>
                                    <div class="col-sm-6 fw-semibold">Della</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Company:</div>
                                    <div class="col-sm-6 fw-semibold">WRAPCODERS</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Date of Birth:</div>
                                    <div class="col-sm-6 fw-semibold">26 May, 2000</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Mobile Number:</div>
                                    <div class="col-sm-6 fw-semibold">+01 (375) 5896 3214</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Email Address:</div>
                                    <div class="col-sm-6 fw-semibold">alex.della@outlook.com</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Location:</div>
                                    <div class="col-sm-6 fw-semibold">California, United States</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Joining Date:</div>
                                    <div class="col-sm-6 fw-semibold">20 Dec, 2023</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Country:</div>
                                    <div class="col-sm-6 fw-semibold">United States</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Communication:</div>
                                    <div class="col-sm-6 fw-semibold">Email, Phone</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Allow Changes:</div>
                                    <div class="col-sm-6 fw-semibold">YES</div>
                                </div>
                                <div class="row g-0">
                                    <div class="col-sm-6 text-muted">Website:</div>
                                    <div class="col-sm-6 fw-semibold">https://wrapcoders.com</div>
                                </div>
                            </div>
                            <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-warning-message profile-overview-alert" role="alert">
                                <div class="me-4 d-none d-md-block">
                                    <i class="feather feather-alert-triangle fs-1"></i>
                                </div>
                                <div>
                                    <p class="fw-bold mb-1 text-truncate-1-line">Your profile has not been updated yet!!!</p>
                                    <p class="fs-10 fw-medium text-uppercase text-truncate-1-line">Last Update: <strong>26 Dec, 2023</strong></p>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-soft-warning text-warning d-inline-block">Update Now</a>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="project-section">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Projects Details:</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View Alls</a>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-12 col-md-6">
                                        <div class="border border-dashed border-gray-5 rounded mb-4 md-lg-0">
                                            <div class="p-4">
                                                <div class="d-sm-flex align-items-center">
                                                    <div class="wd-50 ht-50 p-2 bg-gray-200 rounded-2">
                                                        <img src="assets/images/brand/github.png" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="ms-0 mt-4 ms-sm-3 mt-sm-0">
                                                        <a href="javascript:void(0);" class="d-block">Mailbox Platform Github</a>
                                                        <div class="fs-12 d-block text-muted">Development</div>
                                                    </div>
                                                </div>
                                                <div class="my-4 text-muted text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias dolorem necessitatibus temporibus nemo commodi eaque dignissimos itaque unde hic, sed rerum doloribus possimus minima nobis porro facilis voluptatum atque asperiores perspiciatis saepe laboriosam rem cupiditate libero sit.</div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="img-group lh-0 ms-3">
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Janette Dalton">
                                                            <img src="assets/images/avatar/2.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Michael Ksen">
                                                            <img src="assets/images/avatar/3.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Socrates Itumay">
                                                            <img src="assets/images/avatar/4.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                                            <img src="assets/images/avatar/5.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                                            <img src="assets/images/avatar/6.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-text avatar-sm bg-soft-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Explorer More">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                    </div>
                                                    <div class="badge bg-soft-primary text-primary">Inprogress</div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-3 border-top border-top-dashed border-gray-5 d-flex justify-content-between gap-2">
                                                <div class="w-75 d-none d-md-block">
                                                    <small class="fs-11 fw-medium text-uppercase text-muted d-flex align-items-center justify-content-between">
                                                        <span>Progress</span>
                                                        <span>80%</span>
                                                    </small>
                                                    <div class="progress mt-1 ht-3">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"></div>
                                                    </div>
                                                </div>
                                                <span class="mx-2 text-gray-400 d-none d-md-block">|</span>
                                                <a href="javascript:void(0);" class="fs-12 fw-bold">View &rarr;</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-12 col-md-6">
                                        <div class="border border-dashed border-gray-5 rounded">
                                            <div class="p-4">
                                                <div class="d-sm-flex align-items-center">
                                                    <div class="wd-50 ht-50 p-2 bg-gray-200 rounded-2">
                                                        <img src="assets/images/brand/figma.png" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="ms-0 mt-4 ms-sm-3 mt-sm-0">
                                                        <a href="javascript:void(0);" class="d-block">Chatting Platform Figme</a>
                                                        <div class="fs-12 text-muted">Design</div>
                                                    </div>
                                                </div>
                                                <div class="my-4 text-muted text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias dolorem necessitatibus temporibus nemo commodi eaque dignissimos itaque unde hic, sed rerum doloribus possimus minima nobis porro facilis voluptatum atque asperiores perspiciatis saepe laboriosam rem cupiditate libero sit.</div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="img-group lh-0 ms-3">
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Janette Dalton">
                                                            <img src="assets/images/avatar/2.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Michael Ksen">
                                                            <img src="assets/images/avatar/3.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Socrates Itumay">
                                                            <img src="assets/images/avatar/4.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                                            <img src="assets/images/avatar/5.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-image avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                                            <img src="assets/images/avatar/6.png" class="img-fluid" alt="image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="avatar-text avatar-sm bg-soft-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Explorer More">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                    </div>
                                                    <div class="badge bg-soft-success text-success">Completed</div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-3 border-top border-top-dashed border-gray-5 d-flex justify-content-between gap-2">
                                                <div class="w-75 d-none d-md-block">
                                                    <small class="fs-10 fw-medium text-uppercase text-muted d-flex align-items-center justify-content-between">
                                                        <span>progress</span>
                                                        <span>100%</span>
                                                    </small>
                                                    <div class="progress mt-1 ht-3">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                                    </div>
                                                </div>
                                                <span class="mx-2 text-gray-400 d-none d-md-block">|</span>
                                                <a href="javascript:void(0);" class="fs-12 fw-bold">View &rarr;</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="billingTab" role="tabpanel">
                            <div class="alert alert-dismissible m-4 p-4 d-flex alert-soft-teal-message" role="alert">
                                <div class="me-4 d-none d-md-block">
                                    <i class="feather feather-alert-octagon fs-1"></i>
                                </div>
                                <div>
                                    <p class="fw-bold mb-1 text-truncate-1-line">We need your attention!</p>
                                    <p class="fs-12 fw-medium text-truncate-1-line">Your payment was declined. To start using tools, please <strong>Add Payment Method</strong></p>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-soft-teal text-teal d-inline-block">Add Payment Method</a>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="subscription-plan px-4 pt-4">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Subscription & Plan:</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">4 days remaining</a>
                                </div>
                                <div class="p-4 mb-4 d-xxl-flex d-xl-block d-md-flex align-items-center justify-content-between gap-4 border border-dashed border-gray-5 rounded-1">
                                    <div>
                                        <div class="fs-14 fw-bold text-dark mb-1">Your current plan is <a href="javascript:void(0);" class="badge bg-primary text-white ms-2">Team Plan</a></div>
                                        <div class="fs-12 text-muted">A simple start for everyone</div>
                                    </div>
                                    <div class="my-3 my-xxl-0 my-md-3 my-md-0">
                                        <div class="fs-20 text-dark"><span class="fw-bold">$29.99</span> / <em class="fs-11 fw-medium">Month</em></div>
                                        <div class="fs-12 text-muted mt-1">Billed Monthly / Next payment on 12/10/2023 for <strong class="text-dark">$62.48</strong></div>
                                    </div>
                                    <div class="hstack gap-3">
                                        <a href="javascript:void(0);" class="text-danger">Cancel Plan</a>
                                        <a href="javascript:void(0);" class="btn btn-light-brand">Update Plan</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-4 col-xl-12 col-lg-4">
                                        <a href="javascript:void(0);" class="p-4 mb-4 d-block bg-soft-100 border border-dashed border-gray-5 rounded-1">
                                            <h6 class="fs-13 fw-bold">BASIC</h6>
                                            <p class="fs-12 fw-normal text-muted">Starter plan for individuals.</p>
                                            <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi, impedit exercitationem harum voluptates reiciendis.</p>
                                            <div class="mt-4"><span class="fs-16 fw-bold text-dark">$12.99</span> / <em class="fs-11 fw-medium">Month</em></div>
                                        </a>
                                    </div>
                                    <div class="col-xxl-4 col-xl-12 col-lg-4">
                                        <a href="javascript:void(0);" class="p-4 mb-4 d-block bg-soft-200 border border-dashed border-gray-5 rounded-1 position-relative">
                                            <h6 class="fs-13 fw-bold">TEAM</h6>
                                            <p class="fs-12 fw-normal text-muted">Collaborate up to 10 people.</p>
                                            <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi, impedit exercitationem harum voluptates reiciendis.</p>
                                            <div class="mt-4"><span class="fs-16 fw-bold text-dark">$29.99</span> / <em class="fs-11 fw-medium">Month</em></div>
                                            <div class="position-absolute top-0 start-50 translate-middle">
                                                <i class="feather-check fs-12 bg-primary text-white p-1 rounded-circle"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xxl-4 col-xl-12 col-lg-4">
                                        <a href="javascript:void(0);" class="p-4 mb-4 d-block bg-soft-100 border border-dashed border-gray-5 rounded-1">
                                            <h6 class="fs-13 fw-bold">ENTERPRISE</h6>
                                            <p class="fs-12 fw-normal text-muted">For bigger businesses.</p>
                                            <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi, impedit exercitationem harum voluptates reiciendis.</p>
                                            <div class="mt-4"><span class="fs-16 fw-bold text-dark">$49.99</span> / <em class="fs-11 fw-medium">Month</em></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="payment-methord px-4">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Payment Methords:</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Add Methord</a>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-12 col-lg-6">
                                        <div class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1 position-relative">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="wd-100">
                                                    <img src="assets/images/payment/mastercard.svg" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-0 ms-sm-3">
                                                    <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                    <div class="mb-0 text-truncate-1-line">5155 **** **** ****</div>
                                                    <small class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card expires at 12/24</small>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 mt-3 mt-sm-0">
                                                <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                            </div>
                                            <div class="position-absolute top-50 start-0 translate-middle">
                                                <i class="feather-check fs-12 bg-primary text-white p-1 rounded-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-12 col-lg-6">
                                        <div class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="wd-100">
                                                    <img src="assets/images/payment/visa.svg" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-0 ms-sm-3">
                                                    <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                    <div class="mb-0 text-truncate-1-line">4236 **** **** ****</div>
                                                    <small class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card expires at 11/23</small>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 mt-3 mt-sm-0">
                                                <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-12 col-lg-6">
                                        <div class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="wd-100">
                                                    <img src="assets/images/payment/american-express.svg" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-0 ms-sm-3">
                                                    <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                    <div class="mb-0 text-truncate-1-line">3437 **** **** ****</div>
                                                    <small class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card expires at 11/24</small>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 mt-3 mt-sm-0">
                                                <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-12 col-lg-6">
                                        <div class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="wd-100">
                                                    <img src="assets/images/payment/discover.svg" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-0 ms-sm-3">
                                                    <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                    <div class="mb-0 text-truncate-1-line">6011 **** **** ****</div>
                                                    <small class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card expires at 11/25</small>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 mt-3 mt-sm-0">
                                                <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="payment-history">
                                <div class="mb-4 px-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Billing History:</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Alls History</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr class="border-top">
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="javascript:void(0);">#258963</a></td>
                                                <td>02 NOV, 2022</td>
                                                <td>$350</td>
                                                <td><span class="badge bg-soft-success text-success">Completed</span></td>
                                                <td class="hstack justify-content-end gap-4 text-end">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Sent Mail">
                                                        <i class="feather feather-send fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Invoice Details">
                                                        <i class="feather feather-eye fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options">
                                                        <i class="feather feather-more-vertical fs-12"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#987456</a></td>
                                                <td>05 DEC, 2022</td>
                                                <td>$590</td>
                                                <td><span class="badge bg-soft-warning text-warning">Pendign</span></td>
                                                <td class="hstack justify-content-end gap-4 text-end">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Sent Mail">
                                                        <i class="feather feather-send fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Invoice Details">
                                                        <i class="feather feather-eye fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options">
                                                        <i class="feather feather-more-vertical fs-12"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#456321</a></td>
                                                <td>31 NOV, 2022</td>
                                                <td>$450</td>
                                                <td><span class="badge bg-soft-danger text-danger">Reject</span></td>
                                                <td class="hstack justify-content-end gap-4 text-end">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Sent Mail">
                                                        <i class="feather feather-send fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Invoice Details">
                                                        <i class="feather feather-eye fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options">
                                                        <i class="feather feather-more-vertical fs-12"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#357951</a></td>
                                                <td>03 JAN, 2023</td>
                                                <td>$250</td>
                                                <td><span class="badge bg-soft-success text-success">Completed</span></td>
                                                <td class="hstack justify-content-end gap-4 text-end">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Sent Mail">
                                                        <i class="feather feather-send fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Invoice Details">
                                                        <i class="feather feather-eye fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options">
                                                        <i class="feather feather-more-vertical fs-12"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#258963</a></td>
                                                <td>02 NOV, 2022</td>
                                                <td>$350</td>
                                                <td><span class="badge bg-soft-success text-success">Completed</span></td>
                                                <td class="hstack justify-content-end gap-4 text-end">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Sent Mail">
                                                        <i class="feather feather-send fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Invoice Details">
                                                        <i class="feather feather-eye fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options">
                                                        <i class="feather feather-more-vertical fs-12"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#357951</a></td>
                                                <td>03 JAN, 2023</td>
                                                <td>$250</td>
                                                <td><span class="badge bg-soft-success text-success">Completed</span></td>
                                                <td class="hstack justify-content-end gap-4 text-end">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Sent Mail">
                                                        <i class="feather feather-send fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Invoice Details">
                                                        <i class="feather feather-eye fs-12"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options">
                                                        <i class="feather feather-more-vertical fs-12"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</x-app-layout>

