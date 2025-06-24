<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-6xl mx-auto px-4">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900">My Subscriptions</h1>
            <p class="text-gray-600 mt-2">Manage your active meal subscriptions</p>
        </div>

        <!-- Flash Messages -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-primary text-primary-dark px-4 py-3 rounded mb-6">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- Subscriptions Grid -->
        @if($subscriptions->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 ">
                @foreach($subscriptions as $subscription)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <!-- Status Badge -->
                        <div class="px-6 py-4 border-b">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $packageNames[$subscription->package_id] ?? 'Unknown Plan' }}
                                </h3>
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    @if($subscription->status === 'active') text-primary-dark
                                    @elseif($subscription->status === 'paused') bg-yellow-100
                                    @elseif($subscription->status === 'cancelled')
                                    @endif">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </div>
                        </div>

                        <!-- Subscription Details -->
                        <div class="px-6 py-4">
                            <div class="space-y-3">
                                <!-- Meal Types -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-700">Meal Types:</h4>
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        @foreach($subscription->subscriptionMeals as $meal)
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded">
                                                {{ ucfirst($meal->meal_type) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Delivery Days -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-700">Delivery Days:</h4>
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        @foreach($subscription->deliveryDays as $day)
                                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded">
                                                {{ ucfirst($day->day) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Dates -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-700">Period:</h4>
                                    <p class="text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($subscription->start_date)->format('d M Y') }} - 
                                        {{ \Carbon\Carbon::parse($subscription->end_date)->format('d M Y') }}
                                    </p>
                                </div>

                                <!-- Total Price -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-700">Monthly Price:</h4>
                                    <p class="text-lg font-bold text-primary">
                                        Rp {{ number_format($subscription->total_price, 0, ',', '.') }}
                                    </p>
                                </div>

                                <!-- Allergy Notes -->
                                @if($subscription->allergyNotes->count() > 0)
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-700">Allergies/Notes:</h4>
                                        @foreach($subscription->allergyNotes as $note)
                                            <p class="text-sm text-gray-600 bg-gray-50 p-2 rounded mt-1">
                                                {{ $note->note }}
                                            </p>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Pause Info -->
                                @if($subscription->status === 'paused')
                                    <div class="bg-yellow-50 p-3 rounded">
                                        <h4 class="text-sm font-medium text-yellow-800">Paused Period:</h4>
                                        <p class="text-sm text-yellow-700">
                                            {{ \Carbon\Carbon::parse($subscription->pause_start_date)->format('d M Y') }} - 
                                            {{ \Carbon\Carbon::parse($subscription->pause_end_date)->format('d M Y') }}
                                        </p>
                                        @if($subscription->pause_reason)
                                            <p class="text-sm text-yellow-700 mt-1">
                                                Reason: {{ $subscription->pause_reason }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="px-6 py-4 bg-gray-50 border-t">
                            @if($subscription->status === 'active')
                                <div class="flex gap-2">
                                    <button wire:click="openPauseModal('{{ $subscription->subscription_id }}')"
                                        class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                                        Pause
                                    </button>
                                    <button wire:click="openCancelModal('{{ $subscription->subscription_id }}')"
                                        class="flex-1 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                                        Cancel
                                    </button>
                                </div>
                            @elseif($subscription->status === 'paused')
                                <div class="flex gap-2">
                                    <button wire:click="resumeSubscription('{{ $subscription->subscription_id }}')"
                                        class="flex-1 bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                                        Resume
                                    </button>
                                    <button wire:click="openCancelModal('{{ $subscription->subscription_id }}')"
                                        class="flex-1 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                                        Cancel
                                    </button>
                                </div>
                            @elseif($subscription->status === 'cancelled')
                                <p class="text-center text-gray-500 text-sm">
                                    Cancelled on {{ \Carbon\Carbon::parse($subscription->cancelled_at)->format('d M Y') }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No Subscriptions Found</h3>
                <p class="text-gray-500 mb-6">You haven't created any meal subscriptions yet.</p>
                <a href="{{ route('subscription-management') }}" 
                   class="inline-flex items-center px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg font-medium transition-colors">
                    Create New Subscription
                </a>
            </div>
        @endif

        <!-- Pause Modal -->
        @if($showPauseModal)
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Pause Subscription</h3>
                    
                    <form wire:submit.prevent="pauseSubscription" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pause Start Date</label>
                            <input type="date" wire:model="pauseStartDate" min="{{ date('Y-m-d') }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                            @error('pauseStartDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pause End Date</label>
                            <input type="date" wire:model="pauseEndDate"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                            @error('pauseEndDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Reason for Pause</label>
                            <textarea wire:model="pauseReason" rows="3" placeholder="Please provide a reason..."
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                            @error('pauseReason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="button" wire:click="closeModal"
                                class="flex-1 px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg font-medium transition-colors">
                                Cancel
                            </button>
                            <button type="submit"
                                class="flex-1 px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg font-medium transition-colors">
                                Pause Subscription
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <!-- Cancel Modal -->
        @if($showCancelModal)
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                    <h3 class="text-lg font-semibold text-red-600 mb-4">Cancel Subscription</h3>
                    
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-sm text-red-700">
                            <strong>Warning:</strong> This action cannot be undone. Your subscription will be permanently cancelled.
                        </p>
                    </div>

                    <form wire:submit.prevent="cancelSubscription" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Reason for Cancellation</label>
                            <textarea wire:model="cancelReason" rows="3" placeholder="Please tell us why you're cancelling..."
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                            @error('cancelReason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" wire:model="confirmCancel"
                                    class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span class="text-sm text-gray-700">I understand this action cannot be undone</span>
                            </label>
                            @error('confirmCancel') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="button" wire:click="closeModal"
                                class="flex-1 px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg font-medium transition-colors">
                                Keep Subscription
                            </button>
                            <button type="submit"
                                class="flex-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-medium transition-colors">
                                Cancel Subscription
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>