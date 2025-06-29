<div>
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div class="w-full bg-gradient-to-r from-softgreen to-cream py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid -->
            <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
                <div>
                    <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight ">SEA
                        Catering
                    </h1>
                    <h2 class="block text-xl font-semibold sm:text-2xl lg:text-3xl lg:leading-tight text-primary">Healthy
                        Meals, Anytime, Anywhere</h2>
                    <p class="mt-3 text-lg text-gray-800">Welcome to SEA Catering your trusted partner for customizable,
                        nutritious meals delivered straight to your door, anywhere in Indonesia.</p>
                    <!-- Buttons -->
                    <div class="mt-7 flex flex-col sm:flex-row gap-3 w-full">
                        <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary text-white hover:bg-primary-dark disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-800"
                            href="/subscription">
                            Order Now
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                        <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none "
                            href="/contact">
                            Contact
                        </a>
                    </div>
                    <!-- End Buttons -->
                </div>

                <!-- End Col -->
                <div class="relative flex justify-center sm:justify-start ms-0">
                    <img class="w-full sm:max-w-md md:max-w-lg rounded-md" src="{{ asset('img/hero.jpg') }}"
                        alt="Image Description">
                </div>

            </div>
            <!-- End Grid -->
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Why Choose SEA Catering?</h2>
            <p class="mt-4 text-lg text-gray-800">
                The best service for your healthy lifestyle
            </p>
        </div>

        <div class="mt-16 max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            <!-- 100% Organic -->
            <div class="flex flex-col items-center">
                <div class="bg-green-500 text-white p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#ffffff">
                        <path
                            d="M216-176q-45-45-70.5-104T120-402q0-63 24-124.5T222-642q35-35 86.5-60t122-39.5Q501-756 591.5-759t202.5 7q8 106 5 195t-16.5 160.5q-13.5 71.5-38 125T684-182q-53 53-112.5 77.5T450-80q-65 0-127-25.5T216-176Zm112-16q29 17 59.5 24.5T450-160q46 0 91-18.5t86-59.5q18-18 36.5-50.5t32-85Q709-426 716-500.5t2-177.5q-49-2-110.5-1.5T485-670q-61 9-116 29t-90 55q-45 45-62 89t-17 85q0 59 22.5 103.5T262-246q42-80 111-153.5T534-520q-72 63-125.5 142.5T328-192Zm0 0Zm0 0Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">100% Organic</h3>
                <p class="mt-2 text-sm text-gray-800">
                    Fresh and organic ingredients for optimal health
                </p>
            </div>

            <!-- Nutrition Tracking -->
            <div class="flex flex-col items-center">
                <div class="bg-yellow-500 text-white p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3v18h18M18 9l-6 6-4-4" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Nutrition Tracking</h3>
                <p class="mt-2 text-sm text-gray-800">
                    Complete nutritional information for each dish
                </p>
            </div>

            <!-- Fast Delivery -->
            <div class="flex flex-col items-center">
                <div class="bg-red-500 text-white p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#ffffff">
                        <path
                            d="M280-160q-50 0-85-35t-35-85H60l18-80h113q17-19 40-29.5t49-10.5q26 0 49 10.5t40 29.5h167l84-360H182l4-17q6-28 27.5-45.5T264-800h456l-37 160h117l120 160-40 200h-80q0 50-35 85t-85 35q-50 0-85-35t-35-85H400q0 50-35 85t-85 35Zm357-280h193l4-21-74-99h-95l-28 120Zm-19-273 2-7-84 360 2-7 34-146 46-200ZM20-427l20-80h220l-20 80H20Zm80-146 20-80h260l-20 80H100Zm180 333q17 0 28.5-11.5T320-280q0-17-11.5-28.5T280-320q-17 0-28.5 11.5T240-280q0 17 11.5 28.5T280-240Zm400 0q17 0 28.5-11.5T720-280q0-17-11.5-28.5T680-320q-17 0-28.5 11.5T640-280q0 17 11.5 28.5T680-240Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Fast Delivery</h3>
                <p class="mt-2 text-sm text-gray-800">
                    Fast delivery throughout Indonesia
                </p>
            </div>
        </div>
    </section>

    <livewire:testimonial-section />



</div>
