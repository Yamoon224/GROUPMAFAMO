<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#hresource" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                    <span class="d-none d-md-block">@lang('locale.human_resource')</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#accountant" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">@lang('locale.accountability')</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#logistic" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                    <span class="d-none d-md-block">@lang('locale.logistic')</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="hresource">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                        <div class="card tilebox-one card-top-success">
                                            <div class="card-body">
                                                <i class='uil uil-users-alt float-end text-success'></i>
                                                <h6 class="text-uppercase mt-0">CDI</h6>
                                                <h2 class="my-2" id="active-users-count">{{ $employees->where('contracttype', 'CDI')->count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                        <div class="card tilebox-one card-bottom-info">
                                            <div class="card-body">
                                                <i class='uil uil-users-alt float-end text-info'></i>
                                                <h6 class="text-uppercase mt-0">CDD</h6>
                                                <h2 class="my-2" id="active-users-count">{{ $employees->where('contracttype', 'CDD')->count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                        <div class="card tilebox-one card-bottom-warning">
                                            <div class="card-body">
                                                <i class='uil uil-users-alt float-end text-warning'></i>
                                                <h6 class="text-uppercase mt-0">Vacataires</h6>
                                                <h2 class="my-2" id="active-users-count">{{ $employees->where('contracttype', 'STAGE')->count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                        <div class="card tilebox-one card-top-danger">
                                            <div class="card-body">
                                                <i class='uil uil-users-alt float-end text-danger'></i>
                                                <h6 class="text-uppercase mt-0">Femmes</h6>
                                                <h2 class="my-2" id="active-users-count">{{ $employees->where('gender', 'Mme')->count() }}</h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="card tilebox-one card-top-success">
                                            <div class="card-body">
                                                <i class='uil uil-users-alt float-end text-success'></i>
                                                <h6 class="text-uppercase mt-0">@lang('locale.employee', ['suffix'=>'s']) Marié(és)</h6>
                                                <h2 class="my-2" id="active-users-count">{{ $employees->where('family', 'MARIE(E)')->count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="card tilebox-one card-top-danger">
                                            <div class="card-body">
                                                <i class='uil uil-users-alt float-end text-danger'></i>
                                                <h6 class="text-uppercase mt-0">@lang('locale.employee', ['suffix'=>'s']) Célibataire(s)</h6>
                                                <h2 class="my-2" id="active-users-count">{{ $employees->where('family', 'CELIBATAIRE')->count() }}</h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div id="hrchart" class="mx-auto" style="height:400px; width:500px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="accountant">
                                <div class="row">
                                    <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card card-top-primary">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-sm rounded">
                                                            <span class="avatar-title bg-primary-lighten h3 my-0 text-primary rounded">
                                                                <i class="uil uil-invoice"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row align-items-end justify-content-between mt-1">
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">{{ moneyformat($quotations->sum('cost')) }}</p>
                                                        <h4 class="mt-0 text-muted fw-semibold mb-1">({{ $quotations->count() }}) @lang('locale.bill', ['suffix'=>'s'])</h4>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>  

                                    <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card card-bottom-success">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-sm rounded">
                                                            <span class="avatar-title bg-success-lighten h3 my-0 text-success rounded">
                                                                <i class="uil uil-receipt"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row align-items-end justify-content-between mt-1">
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">{{ moneyformat($billings->sum('amount')) }}</p>
                                                        <h4 class="mt-0 text-muted fw-semibold mb-1">({{ $billings->count() }}) @lang('locale.paid_bills')</h4>
                                                    </div>
                                                </div>
                                            </div> 
                                            <!-- end card-body -->
                                        </div> 
                                        <!-- end card -->
                                    </div>

                                    <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card card-top-warning">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-sm rounded">
                                                            <span class="avatar-title bg-warning-lighten h3 my-0 text-warning rounded">
                                                                <i class="uil uil-money-bill-stack"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row align-items-end justify-content-between mt-1">
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">{{ moneyformat($quotations->sum('cost') - $billings->sum('amount')) }}</p>
                                                        <h4 class="mt-0 text-muted fw-semibold mb-1">({{ $quotations->count() - $billings->count() }}) @lang('locale.remains')</h4>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card card-bottom-primary">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-sm rounded">
                                                            <span class="avatar-title bg-primary-lighten h3 my-0 text-primary rounded">
                                                                <i class="uil uil-books"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row align-items-end justify-content-between mt-1">
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">{{ moneyformat($employees->where('hastopay', true)->sum('net')) }}</p>
                                                        <h4 class="mt-0 text-muted fw-semibold mb-1">({{ $employees->where('hastopay', true)->count() }}) @lang('locale.salary', ['suffix'=>app()->getLocale() == 'en' ? 'ies' : 's'])</h4>
                                                    </div>
                                                </div>
                                            </div> <!-- end card-body -->
                                        </div> <!-- end card -->
                                    </div>

                                    <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card card-top-success">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-sm rounded">
                                                            <span class="avatar-title bg-success-lighten h3 my-0 text-success rounded">
                                                                <i class="uil uil-money-withdrawal"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row align-items-end justify-content-between mt-1">
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">{{ moneyformat($payments->sum(['amount'])) }}</p>
                                                        <h4 class="mt-0 text-muted fw-semibold mb-1">({{ $payments->count() }}) @lang('locale.payment', ['suffix'=>'s'])</h4>
                                                    </div>
                                                </div>
                                            </div> <!-- end card-body -->
                                        </div> <!-- end card -->
                                    </div>

                                    <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card card-bottom-warning">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-sm rounded">
                                                            <span class="avatar-title bg-warning-lighten h3 my-0 text-warning rounded">
                                                                <i class="uil uil-money-bill-stack"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row align-items-end justify-content-between mt-1">
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">{{ moneyformat($employees->where('hastopay', true)->sum('net') - $payments->sum(['amount'])) }}</p>
                                                        <h4 class="mt-0 text-muted fw-semibold mb-1">({{ $employees->where('hastopay', true)->count() - $payments->count() }}) @lang('locale.remains')</h4>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 

                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div id="accountchart" class="mx-auto" style="height:400px; width:500px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="logistic">
                                <p>...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">Channels</h4>
                <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i class="mdi mdi-download ms-1"></i></a>
            </div>

            <div class="card-body pt-0">

                <div class="table-responsive">
                    <table class="table table-sm table-centered mb-0 font-14">
                        <thead class="table-light">
                            <tr>
                                <th>Channel</th>
                                <th>Visits</th>
                                <th style="width: 40%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Direct</td>
                                <td>2,050</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 65%; height: 20px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Organic Search</td>
                                <td>1,405</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 45%; height: 20px;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Refferal</td>
                                <td>750</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%; height: 20px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Social</td>
                                <td>540</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">Social Media Traffic</h4>
                <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i class="mdi mdi-download ms-1"></i></a>
            </div>

            <div class="card-body pt-0">

                <div class="table-responsive">
                    <table class="table table-sm table-centered mb-0 font-14">
                        <thead class="table-light">
                            <tr>
                                <th>Network</th>
                                <th>Visits</th>
                                <th style="width: 40%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Facebook</td>
                                <td>2,250</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 65%; height: 20px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <td>1,501</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 45%; height: 20px;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Twitter</td>
                                <td>750</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 30%; height: 20px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>LinkedIn</td>
                                <td>540</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 25%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">Engagement Overview</h4>
                <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i class="mdi mdi-download ms-1"></i></a>
            </div>

            <div class="card-body pt-0">

                <div class="table-responsive">
                    <table class="table table-sm table-centered mb-0 font-14">
                        <thead class="table-light">
                            <tr>
                                <th>Duration (Secs)</th>
                                <th style="width: 30%;">Sessions</th>
                                <th style="width: 30%;">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0-30</td>
                                <td>2,250</td>
                                <td>4,250</td>
                            </tr>
                            <tr>
                                <td>31-60</td>
                                <td>1,501</td>
                                <td>2,050</td>
                            </tr>
                            <tr>
                                <td>61-120</td>
                                <td>750</td>
                                <td>1,600</td>
                            </tr>
                            <tr>
                                <td>121-240</td>
                                <td>540</td>
                                <td>1,040</td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row -->

<x-hr-chart :employees="$employees"></x-hr-chart>
<x-accountant-chart :employees="$employees" :billings="$billings" :payments="$payments" :quotations="$quotations"></x-accountant-chart>
