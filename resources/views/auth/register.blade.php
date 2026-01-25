<x-layout.frontend>
    <div class="min-h-screen flex items-center justify-center
                bg-gradient-to-tr from-emerald-100 via-white to-indigo-100 px-4 mt-4">

        <!-- Card -->
        <div class="w-full max-w-md backdrop-blur-lg bg-white/90
                    rounded-3xl shadow-2xl p-8 border border-gray-100 mt-4">

            <!-- Brand -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-800">
                    Trendy <span class="text-emerald-600">Corner</span>
                </h1>
                <p class="text-sm text-gray-500 mt-2">
                    Create your account and start shopping ✨
                </p>
            </div>

            <!-- Google Register -->
            <a href="{{ route('google.redirect') }}"
               class="w-full flex items-center justify-center gap-3
                      border border-gray-300 rounded-xl py-3
                      hover:bg-gray-50 transition font-medium mb-6">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                     class="w-5 h-5" alt="Google">
                Continue with Google
            </a>

            <!-- Divider -->
            <div class="flex items-center mb-6">
                <div class="flex-grow border-t border-gray-200"></div>
                <span class="px-3 text-xs text-gray-400">OR</span>
                <div class="flex-grow border-t border-gray-200"></div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div>
                    <x-input-label for="name" value="Full Name" />
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            👤
                        </span>
                        <x-text-input
                            id="name"
                            class="pl-10 block w-full rounded-xl border-gray-300
                                   focus:border-emerald-500 focus:ring-emerald-500"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            placeholder="John Doe"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

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
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" value="Confirm Password" />
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            🔒
                        </span>
                        <x-text-input
                            id="password_confirmation"
                            class="pl-10 block w-full rounded-xl border-gray-300
                                   focus:border-emerald-500 focus:ring-emerald-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-emerald-500 to-green-600
                           hover:from-emerald-600 hover:to-green-700
                           text-white font-semibold py-3 rounded-xl
                           transition duration-200 shadow-lg">
                    Create Account
                </button>

                <!-- Login Redirect -->
                <p class="text-center text-sm text-gray-600 mt-6">
                    Already have an account?
                    <a href="{{ route('login') }}"
                       class="text-emerald-600 font-semibold hover:underline">
                        Log in
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-layout.frontend>
