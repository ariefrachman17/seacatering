@vite('resources/css/app.css')
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <main class="w-full max-w-sm">
        <div class="bg-white shadow-md border border-gray-200 rounded-2xl overflow-hidden">
            <!-- Logo -->
            <div class="bg-primary px-6 py-8 flex justify-center items-center">
                <img src="{{ asset('img/logo2.svg') }}" alt="Logo" class="w-auto h-36 lg:h-52">
            </div>

            <!-- Form -->
            <div class="p-6">
                <div class="text-center mb-5">
                    <h1 class="text-2xl font-bold text-black">Register Account</h1>
                    <p class="text-sm text-gray-500">Create a new account</p>
                </div>

                <form>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm mb-1">Full name</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 end-0 flex items-center pe-3">
                                    <!-- name Icon -->
                                    <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </span>
                                <input type="text" id="name" name="name"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm mb-1">Email address</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 end-0 flex items-center pe-3">
                                    <!-- Email Icon -->
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 7.5v9a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 16.5v-9A2.25 2.25 0 014.5 5.25h15a2.25 2.25 0 012.25 2.25zm-1.5 0l-8.25 6-8.25-6" />
                                    </svg>
                                </span>
                                <input type="email" id="email" name="email"
                                class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                            </div>
                            <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p>
                        </div>

                        <!-- phone number -->
                        <div>
                            <label for="phone_number" class="block text-sm mb-1">Phone number</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 end-0 flex items-center pe-3">
                                    <!-- Phone Icon -->
                                    <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>

                                </span>
                                <input type="tel" id="phone_number" name="phone_number"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <div class="flex justify-between mb-1">
                                <label for="password" class="text-sm">Password</label>
                            </div>
                            <div class="relative">
                                <span class="absolute inset-y-0 end-0 flex items-center pe-3">
                                    <!-- Lock Icon -->
                                    <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />

                                    </svg>
                                </span>
                                <input type="password" id="password" name="password"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                            <p class="hidden text-xs text-red-600 mt-2" id="password-error">8+ characters required</p>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <div class="flex justify-between mb-1">
                                <label for="password" class="text-sm">Confirm password</label>
                            </div>
                            <div class="relative">
                                <span class="absolute inset-y-0 end-0 flex items-center pe-3">
                                    <!-- Lock Icon -->
                                    <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />

                                    </svg>
                                </span>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                            <p class="hidden text-xs text-red-600 mt-2" id="password-error">8+ characters required</p>
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary/90 transition">
                            Register
                        </button>
                    </div>

                    <!-- Sign up link -->
                    <p class="mt-5 text-sm text-center text-gray-500">
                        Already have an account?
                        <a href="/register" class="text-primary font-medium hover:underline">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </main>
</div>
