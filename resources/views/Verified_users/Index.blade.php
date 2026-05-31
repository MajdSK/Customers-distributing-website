<x-verifiedLayout>
  <div class="p-5 m-0 flex flex-col items-start justify-start">
    <p class="text-4xl font-bold text-primary-bright">welcome, {{ $user->name }}</p>
    <div class="grid grid-cols-5 gap-x-0.5 gap-y-1 justify-center content-center items-center w-[90vw] mt-5">
      @foreach ($customers as $customer)
        <div
          onclick="document.getElementById('customer_{{ $customer->id }}').classList.add('flex'); document.getElementById('customer_{{ $customer->id }}').classList.remove('hidden'); document.getElementById('customer_{{ $customer->id }}').scrollIntoView({ behavior: 'smooth', block: 'start' });"
          class="border border-body-cyan-40 bg-bg-card text-body-cyan hover:shadow-glow-nav hover:text-primary-bright cursor-pointer transition p-2 rounded-2xl text-center text-sm">
          {{ $customer->name }}
        </div>
        <div
          onclick="document.getElementById('customer_{{ $customer->id }}').classList.add('hidden'); document.getElementById('customer_{{ $customer->id }}').classList.remove('flex')"
          id="customer_{{ $customer->id }}"
          class="hidden h-screen w-screen bg-white-50 backdrop-blur absolute top-0 right-0 left-0 z-100 justify-center items-center">
          <div
            class="text-primary-bright p-6 flex w-[90%] sm:w-[40vw] h-[70vh] border border-body-cyan-40 bg-bg-card/70 rounded-2xl flex-col gap-2 justify-start items-start ">

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
              <span class="text-accent-rose">{{ $customer->salesman?->name  }}</span>
            </p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</x-verifiedLayout>