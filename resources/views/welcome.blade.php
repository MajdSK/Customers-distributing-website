<x-layout title="Main Page" styling="resources/css/app.css" functioning="resources/js/app.js">
  @if (Auth()->hasUser())
  <p class="text-4xl font-bold text-primary-bright">Customers
    @if (Auth()->user()->is_admin)
      <a class="text-body-cyan underline" href="/addCustomer">click to add a customer</a>
    @endif
  </p>
  <div class="grid grid-cols-10 gap-x-0.5 gap-y-1 p-6">
    @foreach ($customers as $customer )
      <div
      onclick="document.getElementById('customer_{{ $customer->id }}').classList.add('flex'); document.getElementById('customer_{{ $customer->id }}').classList.remove('hidden')"
      class="border border-body-cyan bg-bg-card/50 backdrop-blur text-body-cyan hover:shadow-glow-nav hover:text-primary-bright cursor-pointer transition p-2 rounded text-center text-sm">
        {{ $customer->name }}
        @if (Auth()->user()->is_admin === true)
          <form action="/DelCustomer/{{ $customer->id }}" method="POST">
            @csrf
            <button type="submit">&times;</button>
          </form>
        @endif
      </div>
      <div id="customer_{{ $customer->id }}" class="text-primary-bright p-6 hidden w-[40vw] h-[70vh] border absolute top-1/5 left-1/2 -translate-x-1/2 border-body-cyan bg-bg-card rounded-lg backdrop-blur flex-col gap-2 justify-start items-start">
        <p>customer ID: {{ $customer->id }}</p>
        <p>customer name: {{ $customer->name }}</p>
        <p>customer address: {{ $customer->address }}</p>
        <p>is the customer visited? {{ $customer->visited ? "visited" : "not visited" }}</p>
        <p>the salesman who should visit the customer{{ $customer->visiting_salesman?->name ?? "unassigned" }}</p>
        <button onclick="document.getElementById('customer_{{ $customer->id }}').classList.add('hidden'); document.getElementById('customer_{{ $customer->id }}').classList.remove('flex')"></button>
      </div>
    @endforeach 
  </div>
  @else
    <div class="text-primary-bright p-6 flex gap-6 justify-start flex-col items-center absolute top-1/5 left-1/2 -translate-x-1/2 w-[40vw] min-h-[50vh] shadow-[0_0_30px_1px_var(--color-body-cyan-40)] border border-body-cyan bg-bg-card rounded-lg backdrop-blur">
      <p class="text-7xl font-bold text-primary-bright">Hello!</p>
      <p class="text-xl text-center text-body-cyan">Please <a class="font-semibold underline text-accent-rose hover:text-accent-amber transition" href="/LogIn">log in</a>, or <a class="font-semibold underline text-accent-rose hover:text-accent-amber transition" href="/SignUp">sign up</a> to view your tasks...</p>
    </div>
  @endif
</x-layout>
