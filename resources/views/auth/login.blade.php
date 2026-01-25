<x-layout.frontend>
    <div class="min-h-screen flex items-center justify-center
                bg-gradient-to-tr from-emerald-100 via-white to-indigo-100 px-4">

        <!-- Card -->
        <div class="w-full max-w-md backdrop-blur-lg bg-white/90
                    rounded-3xl shadow-2xl p-8 border border-gray-100">

            <!-- Brand -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-800">
                    Trendy <span class="text-emerald-600">Corner</span>
                </h1>
                <p class="text-sm text-gray-500 mt-2">
                    Login to continue shopping trends ✨
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-sm" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" value="Email Address" />
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            📧
                        </span>
                        <x-text-input
                            id="email"
                            class="pl-10 block w-full rounded-xl border-gray-300
                                   focus:border-emerald-500 focus:ring-emerald-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" value="Password" />
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            🔒
                        </span>
                        <x-text-input
                            id="password"
                            class="pl-10 block w-full rounded-xl border-gray-300
                                   focus:border-emerald-500 focus:ring-emerald-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" name="remember"
                               class="rounded border-gray-300 text-emerald-600
                                      focus:ring-emerald-500">
                        <span class="ml-2">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-emerald-600 hover:underline font-medium">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-emerald-500 to-green-600
                           hover:from-emerald-600 hover:to-green-700
                           text-white font-semibold py-3 rounded-xl
                           transition duration-200 shadow-lg">
                    Log In
                </button>

                <!-- Divider -->
                <div class="flex items-center my-6">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="px-3 text-xs text-gray-400">OR</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <!-- Google Login -->
                <a href="{{ route('google.redirect') }}"
                   class="w-full flex items-center justify-center gap-3
                          border border-gray-300 rounded-xl py-3
                          hover:bg-gray-50 transition font-medium">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                         class="w-5 h-5" alt="Google">
                    Continue with Google
                </a>

                <!-- Register -->
                <p class="text-center text-sm text-gray-600 mt-6">
                    Don’t have an account?
                    <a href="{{ route('register') }}"
                       class="text-emerald-600 font-semibold hover:underline">
                        Sign up
                    </a>
                </p>

            </form>
        </div>
    </div>
</x-layout.frontend>
