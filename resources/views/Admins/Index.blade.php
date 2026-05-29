<x-adminLayout>
  <div class="p-6">
    <h1 class="text-4xl font-bold mb-6 text-primary-bright">Admin Dashboard</h1>

    <div class="grid grid-cols-1 gap-6">
      <div class="p-4 rounded-lg border"
        style="background:var(--color-bg-card); border-color:var(--color-body-cyan-40); color:var(--color-body-cyan)">
        <p class="text-lg font-semibold text-primary-bright">Totals</p>
        <p class="text-sm text-body-cyan">Users: {{ $users->count() }}</p>
        <p class="text-sm text-body-cyan">Customers: {{ $customers->count() }}</p>
      </div>

      <div class="grid grid-cols-5 gap-6">
        @forelse($customers as $customer)
          <div
            onclick="document.getElementById('customer_{{ $customer->id }}').classList.add('flex'); document.getElementById('customer_{{ $customer->id }}').classList.remove('hidden')"
            class="border border-body-cyan-40 bg-bg-card text-body-cyan hover:shadow-glow-nav hover:text-primary-bright cursor-pointer transition p-2 rounded text-center text-sm">
            {{ $customer->name }}
          </div>
          <div id="customer_{{ $customer->id }}"
            class="hidden h-screen w-screen bg-white-50 backdrop-blur absolute top-0 right-0 left-0 z-100 justify-center items-center">
            <div
              class="text-primary-bright p-6 flex w-[40vw] h-[70vh] border border-body-cyan-40 bg-bg-card/70 rounded-lg flex-col gap-2 justify-start items-start ">

              <div class="flex items-center justify-between w-full mb-2">
                <p class="font-semibold text-sm">Customer Details</p>

                <button
                  class="w-8 h-8 rounded-full hover:shadow-[inset_0_0_10px_0_var(--color-body-cyan-40)] text-2xl text-body-cyan flex items-center justify-center transition-shadow pb-1"
                  onclick="document.getElementById('customer_{{ $customer->id }}').classList.add('hidden'); document.getElementById('customer_{{ $customer->id }}').classList.remove('flex')">
                  &times;
                </button>
              </div>
              <p class="text-body-cyan">customer ID: <span class="text-accent-rose">{{ $customer->id }}</span></p>
              <p class="text-body-cyan">customer name: <span class="text-accent-rose">{{ $customer->name }}</span></p>
              <p class="text-body-cyan">customer address: <span class="text-accent-rose">{{ $customer->address }}</span>
              </p>
              <p class="text-body-cyan">is the customer visited?
                <span class="text-accent-rose">{{ $customer->visited ? "visited" : "not visited" }}</span>
              </p>
              <p class="text-body-cyan">the salesman who should visit the customer:
                <span class="text-accent-rose">{{ $customer->user?->name ?? "unassigned" }}</span>
              </p>
            </div>
          </div>

        @empty
          <p class="text-secondary-text">No customers.</p>
        @endforelse
      </div>
    </div>
  </div>
  </div>
</x-adminLayout>