<section class="py-6 bg-gray-50">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-center text-gray-900">Start Your Subscription</h2>
        <p class="text-center text-gray-600 mb-8">Start living a healthy life with our subscription packages</p>

        <form wire:submit.prevent="submit" class="space-y-6">
            @csrf
            @auth
                <!-- Full Name -->
                <div>
                    <label for="fullname" class="block mb-2 text-gray-800 font-medium">Full Name</label>
                    <input type="text" id="fullname" value="{{ auth()->user()->name }}" readonly
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none"
                        aria-label="Full Name pengguna">
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block mb-2 text-gray-800 font-medium">Phone Number</label>
                    <input type="text" id="phone" value="{{ auth()->user()->phone_number }}" readonly
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none"
                        aria-label="Phone Number pengguna">
                </div>
            @endauth

            <!-- Package -->
            <div>
                <label for="package" class="block mb-2 text-gray-800 font-medium">Choose Your Package</label>
                <select wire:model.live="package_id" id="package" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Select Package</option>
                    <option value="1">Diet Plan - Rp 30.000</option>
                    <option value="2">Protein Plan - Rp 40.000</option>
                    <option value="3">Royal Plan - Rp 60.000</option>
                </select>
                @error('package_id')
                    <span class="text-red-500 text-sm mt-1 block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Type of Food -->
            <div>
                <fieldset>
                    <legend class="block mb-2 text-gray-800 font-medium">Type of Food</legend>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        @foreach (['breakfast' => 'Breakfast', 'lunch' => 'Launch', 'dinner' => 'Dinner'] as $value => $label)
                            <label
                                class="flex items-center gap-2 border rounded-lg px-4 py-3 cursor-pointer hover:bg-gray-50 transition-colors">
                                <input type="checkbox" wire:model.live="meals" value="{{ $value }}"
                                    class="rounded border-gray-300 text-primary focus:ring-primary"
                                    aria-describedby="meals-error">
                                <span class="text-sm">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('meals')
                        <span id="meals-error" class="text-red-500 text-sm mt-1 block"
                            role="alert">{{ $message }}</span>
                    @enderror
                </fieldset>
            </div>

            <!-- Delivery Days -->
            <div>
                <fieldset>
                    <legend class="block mb-2 text-gray-800 font-medium">Delivery Days per Week</legend>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                        @foreach (['monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday', 'saturday' => 'Saturday', 'sunday' => 'Sunday'] as $value => $label)
                            <label
                                class="flex items-center gap-2 border rounded-lg px-3 py-2 cursor-pointer hover:bg-gray-50 transition-colors">
                                <input type="checkbox" wire:model.live="delivery_days" value="{{ $value }}"
                                    class="rounded border-gray-300 text-primary focus:ring-primary"
                                    aria-describedby="delivery-days-error">
                                <span class="text-sm">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('delivery_days')
                        <span id="delivery-days-error" class="text-red-500 text-sm mt-1 block"
                            role="alert">{{ $message }}</span>
                    @enderror
                </fieldset>
            </div>

            <!-- Start Date -->
            <div>
                <label for="start_date" class="block mb-2 text-gray-800 font-medium">Subscription Start Date</label>
                <input type="date" wire:model.live="start_date" id="start_date" required min="{{ date('Y-m-d') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                @error('start_date')
                    <span class="text-red-500 text-sm mt-1 block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- End Date -->
            @if ($start_date)
                <div>
                    <label for="end_date" class="block mb-2 text-gray-800 font-medium">Subscription End Date</label>
                    <input type="date" value="{{ $end_date }}" id="end_date" readonly
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none"
                        aria-label="Subscription end date is automatically 30 days from the start date">
                    <p class="text-xs text-gray-500 mt-1">Automatically 30 days from start date</p>
                </div>
            @endif

            <!-- Note any allergies -->
            <div>
                <label for="allergies" class="block mb-2 text-gray-800 font-medium">Allergies/Dietary Restrictions</label>
                <textarea wire:model="allergies" id="allergies" rows="3"
                    placeholder="Write down your allergies or dietary restrictions (optional)"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                    aria-label="Note any allergies or dietary restrictions"></textarea>
            </div>


            <!-- Total Price -->
            <div class="bg-primary text-white text-center py-4 rounded-lg font-semibold text-lg">
                Total Price/Month<br>
                <span class="text-2xl font-bold">Rp {{ number_format($total_price, 0, ',', '.') }}</span>
            </div>

            @auth
                <!-- If the user is already logged in -->
                <button type="submit" wire:loading.attr="disabled" wire:target="submit"
                    class="w-full bg-primary hover:bg-primary-dark text-white py-3 rounded-lg font-semibold transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                    <span wire:loading.remove wire:target="submit">Subscribe Now</span>
                    <span wire:loading wire:target="submit" class="flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                    <span wire:loading>Loading...</span>
                </button>
            @else
                <!-- If you haven't logged in yet -->
                <a href="{{ route('login') }}"
                    class="w-full block text-center bg-primary hover:bg-primary-dark text-white py-3 rounded-lg font-semibold transition-colors">
                    Sign in to Subscribe
                </a>
            @endauth

            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg" role="alert">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('message') }}
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" role="alert">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif
        </form>
    </div>
</section>
