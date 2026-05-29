<!DOCTYPE html>
<html lang="en" class="p-0 m-0">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  @vite(["resources/css/app.css", "resources/css/app.js"])
</head>

<body class="bg-bg-dark-primary text-secondary-text flex p-0 m-0 min-h-screen flex-col">
  <nav
    class="flex gap-1 p-1 pl-3 bg-bg-dark-nav sticky top-0 h-12 items-center shadow-[0_0_20px_var(--color-body-cyan-40)]">
    <div class="flex gap-3 h-8 ml-auto">
      <a class="text-secondary-text leading-relaxed hover:text-primary-bright" href="/LogIn">LogIn</a>
      <a class="text-secondary-text leading-relaxed hover:text-primary-bright" href="/SignUp">SignUp</a>
    </div>
  </nav>
  <main>
    <div
      class="text-primary-bright p-6 flex gap-6 justify-start flex-col items-center absolute top-1/5 left-1/2 -translate-x-1/2 w-[40vw] min-h-[50vh] shadow-[0_0_30px_1px_var(--color-body-cyan-40)] border border-body-cyan bg-bg-card rounded-lg backdrop-blur">
      <p class="text-7xl font-bold text-primary-bright">Hello!</p>
      <p class="text-xl text-center text-body-cyan">Please <a
          class="font-semibold underline text-accent-rose hover:text-accent-amber transition" href="/LogIn">log in</a>,
        or <a class="font-semibold underline text-accent-rose hover:text-accent-amber transition" href="/SignUp">sign
          up</a> to view your tasks...</p>
    </div>
  </main>
</body>

</html>