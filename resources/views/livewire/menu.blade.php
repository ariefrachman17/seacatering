<section class="py-6 bg-gray-50">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800">Our Menu Plans</h2>
        <p class="mt-2 text-sm text-gray-800 lg:text-lg">Choose a package that suits your needs</p>
    </div>

    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

        <!-- Diet Plan -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-48 object-cover" src="{{ asset('img/diet.jpg') }}" alt="Diet Plan">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800">Diet Plan</h3>
                <p class="text-primary font-bold text-lg mt-2">Rp 30,000</p>
                <p class="text-sm text-gray-600 mt-2">Balanced diet program with controlled calories for weight loss</p>
                <button class="mt-4 w-full bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded">
                    See More Details
                </button>
            </div>
        </div>

        <!-- Protein Plan -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-48 object-cover" src="{{ asset('img/protein.jpg') }}" alt="Protein Plan">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800">Protein Plan</h3>
                <p class="text-primary font-bold text-lg mt-2">Rp 40,000</p>
                <p class="text-sm text-gray-600 mt-2">High in protein for building muscle mass and recovery</p>
                <button class="mt-4 w-full bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded">
                    See More Details
                </button>
            </div>
        </div>

        <!-- Royal Plan -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-48 object-cover" src="{{ asset('img/royal.jpg') }}" alt="Royal Plan">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800">Royal Plan</h3>
                <p class="text-primary font-bold text-lg mt-2">Rp 60,000</p>
                <p class="text-sm text-gray-600 mt-2">Premium package with the most complete menu variations and high
                    quality ingredients</p>
                <button class="mt-4 w-full bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded">
                    See More Details
                </button>
            </div>
        </div>

    </div>
</section>
