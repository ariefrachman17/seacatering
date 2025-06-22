<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <main class="w-full max-w-sm">
        <div class="bg-white shadow-md border border-gray-200 rounded-2xl overflow-hidden">
            <div class="bg-primary px-3 py-4 flex justify-center items-center">
                <img src="{{ asset('img/logo2.svg') }}" alt="Logo" class="w-auto h-36 lg:h-52">
            </div>

            <div class="p-6">
                <div class="text-center mb-5">
                    <h1 class="text-2xl font-bold text-black">Welcome Back</h1>
                    <p class="text-sm text-gray-500">Sign in to your account</p>
                </div>

                <form wire:submit.prevent="login">
                    <div class="space-y-4">
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm mb-1">Email address</label>
                            <input wire:model="email" type="email" id="email" name="email"
                                class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('email') is-invalid @enderror"
                                required>
                            @error('email')
                                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <div class="flex justify-between mb-1">
                                <label for="password" class="text-sm">Password</label>
                                <a href="/forgot" class="text-sm text-primary hover:underline">Forgot?</a>
                            </div>
                            <input wire:model="password" type="password" id="password" name="password"
                                class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('password') is-invalid @enderror"
                                required>
                            @error('password')
                                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary/90 transition">
                            Sign in
                        </button>
                    </div>

                    <p class="mt-5 text-sm text-center text-gray-500">
                        Don't have an account?
                        <a href="/register" class="text-primary font-medium hover:underline">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </main>
</div>
