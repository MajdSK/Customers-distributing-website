<x-adminLayout>
  <div class="p-6">
    <h1 class="text-4xl font-bold mb-6 text-primary-bright">All Pending Customers</h1>

    <div class="grid grid-cols-1 gap-6">
      @forelse($customers->where('visited', false) as $customer)
        <div class="p-4 rounded-2xl border bg-bg-card border-body-cyan-40 text-body-cyan flex items-start justify-start">
          <div>
            <p class="text-xl font-semibold text-primary-bright">{{ $customer->name }}</p>
            <p class="text-sm mt-1 text-body-cyan-40">ID: {{ $customer->id }}</p>
            <p class="text-sm mt-1 text-body-cyan-40">Address: {{ $customer->address }}</p>
            <p class="text-sm mt-1 text-body-cyan-40">Salesman: {{ $customer->salesman?->name ?? 'unassigned' }}</p>
          </div>
          <div class="mt-3 flex gap-3 flex-col justify-center ml-auto items-center">
            <form action="/Admin/Customer/MarkVisited/{{ $customer->id }}" method="POST">
              @csrf
              @method("PATCH")
              <button type="submit" class="px-4 py-2 rounded-full font-semibold bg-body-cyan text-bg-dark-primary">Mark
                Visited</button>
            </form>

            <form action="/Customer/Drop/{{ $customer->id }}" method="POST">
              @csrf
              @method("DELETE")
              <button type="submit" class="px-4 py-2 rounded-full font-semibold bg-accent-rose text-white">Drop</button>
            </form>
          </div>
        </div>
      @empty
        <p class="text-body-cyan-40">No pending customers.</p>
      @endforelse
    </div>
  </div>
</x-adminLayout>