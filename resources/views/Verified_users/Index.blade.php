<x-verifiedLayout>
  <div class="p-5 m-0 flex flex-col items-start justify-start">
    <p class="text-4xl font-bold text-primary-bright">welcome, {{ $user->name }}</p>
    <div class="grid grid-cols-5 gap-x-0.5 gap-y-1 justify-center content-center items-center">
      @foreach ($customers as $customer)
        <div
          onclick="document.getElementById('customer_{{ $customer->id }}').classList.add('flex'); document.getElementById('customer_{{ $customer->id }}').classList.remove('hidden')"
          class="border border-body-cyan bg-bg-card/50 backdrop-blur text-body-cyan hover:shadow-glow-nav hover:text-primary-bright cursor-pointer transition p-2 rounded-2xl text-center text-sm">
          {{ $customer->name }}
          @if (Auth()->user()->is_admin === true)
            <form action="/DelCustomer/{{ $customer->id }}" method="POST">
              @csrf
              <button type="submit">&times;</button>
            </form>
          @endif
        </div>
        <div id="customer_{{ $customer->id }}"
          class="text-primary-bright p-6 hidden w-[40vw] h-[70vh] border absolute top-1/5 left-1/2 -translate-x-1/2 border-body-cyan bg-bg-card rounded-2xl backdrop-blur flex-col gap-2 justify-start items-start">
          <p>customer ID: {{ $customer->id }}</p>
          <p>customer name: {{ $customer->name }}</p>
          <p>customer address: {{ $customer->address }}</p>
          <p>is the customer visited? {{ $customer->visited ? "visited" : "not visited" }}</p>
          <p>the salesman who should visit the customer{{ $customer->salesman?->name ?? "unassigned" }}</p>
          <button
            onclick="document.getElementById('customer_{{ $customer->id }}').classList.add('hidden'); document.getElementById('customer_{{ $customer->id }}').classList.remove('flex')"></button>
        </div>
      @endforeach
    </div>
  </div>
</x-verifiedLayout>