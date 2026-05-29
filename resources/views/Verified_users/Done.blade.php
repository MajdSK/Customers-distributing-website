<x-verifiedLayout>
  <div class="p-6">
    <h1 class="text-4xl font-bold mb-6 text-primary-bright">Completed Customers</h1>

    <div class="grid grid-cols-1 gap-4">
      @forelse($customers as $customer)
        <div class="p-4 rounded-lg border bg-bg-card border-body-cyan-40 text-body-cyan">
          <p class="text-xl font-semibold text-primary-bright">{{ $customer->name }}</p>
          <p class="text-sm mt-1 text-secondary-text">ID: {{ $customer->id }}</p>
          <p class="text-sm mt-1 text-secondary-text">Address: {{ $customer->address }}</p>
          <p class="text-sm mt-1 text-secondary-text">Salesman:
            {{ $customer->salesman?->name ?? 'unassigned' }}
          </p>
        </div>
      @empty
        <p class="text-secondary-text">No completed customers found.</p>
      @endforelse
    </div>
  </div>
</x-verifiedLayout>