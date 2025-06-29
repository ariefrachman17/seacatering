
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Admin Dashboard</h1>
            <p class="text-gray-600 mt-2">Monitor subscription metrics and business performance</p>
        </div>

        <!-- Date Range Filter -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Date Range Filter</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <!-- From -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">From:</label>
                    <input type="date" wire:model="dateFrom"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- To -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">To:</label>
                    <input type="date" wire:model="dateTo"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Apply Button -->
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search:</label>
                    <button wire:click="updateDateRange" wire:loading.attr="disabled"
                        wire:loading.class="opacity-50 cursor-not-allowed"
                        class="w-full flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary text-white hover:bg-primary-dark disabled:opacity-50 transition-all duration-150 py-2.5 px-4">

                        <svg wire:loading class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>

                        <span wire:loading.remove>Apply</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>

            </div>
        </div>





        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- New Subscriptions -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            @if ($metrics['newSubscriptionsChange'] > 0)
                                <span
                                    class="text-sm font-medium text-primary">+{{ $metrics['newSubscriptionsChange'] }}%</span>
                            @elseif($metrics['newSubscriptionsChange'] < 0)
                                <span
                                    class="text-sm font-medium text-red-600">{{ $metrics['newSubscriptionsChange'] }}%</span>
                            @else
                                <span class="text-sm font-medium text-gray-500">0%</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="text-2xl font-bold text-gray-900">{{ number_format($metrics['newSubscriptions']) }}</h3>
                    <p class="text-sm text-gray-600">New Subscriptions</p>
                </div>
            </div>

            <!-- Monthly Recurring Revenue -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            @if ($metrics['mrrChange'] > 0)
                                <span class="text-sm font-medium text-primary">+{{ $metrics['mrrChange'] }}%</span>
                            @elseif($metrics['mrrChange'] < 0)
                                <span class="text-sm font-medium text-red-600">{{ $metrics['mrrChange'] }}%</span>
                            @else
                                <span class="text-sm font-medium text-gray-500">0%</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="text-2xl font-bold text-gray-900">Rp {{ number_format($metrics['mrr'], 0, ',', '.') }}
                    </h3>
                    <p class="text-sm text-gray-600">Monthly Recurring Revenue</p>
                </div>
            </div>

            <!-- Reactivations -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            @if ($metrics['reactivationsChange'] > 0)
                                <span
                                    class="text-sm font-medium text-primary">+{{ $metrics['reactivationsChange'] }}%</span>
                            @elseif($metrics['reactivationsChange'] < 0)
                                <span
                                    class="text-sm font-medium text-red-600">{{ $metrics['reactivationsChange'] }}%</span>
                            @else
                                <span class="text-sm font-medium text-gray-500">0%</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="text-2xl font-bold text-gray-900">{{ number_format($metrics['reactivations']) }}</h3>
                    <p class="text-sm text-gray-600">Reactivated Subscriptions</p>
                </div>
            </div>

            <!-- Total Active Subscriptions -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            @if ($metrics['totalActiveSubscriptionsChange'] > 0)
                                <span
                                    class="text-sm font-medium text-primary">+{{ $metrics['totalActiveSubscriptionsChange'] }}%</span>
                            @elseif($metrics['totalActiveSubscriptionsChange'] < 0)
                                <span
                                    class="text-sm font-medium text-red-600">{{ $metrics['totalActiveSubscriptionsChange'] }}%</span>
                            @else
                                <span class="text-sm font-medium text-gray-500">0%</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="text-2xl font-bold text-gray-900">
                        {{ number_format($metrics['totalActiveSubscriptions']) }}</h3>
                    <p class="text-sm text-gray-600">Total Active Subscriptions</p>
                </div>
            </div>
        </div>

        <!-- Charts -->
        @if ($hasData)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Subscription Trends Chart -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Subscription Trends</h3>
                    <div class="h-64">
                        <canvas id="subscriptionChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <!-- Revenue Growth Chart -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Growth</h3>
                    <div class="h-64">
                        <canvas id="revenueChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Subscription Trends</h3>
                    <div class="h-64 flex items-center justify-center">
                        <p class="text-gray-500">No data to display</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Growth</h3>
                    <div class="h-64 flex items-center justify-center">
                        <p class="text-gray-500">No data to display</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Simple Data Tables -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Subscriptions -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Subscriptions</h3>
                <div class="space-y-3">
                    @forelse(App\Models\Subscription::latest()->take(5)->get() as $subscription)
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                            <div>
                                <p class="font-medium text-gray-900">{{ $subscription->subscription_id }}</p>
                                <p class="text-sm text-gray-500">{{ $subscription->created_at->format('d M Y H:i') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900">Rp
                                    {{ number_format($subscription->total_price, 0, ',', '.') }}</p>
                                <span
                                    class="px-2 py-1 text-xs rounded-full
                                    @if ($subscription->status === 'active') text-primary-dark
                                    @elseif($subscription->status === 'paused') bg-yellow-100
                                    @else @endif">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">No subscriptions found</p>
                    @endforelse
                </div>
            </div>

            <!-- Status Summary -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Subscription Status Summary</h3>
                <div class="space-y-4">
                    @php
                        $statusCounts = App\Models\Subscription::selectRaw('status, COUNT(*) as count')
                            ->groupBy('status')
                            ->get()
                            ->pluck('count', 'status');
                    @endphp

                    @foreach (['active' => 'green', 'paused' => 'yellow', 'cancelled' => 'red'] as $status => $color)
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-{{ $color }}-500 rounded-full mr-3"></div>
                                <span class="text-gray-700 capitalize">{{ $status }}</span>
                            </div>
                            <span class="font-semibold text-gray-900">
                                {{ $statusCounts[$status] ?? 0 }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Subscription Trends Chart
            const subscriptionCtx = document.getElementById('subscriptionChart').getContext('2d');
            const subscriptionData = @json($trendData['subscriptionTrends']);

            new Chart(subscriptionCtx, {
                type: 'line',
                data: {
                    labels: subscriptionData.map(item => item.date),
                    datasets: [{
                        label: 'New Subscriptions',
                        data: subscriptionData.map(item => item.value),
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueData = @json($trendData['revenueTrends']);

            new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: revenueData.map(item => item.date),
                    datasets: [{
                        label: 'Revenue (Rp)',
                        data: revenueData.map(item => item.value),
                        backgroundColor: 'rgba(34, 197, 94, 0.8)',
                        borderColor: 'rgb(34, 197, 94)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        // Livewire event listeners for chart updates
        Livewire.on('chartsUpdated', () => {
            location.reload(); // Simple way to refresh charts
        });
    </script>
</div>

