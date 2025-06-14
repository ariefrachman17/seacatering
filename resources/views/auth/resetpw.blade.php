@vite('resources/css/app.css')
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <main class="w-full max-w-sm">
        <div class="bg-white shadow-md border border-gray-200 rounded-2xl overflow-hidden">
            <!-- Logo -->
            <div class="bg-primary px-3 py-4 flex justify-center items-center">
                <img src="{{ asset('img/logo2.svg') }}" alt="Logo" class="w-auto h-36 lg:h-52">
            </div>
            <!-- Form -->
            <div class="p-6">
                <div class="text-center mb-5">
                    <h1 class="text-2xl font-bold text-black">Reset Password</h1>
                    <p class="text-sm text-gray-500">Enter a new password</p>
                </div>

                <form>
                    <div class="space-y-4">
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
                            Save password
                        </button>
                    </div>
                </form>
            </div>
        </div>
</div>
