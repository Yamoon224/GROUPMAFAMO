<x-guest-layout>
    <section class="bg-success bg-opacity-50 py-lg-10 py-6">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="text-center">
					    <div class='text-center text-success' style='font-size: 52px'><i class="bi bi-bag-check-fill"></i></div>
						<h1 class="display-5 fw-bold">@lang('locale.booking_done')</h1>
						<p class="mb-5">{{ session('message') }}.</p>
						@if(session()->has('booking') && session('sejour'))
						<a class="btn btn-primary" href="{{ route('bookings.show', session('booking')) }}">@lang('locale.billing', ['suffix'=>''])</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
</x-guest-layout>