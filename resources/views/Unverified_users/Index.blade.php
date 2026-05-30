<x-unverifiedLayout>
  <div
    class="text-primary-bright p-6 flex gap-6 justify-start flex-col items-center absolute top-1/5 left-1/2 -translate-x-1/2 sm:w-[40vw] min-h-[50vh] shadow-[0_0_30px_1px_var(--color-body-cyan-40)] border border-body-cyan bg-bg-card rounded-2xl backdrop-blur">
    <p class="text-4xl font-semibold text-body-cyan">welcome, {{ $user->name }}!</p>
    <p class="text-xl text-center text-body-cyan-40">Please wait for the admin to verify your account to start finishing
      your tasks...</p>
  </div>
</x-unverifiedLayout>