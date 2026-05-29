@if (Auth::user()->is_admin)
  <x-adminLayout>
    <div
      class="w-full max-w-md p-6 rounded-2xl shadow-lg bg-bg-card border border-body-cyan-40 absolute left-1/2 -translate-x-1/2 top-1/3">
      <div class="mb-4 text-center">
        <p class="text-3xl font-bold text-primary-bright">{{ $user->name }}</p>
        <p class="text-sm mt-1 text-primary-bright">{{ $user->email }}</p>
      </div>

      <div class="space-y-2 mb-6">
        <div class="flex justify-between text-sm text-primary-bright"><span>Availability</span><span
            class="text-body-cyan">{{ $user->availability ? 'Available' : 'Unavailable' }}</span></div>
        <div class="flex justify-between text-sm text-primary-bright"><span>Verified</span><span
            class="text-body-cyan">{{ $user->verified ? 'Yes' : 'No' }}</span></div>
        <div class="flex justify-between text-sm text-primary-bright"><span>Admin</span><span
            class="text-body-cyan">{{ $user->is_admin ? 'Yes' : 'No' }}</span></div>
      </div>

      <form action="/Logout" method="POST">
        @csrf
        <button type="submit"
          class="w-full px-4 py-2 rounded-full font-semibold bg-accent-rose text-white">Logout</button>
      </form>
    </div>
  </x-adminLayout>
@elseif (Auth::user()->verified)
  <x-verifiedLayout>
    <div
      class="w-full max-w-md p-6 rounded-2xl shadow-lg bg-bg-card border border-body-cyan-40 absolute left-1/2 -translate-x-1/2 top-1/3">
      <div class="mb-4 text-center">
        <p class="text-3xl font-bold text-primary-bright">{{ $user->name }}</p>
        <p class="text-sm mt-1 text-primary-bright">{{ $user->email }}</p>
      </div>

      <div class="flex flex-col gap-3">
        <div class="flex justify-between text-sm text-primary-bright"><span>Verified</span><span
            class="text-body-cyan">{{ $user->verified ? 'Yes' : 'No' }}</span></div>
        <div class="flex justify-between text-sm text-primary-bright"><span>Admin</span><span
            class="text-body-cyan">{{ $user->is_admin ? 'Yes' : 'No' }}</span></div>
        <form action="/MakeAvailable/{{ $user->id }}" method="POST">
          @csrf
          @method("PATCH")
          <button type="submit"
            class="w-full px-4 py-2 rounded-full font-semibold {{ $user->availability ? 'bg-green-600' : 'bg-accent-rose' }} text-white">{{ $user->availability ? 'available' : "unavailable" }}</button>
        </form>
        <form action="/Logout" method="POST">
          @csrf
          <button type="submit"
            class="w-full px-4 py-2 rounded-full font-semibold bg-accent-rose text-white">Logout</button>
        </form>
      </div>
    </div>
  </x-verifiedLayout>
@else
  <x-unverifiedLayout>
    <div
      class="w-full max-w-md p-6 rounded-2xl shadow-lg bg-bg-card border border-body-cyan-40 absolute left-1/2 -translate-x-1/2 top-1/3">
      <div class="mb-4 text-center">
        <p class="text-3xl font-bold text-primary-bright">{{ $user->name }}</p>
        <p class="text-sm mt-1 text-primary-bright">{{ $user->email }}</p>
      </div>

      <div class="space-y-2 mb-6">
        <div class="flex justify-between text-sm text-primary-bright"><span>Availability</span><span
            class="text-body-cyan">{{ $user->availability ? 'Available' : 'Unavailable' }}</span></div>
        <div class="flex justify-between text-sm text-primary-bright"><span>Verified</span><span
            class="text-body-cyan">{{ $user->verified ? 'Yes' : 'No' }}</span></div>
        <div class="flex justify-between text-sm text-primary-bright"><span>Admin</span><span
            class="text-body-cyan">{{ $user->is_admin ? 'Yes' : 'No' }}</span></div>
      </div>


      <form action="/Logout" method="POST">
        @csrf
        <button type="submit"
          class="w-full px-4 py-2 rounded-full font-semibold bg-accent-rose text-white">Logout</button>
      </form>
    </div>
  </x-unverifiedLayout>
@endif