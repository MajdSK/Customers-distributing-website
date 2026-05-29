<x-adminLayout>
  <div class="p-6">
    <h1 class="text-4xl font-bold mb-6 text-primary-bright">All Completed Customers</h1>

    <div class="grid grid-cols-1 gap-4">
      @forelse($customers->where('visited', true) as $customer)
        <div class="p-4 rounded-lg border bg-bg-card border-body-cyan-40 text-body-cyan">
          <p class="text-xl font-semibold text-primary-bright">{{ $customer->name }}</p>
          <p class="text-sm mt-1 text-body-cyan-40">ID: {{ $customer->id }}</p>
          <p class="text-sm mt-1 text-body-cyan-40">Address: {{ $customer->address }}</p>
          <p class="text-sm mt-1 text-body-cyan-40">Salesman: {{ $customer->salesman?->name ?? 'unassigned' }}</p>
        </div>
      @empty
        <p class="text-body-cyan-40">No completed customers found.</p>
      @endforelse
    </div>
  </div>
</x-adminLayout>