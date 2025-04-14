<x-guest-layout>
<div class="col-12">
	<div class="card border-success bg-success-subtle">
		<div class="card-body p-4 d-flex flex-column gap-5">
			<div class="d-flex flex-column gap-2">
				<h3 class="mb-0 h5">@lang('locale.booking_done')</h3>
				<p class="mb-0">{{ session('message') }}.</p>
			</div>
		</div>
	</div>
</div>
</x-guest-layout>