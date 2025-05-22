<x-guest-layout>
    <div class="swiper-container swiper" id="swiper-5" data-pagination-type="" data-speed="800" data-space-between="100"
		data-pagination="false" data-navigation="true" data-autoplay="true" data-effect="fade" data-autoplay-delay="3000" data-breakpoints='{"480": {"slidesPerView": 2}, "768": {"slidesPerView": 3}, "1024": {"slidesPerView": 1}}'>
		<div class="swiper-wrapper pb-lg-8">
			<!--Swiper-->
			<div class="swiper-slide w-100 bg-light bg-opacity-50 border-bottom">
				<div class="container d-flex flex-column justify-content-center h-80">
					<div class="row align-items-center py-2">
						<div class="col-lg-5">
							<div class="">
								<h2 class="mb-3 mt-4 display-5 fw-bold">Voyages & Séjours</h2>
								<p class="mb-4 pe-lg-6">Plus de soucis pour vos différents voyages en Afrique avec le group </p>
								<a href="{{ route('home') }}" class="btn btn-outline-primary">{{ env('APP_NAME') }}</a>
							</div>
						</div>
						<div class="offset-lg-1 col-lg-6">
							<div class="position-relative">
								<img src="{{ asset('images/sliders/1.png') }}" alt="slider image" class="img-fluid" />

								<!--<div-->
								<!--	class="bg-white py-3 px-3 d-inline-flex flex-column position-absolute bottom-0 end-25 mb-4 shadow-sm">-->
								<!--	<h3 class="mb-1 fs-5">Modern Sofa</h3>-->
								<!--	<div class="small d-flex gap-2 align-items-center">-->
								<!--		<span class="text-dark fw-semibold">$259.00</span>-->
								<!--		<a href="index.html#!" class="text-link">+Add to cart</a>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Swiper-->
			<div class="swiper-slide w-100 bg-light bg-opacity-50 border-bottom">
				<div class="container d-flex flex-column justify-content-center h-100">
					<div class="row align-items-center py-md-8 py-6">
						<div class="col-lg-5">
							<div class="">
								<h2 class="mb-3 mt-4 display-5 fw-bold pe-lg-10">Hébergement</h2>
								<p class="mb-4">Un hébergement digne et responsable avec le coût raisonnable. Les studios,appartements et villas pour vous</p>
								<div class="d-flex flex-md-row flex-column gap-3">
									<a href="{{ route('home') }}" class="btn btn-primary">{{ env('APP_NAME') }}</a>
								</div>
							</div>
						</div>
						<div class="offset-lg-1 col-lg-6">
							<div class="position-relative">
								<img src="{{ asset('images/sliders/2.png') }}" alt="slider image" class="img-fluid" />
								<!--<div class="bg-white py-3 px-3 d-inline-flex flex-column position-absolute bottom-0 end-25 mb-4 shadow-sm">-->
								<!--	<h3 class="mb-1 fs-5">Office Chair</h3>-->
								<!--	<div class="small d-flex gap-2 align-items-center">-->
								<!--		<span class="text-dark fw-semibold">$259.00</span>-->
								<!--		<a href="index.html#!" class="text-link">+Add to cart</a>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Swiper-->
			<!--<div class="swiper-slide w-100 bg-light bg-opacity-50 border-bottom">-->
			<!--	<div class="container d-flex flex-column justify-content-center h-100">-->
			<!--		<div class="row align-items-center py-md-8 py-6">-->
			<!--			<div class="col-lg-5">-->
			<!--				<div class="">-->
			<!--					<span class="small text-dark fw-bold">Free Shipping</span>-->
			<!--					<h2 class="mb-3 mt-4 display-5 fw-bold">Minimalist Furniture</h2>-->
			<!--					<p class="pe-lg-10 mb-4">Enjoy free shipping on all orders over $100! Shop your favorite-->
			<!--						pieces now and-->
			<!--						have them delivered straight to your door at no extra cost.</p>-->
			<!--					<ul class="list-unstyled d-flex flex-column gap-2 mb-4">-->
			<!--						<li class="lh-base">-->
			<!--							<svg width="16" height="16" viewBox="0 0 16 16" fill="none"-->
			<!--								xmlns="http://www.w3.org/2000/svg">-->
			<!--								<path d="M9.3335 12.0003V4.00033C9.3335 3.6467 9.19302 3.30756 8.94297 3.05752C8.69292 2.80747 8.35378 2.66699 8.00016 2.66699H2.66683C2.31321 2.66699 1.97407 2.80747 1.72402 3.05752C1.47397 3.30756 1.3335 3.6467 1.3335 4.00033V11.3337C1.3335 11.5105 1.40373 11.68 1.52876 11.8051C1.65378 11.9301 1.82335 12.0003 2.00016 12.0003H3.3335"-->
			<!--									stroke="#211F1C" stroke-linecap="round" stroke-linejoin="round" />-->
			<!--								<path d="M10 12H6" stroke="#211F1C" stroke-linecap="round" stroke-linejoin="round" />-->
			<!--								<path d="M12.6668 11.9997H14.0002C14.177 11.9997 14.3465 11.9294 14.4716 11.8044C14.5966 11.6794 14.6668 11.5098 14.6668 11.333V8.89967C14.6666 8.74838 14.6148 8.60168 14.5202 8.48367L12.2002 5.58367C12.1378 5.50559 12.0587 5.44253 11.9687 5.39914C11.8787 5.35575 11.7801 5.33315 11.6802 5.33301H9.3335"-->
			<!--									stroke="#211F1C" stroke-linecap="round" stroke-linejoin="round" />-->
			<!--								<path d="M11.3333 13.3337C12.0697 13.3337 12.6667 12.7367 12.6667 12.0003C12.6667 11.2639 12.0697 10.667 11.3333 10.667C10.597 10.667 10 11.2639 10 12.0003C10 12.7367 10.597 13.3337 11.3333 13.3337Z"-->
			<!--									stroke="#211F1C" stroke-linecap="round" stroke-linejoin="round" />-->
			<!--								<path-->
			<!--									d="M4.66683 13.3337C5.40321 13.3337 6.00016 12.7367 6.00016 12.0003C6.00016 11.2639 5.40321 10.667 4.66683 10.667C3.93045 10.667 3.3335 11.2639 3.3335 12.0003C3.3335 12.7367 3.93045 13.3337 4.66683 13.3337Z"-->
			<!--									stroke="#211F1C" stroke-linecap="round" stroke-linejoin="round" />-->
			<!--							</svg>-->
			<!--							Free shipping-->
			<!--						</li>-->
			<!--						<li class="lh-base">-->
			<!--							<svg width="16" height="16" viewBox="0 0 16 16" fill="none"-->
			<!--								xmlns="http://www.w3.org/2000/svg">-->
			<!--								<g clip-path="url(#clip0_273_4929)">-->
			<!--									<path-->
			<!--										d="M10.0002 14.6664C9.82335 14.6664 9.65378 14.5962 9.52876 14.4712C9.40373 14.3462 9.3335 14.1766 9.3335 13.9998V11.3331C9.33348 11.2234 9.36055 11.1153 9.4123 11.0186C9.46405 10.9218 9.53889 10.8393 9.63016 10.7784L11.6302 9.44511C11.7397 9.37202 11.8685 9.33301 12.0002 9.33301C12.1319 9.33301 12.2606 9.37202 12.3702 9.44511L14.3702 10.7784C14.4614 10.8393 14.5363 10.9218 14.588 11.0186C14.6398 11.1153 14.6668 11.2234 14.6668 11.3331V13.9998C14.6668 14.1766 14.5966 14.3462 14.4716 14.4712C14.3465 14.5962 14.177 14.6664 14.0002 14.6664H10.0002Z"-->
			<!--										stroke="#211F1C" stroke-linecap="round" stroke-linejoin="round" />-->
			<!--									<path-->
			<!--										d="M12.0002 6.66634C12.0002 5.25185 11.4383 3.8953 10.4381 2.89511C9.43787 1.89491 8.08132 1.33301 6.66683 1.33301C5.25234 1.33301 3.89579 1.89491 2.89559 2.89511C1.8954 3.8953 1.3335 5.25185 1.3335 6.66634C1.3335 9.99501 5.02616 13.4617 6.26616 14.5323C6.38174 14.619 6.52235 14.6658 6.66683 14.6657"-->
			<!--										stroke="#211F1C" stroke-linecap="round" stroke-linejoin="round" />-->
			<!--									<path d="M12 14.667V12.667" stroke="#211F1C" stroke-linecap="round"-->
			<!--										stroke-linejoin="round" />-->
			<!--									<path-->
			<!--										d="M6.6665 8.66699C7.77107 8.66699 8.6665 7.77156 8.6665 6.66699C8.6665 5.56242 7.77107 4.66699 6.6665 4.66699C5.56193 4.66699 4.6665 5.56242 4.6665 6.66699C4.6665 7.77156 5.56193 8.66699 6.6665 8.66699Z"-->
			<!--										stroke="#211F1C" stroke-linecap="round" stroke-linejoin="round" />-->
			<!--								</g>-->
			<!--								<defs>-->
			<!--									<clipPath id="clip0_273_4929">-->
			<!--										<rect width="16" height="16" fill="white" />-->
			<!--									</clipPath>-->
			<!--								</defs>-->
			<!--							</svg>-->
			<!--							Convenient Shipping-->
			<!--						</li>-->
			<!--					</ul>-->

			<!--					<a href="index.html#!" class="btn btn-outline-primary">Shop Decoration</a>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--			<div class="offset-lg-1 col-lg-6">-->
			<!--				<div class="position-relative">-->
			<!--					<img src="{{ asset('images/sliders/3.png') }}" alt="SLIDER III"-->
			<!--						class="img-fluid" />-->
			<!--					<div-->
			<!--						class="bg-white py-3 px-3 d-inline-flex flex-column position-absolute bottom-0 end-25 mb-4 shadow-sm">-->
			<!--						<h3 class="mb-1 fs-5">Wooden Table</h3>-->
			<!--						<div class="small d-flex gap-2 align-items-center">-->
			<!--							<span class="text-dark fw-semibold">$259.00</span>-->
			<!--							<a href="index.html#!" class="text-link">+Add to cart</a>-->
			<!--						</div>-->
			<!--					</div>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->

			<!-- Add more slides as needed -->
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
		<!-- Add Navigation -->
		<div class="swiper-navigation position-absolute end-25 bottom-0 bottom-md-10 me-md-n10 mb-8">
			<div class="swiper-button-next btn btn-icon btn-sm btn-outline-primary rounded-circle"></div>
			<div class="swiper-button-prev me-2 btn btn-icon btn-sm btn-outline-primary rounded-circle"></div>
		</div>
	</div>
    <div class="position-relative z-1 d-none d-md-block">
		<div class="position-absolute top-0 start-50 translate-middle mt-lg-n8 mt-n5">
			<div class="position-absolute top-0" style="margin-left: -0.3rem; margin-top: -0.7rem">
				<image src="{{ asset('images/logo.png') }}" class="shop-badge" width="97" height="105" />
			</div>
		</div>
	</div>

    
    <!--New arrival start-->
	<section class="py-lg-3 pt-2 mx-3 mx-lg-0">
		<div class="container">
			<div class="row mb-md-4 mb-4">
				<div class="col-lg-12">
					<div class="d-flex flex-column flex-md-row align-items-md-end justify-content-md-between gap-4">
						<!--Heading-->
						<div class="col-sm-7">
							<h2>@lang('locale.our_rooms')</h2>
							<p class="mb-0"></p>
						</div>
						<div class="col-auto">
							<a href="{{ route('rooms.index') }}" class="d-flex align-items-center gap-2 btn-dark-link">
								<span class="text-link">@lang('locale.see_all')</span>
								<span class="btn btn-outline-primary btn-icon btn-xxs rounded-circle">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
										class="bi bi-chevron-right" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Slider-->
		<div class="swiper-container swiper px-3" id="swiper-3" data-pagination-type="progressbar" data-speed="400" data-space-between="30" data-pagination="true" data-navigation="true" data-autoplay="false" data-effect="slides" data-autoplay-delay="3000" data-breakpoints='{"480": {"slidesPerView": 2}, "768": {"slidesPerView": 3}, "1024": {"slidesPerView": 6}}'>
			<div class="swiper-wrapper pb-10">
			    @foreach($rooms as $item)
				<div class="swiper-slide">
					<div class="product-card">
						<div class=" text-center product-card-img mb-2">
							<a href="{{ route('rooms.book', [$item->id, $item->name]) }}">
							    <img src="{{ asset( $item->front ) }}" alt="FRONT {{ $item->id }}" class="img-fluid">
								<img src="{{ asset( $item->back ) }}" alt="BACK {{ $item->id }}" class="img-fluid product-img-hover">
							</a>
							<div class="product-card-btn">
								<a href="{{ route('rooms.book', [$item->id, $item->name]) }}" class="btn btn-primary btn-icon btn-sm animate-pulse">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye animate-target" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
									</svg>
								</a>
							</div>
						</div>
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="small fw-medium text-uppercase">{{ $item->type->type }} / {{ $item->address }}</span>
							<div class="d-flex gap-3 align-items-center"></div>
						</div>
						<div class="mb-3">
							<h3 class="fs-6 mb-0 product-heading d-block text-truncate"> 
							    <a href="{{ route('rooms.book', [$item->id, $item->name]) }}">{{ $item->name }}</a>
							</h3>
							<p class="mb-0 lh-1 text-dark fw-semibold">{{ moneyformat($item->price, session('currency')) }}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination top-100 mt-n4 start-lg-10 w-lg-75"></div>
			<!-- Add Navigation -->
			<div class="swiper-navigation position-absolute end-10 bottom-0 mb-4 d-none d-lg-block">
				<div class="swiper-button-next btn btn-icon btn-sm btn-outline-primary rounded-circle" id="slide2"></div>
				<div class="swiper-button-prev me-2 btn btn-icon btn-sm btn-outline-primary rounded-circle" id="slide1"></div>
			</div>
		</div>
	</section>
	<!--New arrival end-->
	
	<!--Marquee start-->
	<div class="marquee mb-lg-4 py-2">
		<div class="text-track display-1 fw-bold text-primary py-lg-6" style="font-size: 60px">
			GROUP MAFAMO PRESS SARL, une entreprise pluridisciplinaire.
		</div>
	</div>
	<!--Marquee end-->
	
	<section class="py-lg-4 py-4">
		<div class="container">
			<div class="row mb-md-4 mb-2">
				<div class="col-lg-12">
					<div class="d-flex flex-column flex-md-row align-items-md-end justify-content-md-between gap-4">
						<!--Heading-->
						<div class="col-sm-7">
							<h2 class="mb-0">@lang('locale.our_team')</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="swiper-container swiper swiper-initialized swiper-horizontal" id="swiper-1" data-pagination-type="bullets" data-speed="400" data-space-between="30" data-pagination="true" data-navigation="false" data-autoplay="false" data-effect="slides" data-autoplay-delay="3000" data-breakpoints="{&quot;480&quot;: {&quot;slidesPerView&quot;: 2}, &quot;768&quot;: {&quot;slidesPerView&quot;: 3}, &quot;1024&quot;: {&quot;slidesPerView&quot;: 5}}">
					<div class="swiper-wrapper pb-8" id="swiper-wrapper-6ca4fec331883328" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
						<!--Collection-->
						<div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/ceo.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">PDG</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
						<div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/pca.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">PCA</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
						<!--Collection-->
						<div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/manager.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">D. Général</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
						<!--Collection-->
						<div class="swiper-slide" role="group" aria-label="3 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/accountable.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">A. Comptable</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
						<!--Collection-->
						<div class="swiper-slide" role="group" aria-label="4 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/secretary.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">Sécretaire</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
						<div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/engineer.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">Ingenieur</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
						<div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/aengineer.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">A. Ingenieur</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
						<div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/rc-maroc.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">R.C Maroc</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
						<div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 209.333px; margin-right: 30px;">
							<a class="text-center p-4 card-animation d-block bg-light">
								<img src="{{ asset('images/team/dr-labe.jpeg') }}" alt="product image" class="mb-3 img-fluid">

								<div class="d-flex align-items-center gap-2 justify-content-center link-animation">
									<h3 class="fs-6 mb-0">D.R Labé</h3>
									<span class="btn btn-outline-dark btn-icon btn-xxs rounded-circle circle-chevron">
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
										</svg>
									</span>
								</div>
							</a>
						</div>
					</div>
					<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
					    <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span>
					    <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span>
					    <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
					</div>
					<!-- Add Navigation -->
					<div class="swiper-navigation position-absolute start-50 bottom-0 mb-4">
						<div class="swiper-button-next btn btn-icon btn-sm btn-outline-primary rounded-circle" id="slide3"></div>
						<div class="swiper-button-prev me-2 btn btn-icon btn-sm btn-outline-primary rounded-circle" id="slide4"></div>
					</div>
    				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
				</div>
			</div>
		</div>
	</section>
	
	<section class="py-lg-4 py-4">
		<div class="container">
			<div class="row mb-md-4 mb-4">
				<div class="col-lg-12">
					<div class="d-flex flex-column flex-md-row align-items-md-end justify-content-md-between gap-4">
						<!--Heading-->
						<div class="col-12">
							<h2 class="mb-0">@lang('locale.our_services')</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row gy-4">
				<!--Blog-->
				<div class="col-lg-4 col-md-6 col-sm-6">
					<article class="">
						<a class="position-relative d-flex">
							<figure class="img-hover mb-0">
								<img src="{{ asset('images/services/btp.png') }}" alt="blog image" class="img-fluid">
							</figure>
							<div class="position-absolute bottom-0 p-3">
								<span class="badge text-bg-info">SERVICE</span>
							</div>
						</a>
						<div class="mt-4">
							<h3 class="fs-5"><a class="text-inherit">@lang('locale.building_btp')</a></h3>
							<p style="text-align: justify">
							    @lang('locale.btp_service').
							</p>
						</div>
					</article>
				</div>
				<!--Blog-->
				<div class="col-lg-4 col-md-6 col-sm-6">
					<article class="">
						<a class="position-relative d-flex">
							<figure class="img-hover mb-0">
								<img src="{{ asset('images/services/immobilier.png') }}" alt="IMMOBILIER" class="img-fluid">
							</figure>
							<div class="position-absolute bottom-0 p-3">
								<span class="badge text-bg-info">SERVICE</span>
							</div>
						</a>
						<div class="mt-4">
							<h3 class="fs-5"><a class="text-inherit">@lang('locale.real_estate')</a></h3>
							<p style="text-align: justify">
							    @lang('locale.immobilier_service').
							</p>
						</div>
					</article>
				</div>
				<!--Blog-->
				<div class="col-lg-4 col-md-6 col-sm-6">
					<article class="">
						<a class="position-relative d-flex">
							<figure class="img-hover mb-0">
								<img src="{{ asset('images/services/transit.png') }}" alt="TRANSIT IMPORT-EXPORT" class="img-fluid">
							</figure>
							<div class="position-absolute bottom-0 p-3">
								<span class="badge text-bg-info">SERVICE</span>
							</div>
						</a>
						<div class="mt-4">
							<h3 class="fs-5"><a class="text-inherit">@lang('locale.transit_import_export')</a></h3>
							<p style="text-align: justify">
							    @lang('locale.transit_service').
							</p>
						</div>
					</article>
				</div>
				
				<div class="col-lg-4 col-md-6 col-sm-6">
					<article class="">
						<a href="index.html#!" class="position-relative d-flex">
							<figure class="img-hover mb-0">
								<img src="{{ asset('images/services/travel.png') }}" alt="VOYAGES ET AUTRES" class="img-fluid">
							</figure>
							<div class="position-absolute bottom-0 p-3">
								<span class="badge text-bg-info">SERVICE</span>
							</div>
						</a>
						<div class="mt-4">
							<h3 class="fs-5"><a class="text-inherit">@lang('locale.travel_others')</a></h3>
							<p style="text-align: justify">
							    @lang('locale.travel_service').
							</p>
						</div>
					</article>
				</div>
				<!--Blog-->
				<div class="col-lg-4 col-md-6 col-sm-6">
					<article class="">
						<a class="position-relative d-flex">
							<figure class="img-hover mb-0">
								<img src="{{ asset('images/services/vehicles.png') }}" alt="LOCATION ENGINS ROULANTS" class="img-fluid">
							</figure>
							<div class="position-absolute bottom-0 p-3">
								<span class="badge text-bg-info">SERVICE</span>
							</div>
						</a>
						<div class="mt-4">
							<h3 class="fs-5"><a class="text-inherit">@lang('locale.engins_location')</a></h3>
							<p style="text-align: justify">
							    @lang('locale.location_service').
						    </p>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>
	
	<section class="border-top py-1 bg-light">
        <div class="container">
            <div class="row text-center">
                <!-- Free Shipping -->
                <div class="col-lg-3 col-md-6">
                    <div class="px-3">
						<div class="mb-3 text-warning">
							<i class="bi bi-truck fs-1"></i>
						</div>
						<h5 class="fw-semibold mb-2">Livraison</h5>
						<p class="text-muted small mb-0">Pour toute <span class="fw-bold text-dark">commande</span></p>
                    </div>
                </div>
                
                <!-- Service client -->
                <div class="col-lg-3 col-md-6">
                    <div class="px-3">
						<div class="mb-3 text-warning">
							<i class="bi bi-headset fs-1"></i>
						</div>
						<h5 class="fw-semibold mb-2">Service client</h5>
						<p class="text-muted small mb-0">Assistance 24h/24 et 7j/7 par nos experts</p>
                    </div>
                </div>
                
                <!-- Paiement sécurisé -->
                <div class="col-lg-3 col-md-6">
                    <div class="px-3">
						<div class="mb-3 text-warning">
							<i class="bi bi-shield-check fs-1"></i>
						</div>
						<h5 class="fw-semibold mb-2">Paiement sécurisé</h5>
						<p class="text-muted small mb-0">Transactions cryptées et certifiées</p>
                    </div>
                </div>
                
                <!-- Retours faciles -->
                <div class="col-lg-3 col-md-6">
                    <div class="px-3">
						<div class="mb-3 text-warning">
							<i class="bi bi-arrow-repeat fs-1"></i>
						</div>
						<h5 class="fw-semibold mb-2">Retours simplifiés</h5>
						<p class="text-muted small mb-0">30 jours pour changer d’avis</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>