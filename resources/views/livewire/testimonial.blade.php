<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl md:text-4xl text-gray-900 font-bold text-center mb-2">Testimony</h2>
        <p class="text-center text-gray-600 mb-10">What customers say about our services</p>
        <div class="grid md:grid-cols-2 gap-8">

            {{-- Form Testimoni --}}
            <div class="bg-gray-50 p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-4">Give Your Testimonial</h3>
                @if (session()->has('success'))
                    <div class="bg-green-100 text-primary px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form wire:submit.prevent="submit" class="space-y-4">

                    {{-- Rating --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">Rating</label>
                        <div class="flex gap-1 text-yellow-400 text-xl">
                            @for ($i = 1; $i <= 5; $i++)
                                <span wire:click="$set('rating', {{ $i }})"
                                    class="cursor-pointer {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                            @endfor
                        </div>
                        @error('rating')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Message --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">Message</label>
                        <textarea rows="4" wire:model.defer="message" placeholder="Tell us about your experience..."
                            class="w-full border rounded px-4 py-2"></textarea>
                        @error('message')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary-dark text-white font-semibold py-2 rounded">
                        Submit Testimonial
                    </button>
                </form>
            </div>

            {{-- Daftar Testimoni --}}
            <div class="space-y-4">
                @forelse ($testimonials as $testimonial)
                    <div class="bg-white p-4 shadow rounded-lg flex gap-4 items-start">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonial->user->name) }}&background=cccccc&color=ffffff"
                            class="w-12 h-12 rounded-full object-cover" alt="Avatar {{ $testimonial->user->name }}">
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-1">
                                <p class="font-semibold text-gray-800">{{ $testimonial->user->name }}</p>
                                <small class="text-gray-400">{{ $testimonial->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="text-yellow-400 text-sm mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span>{{ $i <= $testimonial->rating ? '★' : '☆' }}</span>
                                @endfor
                                <span class="text-gray-600 ml-1">({{ $testimonial->rating }}/5)</span>
                            </div>
                            <p class="text-gray-600 text-sm">"{{ $testimonial->message }}"</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500 mb-2">There are no testimonials yet.</p>
                        <p class="text-gray-400 text-sm">Be the first to share your experience!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
