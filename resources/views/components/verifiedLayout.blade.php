@props([
  "title" => 'App',
  "styling" => "resources/css/app.css",
  "functioning" => 'resources/js/app.js'
])

<!DOCTYPE html>
<html lang="en" class="p-0 m-0">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  @vite([ $styling, $functioning ])
</head>
<body class="bg-bg-dark-primary text-secondary-text flex p-0 pt-12 m-0 min-h-screen flex-col">
  <nav class="flex gap-1 p-1 pl-3 bg-bg-dark-nav fixed w-full top-0 h-12 items-center shadow-[0_0_20px_var(--color-body-cyan-40)]">
    <div class="flex gap-3 h-8 ml-auto">
        <div onclick="window.location.href='{{ route('user_pending_tasks.show') }}'" class="h-8 w-8 rounded-full hover:border group relative">
          <img class="h-full w-full object-contain filter" style="filter: brightness(0) saturate(100%) invert(63%) sepia(61%) saturate(4496%) hue-rotate(158deg) contrast(1.05);" src="{{ asset("system-pending-line-svgrepo-com.svg") }}" alt="pending tasks icon">
          <span class="rounded opacity-0 text-xs text-nowrap absolute left-1/2 -translate-x-1/2 top-[150%] bg-dark-nav  text-primary-bright p-1 after:content-[''] after:left-1/2 after:-translate-x-1/2 after:absolute after:bottom-full after:border-[5px] after:border-transparent after:border-b-accent-rose group-hover:opacity-100 pointer-events-none">pending tasks</span>
        </div>
        <div onclick="window.location.href='{{ route('user_done_tasks.show') }}'" class="h-8 w-8 rounded-full hover:border group relative">
          <img class="h-full w-full object-contain filter" style="filter: brightness(0) saturate(100%) invert(63%) sepia(61%) saturate(4496%) hue-rotate(158deg) contrast(1.05);" src="{{ asset("done-all-alt-round-svgrepo-com.svg") }}" alt="finished tasks icon">
          <span class="rounded opacity-0 text-xs text-nowrap absolute left-1/2 -translate-x-1/2 top-[150%] bg-dark-nav  text-primary-bright p-1 after:content-[''] after:left-1/2 after:-translate-x-1/2 after:absolute after:bottom-full after:border-[5px] after:border-transparent after:border-b-accent-rose group-hover:opacity-100 pointer-events-none">finished tasks</span>
        </div>
        <div onclick="window.location.href='{{ route('Vuser_homepage.show') }}'" class="h-8 w-8 rounded-full hover:border group relative">
          <img class="h-full w-full object-contain filter" style="filter: brightness(0) saturate(100%) invert(63%) sepia(61%) saturate(4496%) hue-rotate(158deg) contrast(1.05);" src="{{ asset("home-house-homepage-2-svgrepo-com.svg") }}" alt="home icon">
          <span class="rounded opacity-0 text-xs text-nowrap absolute left-1/2 -translate-x-1/2 top-[150%] bg-dark-nav  text-primary-bright p-1 after:content-[''] after:left-1/2 after:-translate-x-1/2 after:absolute after:bottom-full after:border-[5px] after:border-transparent after:border-b-accent-rose group-hover:opacity-100 pointer-events-none">home page</span>
        </div>
        <div onclick="window.location.href='{{ route('profile.show') }}'" class="h-8 w-8 rounded-full hover:border flex justify-center items-center group relative">
          <img class="h-full w-full object-contain filter" style="filter: brightness(0) saturate(100%) invert(63%) sepia(61%) saturate(4496%) hue-rotate(158deg) contrast(1.05);" src="{{ asset("profile-1341-svgrepo-com.svg") }}" alt="profile icon">
          <span class="opacity-0 9text-xs text-nowrap absolute -left-4  top-[150%] bg-dark-nav text-primary-bright p-1 after:content-[''] after:absolute after:right-2 after:bottom-full after:border-[5px] after:border-transparent after:border-b-accent-rose group-hover:opacity-100 pointer-events-none rounded">profile</span>
        </div>
    </div>
  </nav>
  <main>
    {{ $slot }}
  </main>
</body>
</html>