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

                <form wire:submit.prevent="resetpw">
                    <div class="space-y-4">
                        <!-- Password -->
                        <div>
                            <div class="flex justify-between mb-1">
                                <label for="password" class="text-sm">Password</label>
                            </div>
                            <div class="relative">
                                <input wire:model="password" type="password" id="password" name="password"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('password') is-invalid @enderror"
                                    required>
                            </div>
                            @error('password')
                                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <div class="flex justify-between mb-1">
                                <label for="confirm_password" class="text-sm">Confirm password</label>
                            </div>
                            <div class="relative">
                                <input wire:model="confirm_password" type="password" id="confirm_password" name="confirm_password"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('confirm_password') is-invalid @enderror"
                                    required>
                            </div>
                            @error('confirm_password')
                                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                            @enderror
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
    </main>
</div>
