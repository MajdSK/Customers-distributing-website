
<x-verifiedLayout>
	<div class="p-6">
		<h1 class="text-4xl font-bold mb-6 text-primary-bright">Pending Customers</h1>

		<div class="grid grid-cols-1 gap-6">
			@forelse($customers as $customer)
				<div class="p-4 rounded-lg border shadow-sm bg-bg-card border-body-cyan-40 text-body-cyan">
					<div class="flex flex-col sm:flex-row sm:justify-between gap-4">
						<div>
							<p class="text-xl font-semibold text-primary-bright">{{ $customer->name }}</p>
							<p class="text-sm text-secondary-text">ID: {{ $customer->id }}</p>
							<p class="text-sm mt-1 text-secondary-text">Address: {{ $customer->address }}</p>
							<p class="text-sm mt-1 text-secondary-text">Visited: {{ $customer->visited ? 'Yes' : 'No' }}</p>
							<p class="text-sm mt-1 text-secondary-text">Salesman: {{ $customer->salesman?->name ?? 'unassigned' }}</p>
						</div>

						<div class="flex items-center gap-3">
							<form action="/Customer/MarkVisited/{{ $customer->id }}" method="POST" class="w-full sm:w-auto">
								@csrf
								<button type="submit" class="w-full sm:w-auto px-4 py-2 rounded-full font-semibold bg-body-cyan text-bg-dark-primary">Mark visited</button>
							</form>

							<form action="/Customer/Drop/{{ $customer->id }}" method="POST" class="w-full sm:w-auto">
								@csrf
								<button type="submit" class="w-full sm:w-auto px-4 py-2 rounded-full font-semibold bg-accent-rose text-white">Remove</button>
							</form>
						</div>
					</div>
				</div>
			@empty
				<p class="text-secondary-text">No pending customers.</p>
			@endforelse
		</div>
	</div>
  </x-verifiedLayout>