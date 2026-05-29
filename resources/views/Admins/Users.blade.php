<x-adminLayout>
  <div class="p-6">
    <h1 class="text-4xl font-bold mb-6 text-primary-bright">All Users</h1>

    <div class="grid grid-cols-1 gap-4">
      @forelse($users as $user)
        <div
          class="flex shrink items-center justify-between p-4 rounded-lg border bg-bg-card text-body-cyan border-body-cyan-40">
          <div class="flex-1">
            <p class="text-lg font-semibold text-primary-bright">{{ $user->name }}</p>
            <p class="text-sm text-body-cyan-40">Email: {{ $user->email }}</p>
            <p class="text-sm text-body-cyan-40">Verified: {{ $user->verified ? 'Yes' : 'No' }}</p>
            <p class="text-sm text-body-cyan-40">Availability: {{ $user->availability ? 'Available' : 'Unavailable' }}
            </p>
          </div>

          <div class="flex flex-col sm:flex-row gap-3 ml-4 justify-between items-center">
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
                class="shrink px-3 py-2 rounded-full font-semibold bg-body-cyan text-bg-dark-primary">Verify</button>
            </form>

            <form action="/Admin/Users/MakeAdmin/{{ $user->id }}" method="POST">
              @csrf
              @method("PATCH")
              <button type="shrink submit"
                class="px-3 py-2 rounded-full font-semibold bg-primary-bright text-bg-dark-primary">Make Admin</button>
            </form>
          </div>
        </div>
      @empty
        <p class="text-body-cyan-40">No users found.</p>
      @endforelse
    </div>
  </div>
</x-adminLayout>