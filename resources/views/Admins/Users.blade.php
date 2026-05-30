<x-adminLayout>
  <div class="p-6">
    <h1 class="text-4xl font-bold mb-6 text-primary-bright">All Users</h1>

    <div class="grid grid-cols-1 gap-4">
      @forelse($users as $user)
        <div
          class="flex shrink items-center justify-between p-4 rounded-2xl border bg-bg-card text-body-cyan border-body-cyan-40">
          <div class="flex-1">
            <div>
              <a href="User/{{ $user->id }}/todaysTasks"
                class="text-lg font-semibold text-primary-bright underline">{{ $user->name }}</a>
              .
              <a href="User/{{ $user->id }}/AllTimeTasks" class="text-lg font-semibold text-primary-bright underline">
                view all done tasks</a>
            </div>
            <p class="text-sm text-body-cyan-40">ID: {{ $user->id }}</p>
            <p class="text-sm text-body-cyan-40">Email: {{ $user->email }}</p>
            <p class="text-sm text-body-cyan-40">Verified: {{ $user->verified ? 'Yes' : 'No' }}</p>
            <p class="text-sm text-body-cyan-40">Done Tasks: {{ $user->customers->where('visited', true)->count() }}</p>
            <p class="text-sm text-body-cyan-40">Availability: {{ $user->availability ? 'Available' : 'Unavailable' }}
            </p>
          </div>

          <div class="grid grid-cols-2 grid-rows-2 sm:flex sm:flex-row gap-3 ml-4 justify-between items-center">
            <form action="/Admin/Users/Destroy/{{ $user->id }}" method="POST">
              @csrf
              @method("DELETE")
              <button type="submit"
                class="shrink px-3 py-2 rounded-full font-semibold bg-accent-rose text-white">Remove</button>
            </form>

            <form action="/Admin/Users/Verify/{{ $user->id }}" method="POST">
              @csrf
              @method("PATCH")
              <button type="submit"
                class="shrink px-3 py-2 rounded-full font-semibold bg-body-cyan text-bg-dark-primary">{{ $user->verified ? 'verified' : 'unverified' }}</button>
            </form>

            <form action="/Admin/Users/MakeAdmin/{{ $user->id }}" method="POST">
              @csrf
              @method("PATCH")
              <button type="shrink submit"
                class="px-3 py-2 rounded-full font-semibold bg-primary-bright text-bg-dark-primary">{{ $user->is_admin ? 'discard as admin' : 'make admin' }}</button>
            </form>
          </div>
        </div>
      @empty
        <p class="text-body-cyan-40">No users found.</p>
      @endforelse
    </div>
  </div>
</x-adminLayout>