<div>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 p-3">
        <main class="w-full max-w-sm">
            <div class="bg-white shadow-md border border-gray-200 rounded-2xl overflow-hidden">
                <!-- Logo -->
                <div class="bg-primary px-3 py-4 flex justify-center items-center">
                    <img src="{{ asset('img/logo2.svg') }}" alt="Logo" class="w-auto h-36 lg:h-52">
                </div>

                <!-- Form -->
                <div class="p-6">
                    <div class="text-center mb-5">
                        <h1 class="text-2xl font-bold text-black">Register Account</h1>
                        <p class="text-sm text-gray-500">Create a new account</p>
                    </div>

                    <form wire:submit.prevent="register">
                        @csrf
                        <div class="space-y-4">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm mb-1">Full name</label>
                                <input wire:model="name" type="text" id="name" name="name"
                                    placeholder="Full Name"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm mb-1">Email address</label>
                                <input wire:model="email" type="email" id="email" name="email"
                                    placeholder="example@gmail.com"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('email') is-invalid @enderror"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone_number" class="block text-sm mb-1">Phone number</label>
                                <input wire:model="phone_number" type="tel" id="phone_number" name="phone_number"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm mb-1">Password</label>
                                <input wire:model="password" type="password" id="password" name="password"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('password') is-invalid @enderror"
                                    required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="confirm_password" class="block text-sm mb-1">Confirm password</label>
                                <input wire:model="confirm_password" type="password" id="confirm_password" name="confirm_password"
                                    class="w-full border border-gray-300 rounded-lg ps-3 pe-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('confirm_password') is-invalid @enderror"
                                    required>
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <button type="submit"
                                class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary/90 transition">
                                Register
                            </button>
                        </div>

                        <p class="mt-5 text-sm text-center text-gray-500">
                            Already have an account?
                            <a href="/login" class="text-primary font-medium hover:underline">Sign in</a>
                        </p>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
