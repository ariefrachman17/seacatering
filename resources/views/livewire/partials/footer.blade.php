<footer class="bg-secondary w-full">
    <div class="w-full max-w-[85rem] py-8 px-4 sm:px-6 lg:px-6 lg:pt-15 mx-auto">
        <!-- Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4">
            <div class="col-span-2 md:col-span-1">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('img/logo4.svg') }}" alt="logo4" class="h-15 w-auto">
                    <a class="flex-none text-xl font-semibold text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="#" aria-label="Brand">SEA Catering</a>
                </div>
                <p class="inline-flex gap-x-2 font-semibold text-gray-400 text-sm">Healthy Meals, Anytime, Anywhere</p>
            </div>

            <!-- End Col -->

            <div class="col-span-1">
                <h4 class="font-semibold text-gray-100">Quick Links</h4>

                <div class="mt-3 grid space-y-3">
                    <p><a class="inline-flex gap-x-2 font-semibold text-gray-400 hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('home') }}">Home</a></p>
                    <p><a class="inline-flex gap-x-2 font-semibold text-gray-400 hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('menu') }}">Menu Plans</a></p>
                    <p><a class="inline-flex gap-x-2 font-semibold text-gray-400 hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('subscription') }}">Subscription</a></p>
                    <p><a class="inline-flex gap-x-2 font-semibold text-gray-400 hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('contact') }}">Contact</a></p>
                </div>
            </div>
            <!-- End Col -->

            <div class="col-span-1">
                <h4 class="font-semibold text-gray-100">Services</h4>

                <div class="mt-3 grid space-y-3">
                    <p><a class="inline-flex gap-x-2 font-semibold text-gray-400 hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('menu') }}">Diet Plan</a></p>
                    <p><a class="inline-flex gap-x-2 font-semibold text-gray-400 hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('menu') }}">Protein Plain</a></p>
                    <p><a class="inline-flex gap-x-2 font-semibold text-gray-400 hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('menu') }}">Royal Plan</a></p>
                </div>
            </div>
            <!-- End Col -->

            <div class="col-span-1">
                <h4 class="font-semibold text-gray-100">Follow Us</h4>
                <!-- Social Brands -->
                <div>
                    <a class="w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-gray-600"
                        href="https://wa.me/628123456789">
                        <svg role="img" height="24px" width="24px" fill="#999999"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>WhatsApp</title>
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                    </a>
                </div>
                <!-- End Social Brands -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->

        <div class="mt-5 sm:mt-12 grid gap-y-2 sm:gap-y-0 sm:items-center">
            <div class="flex justify-between items-center">
                <p class="text-sm font-semibold text-gray-400">© 2025 SEACatering. All rights reserved.</p>
            </div>
            <!-- End Col -->
        </div>
    </div>
</footer>
