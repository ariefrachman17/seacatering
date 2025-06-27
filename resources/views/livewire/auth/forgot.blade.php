<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 pt-3">
    <main class="w-full max-w-sm">
        <div class="bg-white shadow-md border border-gray-200 rounded-2xl overflow-hidden">
            <!-- Logo -->
            <div class="bg-primary px-3 py-4 flex justify-center items-center">
                <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="w-auto h-56 lg:h-60">
            </div>

            <!-- Form -->
            <div class="p-6">
                <div class="text-center mb-5">
                    <h1 class="text-2xl font-bold text-black">Forgot Password</h1>
                    <p class="text-sm text-gray-500">Enter email to reset password</p>
                </div>

                <form wire:submit.prevent="sendResetLink">
                    <div class="space-y-4">
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
                                <input wire:model="email" type="email" id="email" name="email"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('email') is-invalid @enderror"
                                    required>
                            </div>
                            @error('email')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary/90 transition">
                            Reset password
                        </button>

                        @if (session()->has('success'))
                            <p class="text-sm text-green-600 text-center mt-3">{{ session('success') }}</p>
                        @endif
                        @if (session()->has('error'))
                            <p class="text-sm text-red-600 text-center mt-3">{{ session('error') }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
