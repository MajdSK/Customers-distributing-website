<!DOCTYPE html>
<html lang="en" class="p-0 m-0">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body class="auth-page font-sans p-0 m-0">
  <div class="min-h-screen flex items-center justify-center px-4 py-10">
    <div class="auth-card w-full max-w-xl p-8 sm:p-10 rounded-3xl shadow-[0_0_40px_8px_rgba(39,199,255,0.08)]">
      <div class="mb-8">
        <p class="text-body-cyan uppercase tracking-[0.35em] font-semibold text-sm">Create account</p>
        <h1 class="mt-4 text-4xl font-bold text-primary-bright">Sign up for access</h1>
        <p class="mt-2 text-body-cyan-40 max-w-xl">Create your account to manage your customers and tasks in one
          place.</p>
      </div>

      @if($errors->any())
        <div class="mb-6 rounded-2xl border border-accent-rose/30 bg-[#4b1120] p-4 text-accent-rose">
          <ul class="space-y-1 text-sm">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="/SignUp" method="POST" class="space-y-5">
        @csrf
        <label class="block text-sm font-medium text-body-cyan-40">
          <span class="mb-2 inline-block">Full name</span>
          <input type="text" name="name" value="{{ old('name') }}" required
            class="auth-input w-full rounded-3xl px-4 py-3 text-base placeholder:text-body-cyan-40 focus:border-body-cyan focus:ring-2 focus:ring-body-cyan/20 focus:outline-none"
            placeholder="Your full name">
        </label>

        <label class="block text-sm font-medium text-body-cyan-40">
          <span class="mb-2 inline-block">Email address</span>
          <input type="email" name="email" value="{{ old('email') }}" required
            class="auth-input w-full rounded-3xl px-4 py-3 text-base placeholder:text-body-cyan-40 focus:border-body-cyan focus:ring-2 focus:ring-body-cyan/20 focus:outline-none"
            placeholder="you@example.com">
        </label>

        <label class="block text-sm font-medium text-body-cyan-40">
          <span class="mb-2 inline-block">Password</span>
          <input type="password" name="password" required
            class="auth-input w-full rounded-3xl px-4 py-3 text-base placeholder:text-body-cyan-40 focus:border-body-cyan focus:ring-2 focus:ring-body-cyan/20 focus:outline-none"
            placeholder="Choose a strong password">
        </label>

        <div class="flex items-center justify-between text-sm text-body-cyan-40">
          <p>Already have an account?</p>
          <a href="/LogIn" class="auth-link font-semibold hover:text-primary-bright transition">Log in</a>
        </div>

        <button type="submit"
          class="auth-button w-full rounded-3xl px-5 py-3 text-base font-semibold shadow-lg shadow-body-cyan/20 transition duration-200 hover:shadow-body-cyan/40">Sign
          Up</button>
      </form>
    </div>
  </div>
</body>

</html>