<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-2">Testimonial</h2>
    <p class="text-center text-gray-600 mb-10">Apa kata pelanggan tentang layanan kami</p>

    <div class="grid md:grid-cols-2 gap-8">

      {{-- Form Testimoni --}}
      <div class="bg-gray-50 p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-4">Berikan Testimoni Anda</h3>

        @if (session()->has('success'))
          <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-4">
          {{-- Rating --}}
          <div>
            <label class="block mb-1 font-medium text-gray-700">Rating</label>
            <div class="flex gap-1 text-yellow-400 text-xl">
              @for ($i = 1; $i <= 5; $i++)
                <span wire:click="$set('rating', {{ $i }})" class="cursor-pointer {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
              @endfor
            </div>
          </div>

          {{-- Message --}}
          <textarea rows="4" wire:model.defer="message" placeholder="Ceritakan pengalaman Anda..." class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-green-500"></textarea>

          <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded">
            Submit Testimoni
          </button>
        </form>
      </div>

      {{-- Daftar Testimoni --}}
      <div class="space-y-4">
        @forelse ($testimonials as $t)
          <div class="bg-white p-4 shadow rounded-lg flex gap-4 items-start">
            <img src="https://i.pravatar.cc/100?u={{ $t->user->name }}" class="w-12 h-12 rounded-full object-cover" alt="Avatar {{ $t->user->name }}">
            <div>
              <p class="font-semibold text-gray-800">{{ $t->user->name }}</p>
              <div class="text-yellow-400 text-sm mb-1">
                @for ($i = 1; $i <= 5; $i++)
                  <span>{{ $i <= $t->rating ? '★' : '☆' }}</span>
                @endfor
              </div>
              <p class="text-gray-600 text-sm">"{{ $t->message }}"</p>
            </div>
          </div>
        @empty
          <p class="text-gray-500">Belum ada testimoni.</p>
        @endforelse
      </div>

    </div>
  </div>
</section>
