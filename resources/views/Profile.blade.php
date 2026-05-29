@if (Auth::user()->is_admin)
  <x-adminLayout>
    <div class="min-h-screen overflow-hidden flex items-center justify-center p-6">
      <div class="w-full max-w-md p-6 rounded-2xl shadow-lg"
        style="background:var(--color-bg-card); border:1px solid var(--color-body-cyan-40);">
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

        <form action="/logout" method="POST">
          @csrf
          <button type="submit"
            class="w-full px-4 py-2 rounded-full font-semibold bg-accent-rose text-white">Logout</button>
        </form>
      </div>
    </div>
  </x-adminLayout>
@elseif (Auth::user()->verified)
  <x-verifiedLayout>
    <div class="min-h-screen overflow-hidden flex items-center justify-center p-6">
      <div class="w-full max-w-md p-6 rounded-2xl shadow-lg"
        style="background:var(--color-bg-card); border:1px solid var(--color-body-cyan-40);">
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
    </div>
  </x-verifiedLayout>
@else
  <x-unverifiedLayout>
    <div class="min-h-screen overflow-hidden flex items-center justify-center p-6">
      <div class="w-full max-w-md p-6 rounded-2xl shadow-lg"
        style="background:var(--color-bg-card); border:1px solid var(--color-body-cyan-40);">
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

        <form action="/logout" method="POST">
          @csrf
          <button type="submit"
            class="w-full px-4 py-2 rounded-full font-semibold bg-accent-rose text-white">Logout</button>
        </form>
      </div>
    </div>
  </x-unverifiedLayout>
@endif