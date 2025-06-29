<div>
    <section class="py-6 bg-gray-50">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Our Menu Plans</h2>
            <p class="mt-2 text-sm text-gray-600 lg:text-lg">Choose a package that suits your needs</p>
        </div>

        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($menuPlans as $plan)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img class="w-full h-48 object-cover" src="{{ asset($plan['image']) }}" alt="{{ $plan['name'] }}">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $plan['name'] }}</h3>
                    <p class="text-primary font-bold text-lg mt-2">Rp {{ number_format($plan['price'], 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-600 mt-2">{{ $plan['short_description'] }}</p>
                    
                    <button wire:click="showDetails('{{ $plan['id'] }}')" 
                            class="mt-4 w-full bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded transition duration-300">
                        See More Details
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Modal -->
    @if($showModal && $selectedMenu)
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" 
         wire:click="closeModal">
        <div class="relative top-4 mx-auto p-5 border w-11/12 md:w-4/5 lg:w-3/4 xl:w-2/3 shadow-lg rounded-md bg-white max-h-screen overflow-y-auto"
             wire:click.stop>
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $selectedMenu['name'] }}</h3>
                    <p class="text-2xl font-bold text-primary mt-1">Rp {{ number_format($selectedMenu['price'], 0, ',', '.') }}</p>
                </div>
                <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 text-2xl font-bold">
                    &times;
                </button>
            </div>

            <!-- Modal Content -->
            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Left Column - Image and Basic Info -->
                <div>
                    <div class="relative mb-6">
                        <img src="{{ asset($selectedMenu['image']) }}" 
                             alt="{{ $selectedMenu['name'] }}" 
                             class="w-full h-64 object-cover rounded-lg shadow-md">
                        <div class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $selectedMenu['duration'] }}
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-lg mb-3 text-gray-800">Description</h4>
                        <p class="text-gray-600 leading-relaxed">{{ $selectedMenu['description'] }}</p>
                    </div>

                    <!-- Key Statistics -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg text-center">
                            <h5 class="font-semibold text-gray-800 text-sm">Daily Calories</h5>
                            <p class="text-primary font-bold text-lg">{{ $selectedMenu['calories_per_day'] }}</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg text-center">
                            <h5 class="font-semibold text-gray-800 text-sm">Program Duration</h5>
                            <p class="text-primary font-bold text-lg">{{ $selectedMenu['duration'] }}</p>
                        </div>
                    </div>

                    <!-- Suitable For -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h5 class="font-semibold text-gray-800 mb-2">Perfect For:</h5>
                        <p class="text-gray-600 text-sm">{{ $selectedMenu['suitable_for'] }}</p>
                    </div>
                </div>

                <!-- Right Column - Features and Menu -->
                <div>
                    <!-- Features -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-lg mb-4 text-gray-800">What's Included</h4>
                        <ul class="space-y-2">
                            @foreach($selectedMenu['features'] as $feature)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 text-sm">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Sample Menu -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-lg mb-4 text-gray-800">Sample Daily Menu</h4>
                        <div class="space-y-3">
                            @foreach($selectedMenu['menu_items'] as $item)
                            <div class="bg-gradient-to-r from-blue-50 to-transparent border-l-4 border-primary pl-4 py-2">
                                <p class="text-gray-700 text-sm">{{ $item }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Benefits -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-lg mb-4 text-gray-800">Key Benefits</h4>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($selectedMenu['benefits'] as $benefit)
                            <div class="flex items-center bg-green-50 p-2 rounded">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 text-sm">{{ $benefit }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t">
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-end">
                    <button wire:click="closeModal" class="border-2 border-gray-300 bg-primary text-white  hover:bg-primary-dark font-semibold py-3 px-8 rounded-lg transition duration-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>