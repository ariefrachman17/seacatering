<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Subscription;
use Carbon\Carbon;


class AdminDashboard extends Component
{
    public $dateFrom;
    public $dateTo;
    
    public function mount()
    {
        // Set default date range to current month
        $this->dateFrom = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->dateTo = Carbon::now()->endOfMonth()->format('Y-m-d');
    }
    
    // Auto-update when dateFrom changes
    public function updatedDateFrom()
    {
        $this->validateDateRange();
    }
    
    // Auto-update when date to changes
    public function updatedDateTo()
    {
        $this->validateDateRange();
    }
    
    #[On('dateRangeUpdated')]
    public function refreshData()
    {
        // This method can be called to force refresh
        $this->render();
    }
    
    private function validateDateRange()
    {
        if ($this->dateFrom && $this->dateTo) {
            if (Carbon::parse($this->dateTo)->lt(Carbon::parse($this->dateFrom))) {
                $this->dateTo = $this->dateFrom;
            }
        }
    }

    public function render()
    {
        // Validate dates first
        if (!$this->dateFrom || !$this->dateTo) {
            $metrics = [
                'newSubscriptions' => 0,
                'newSubscriptionsChange' => 0,
                'mrr' => 0,
                'mrrChange' => 0,
                'reactivations' => 0,
                'reactivationsChange' => 0,
                'totalActiveSubscriptions' => 0,
                'totalActiveSubscriptionsChange' => 0
            ];
            $trendData = [
                'subscriptionTrends' => [],
                'revenueTrends' => []
            ];
        } else {
            $metrics = $this->getMetrics();
            $trendData = $this->getTrendData();
        }
        
         return view('livewire.admin-dashboard', [
            'metrics' => $metrics,
            'trendData' => $trendData,
            'hasData' => $this->hasDataInRange()
        ])->with(['title' => 'Admin Dashboard']);;
    }
    private function hasDataInRange()
    {
        if (!$this->dateFrom || !$this->dateTo) {
            return false;
        }
        
        $startDate = Carbon::parse($this->dateFrom)->startOfDay();
        $endDate = Carbon::parse($this->dateTo)->endOfDay();
        
        return Subscription::whereBetween('created_at', [$startDate, $endDate])->exists();
    }

    private function getMetrics()
    {
        $startDate = Carbon::parse($this->dateFrom)->startOfDay();
        $endDate = Carbon::parse($this->dateTo)->endOfDay();

        // New Subscriptions
        $newSubscriptions = Subscription::whereBetween('created_at', [$startDate, $endDate])
            ->count();

        // Monthly Recurring Revenue (MRR)
        $mrr = Subscription::where('status', 'active')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total_price');


        $reactivations = Subscription::where('status', 'active')
            ->whereBetween('updated_at', [$startDate, $endDate])
            ->whereDate('created_at', '<', $startDate)
            ->count();

        // Total Active Subscriptions
        $totalActiveSubscriptions = Subscription::where('status', 'active')->count();

        // Calculate percentage changes (comparing with previous period)
        $previousPeriodStart = $startDate->copy()->subDays($startDate->diffInDays($endDate) + 1);
        $previousPeriodEnd = $startDate->copy()->subDay();

        $previousNewSubscriptions = Subscription::whereBetween('created_at', [$previousPeriodStart, $previousPeriodEnd])
            ->count();

        $previousMrr = Subscription::where('status', 'active')
            ->whereBetween('created_at', [$previousPeriodStart, $previousPeriodEnd])
            ->sum('total_price');

        $previousReactivations = Subscription::where('status', 'active')
            ->whereBetween('updated_at', [$previousPeriodStart, $previousPeriodEnd])
            ->whereDate('created_at', '<', $previousPeriodStart)
            ->count();

        // Calculate percentage changes
        $newSubscriptionsChange = $previousNewSubscriptions > 0 
            ? round((($newSubscriptions - $previousNewSubscriptions) / $previousNewSubscriptions) * 100)
            : 0;

        $mrrChange = $previousMrr > 0 
            ? round((($mrr - $previousMrr) / $previousMrr) * 100)
            : 0;

        $reactivationsChange = $previousReactivations > 0 
            ? round((($reactivations - $previousReactivations) / $previousReactivations) * 100)
            : 0;

        return [
            'newSubscriptions' => $newSubscriptions,
            'newSubscriptionsChange' => $newSubscriptionsChange,
            'mrr' => $mrr,
            'mrrChange' => $mrrChange,
            'reactivations' => $reactivations,
            'reactivationsChange' => $reactivationsChange,
            'totalActiveSubscriptions' => $totalActiveSubscriptions,
            'totalActiveSubscriptionsChange' => 15
        ];
    }

    private function getTrendData()
    {
        $startDate = Carbon::parse($this->dateFrom);
        $endDate = Carbon::parse($this->dateTo);
        
        $subscriptionTrends = [];
        $revenueTrends = [];
        
        // Generate daily data for the selected period
        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $dayStart = $currentDate->copy()->startOfDay();
            $dayEnd = $currentDate->copy()->endOfDay();
            
            $dailySubscriptions = Subscription::whereBetween('created_at', [$dayStart, $dayEnd])
                ->count();
                
            $dailyRevenue = Subscription::where('status', 'active')
                ->whereBetween('created_at', [$dayStart, $dayEnd])
                ->sum('total_price');
            
            $subscriptionTrends[] = [
                'date' => $currentDate->format('M j'),
                'value' => $dailySubscriptions
            ];
            
            $revenueTrends[] = [
                'date' => $currentDate->format('M j'),
                'value' => $dailyRevenue
            ];
            
            $currentDate->addDay();
        }
        
        return [
            'subscriptionTrends' => $subscriptionTrends,
            'revenueTrends' => $revenueTrends
        ];
    }

    public function updateDateRange()
    {
        $this->validate([
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date|after_or_equal:dateFrom'
        ], [
            'dateTo.after_or_equal' => 'End date must be after or equal to start date.',
            'dateFrom.required' => 'Start date is required.',
            'dateTo.required' => 'End date is required.'
        ]);
        
        // Check if there's data in the selected range
        if (!$this->hasDataInRange()) {
            session()->flash('warning', 'No subscription data found in the selected date range.');
        } else {
            session()->flash('message', 'Date range updated successfully.');
        }
        
        $this->dispatch('dateRangeUpdated');
    }

    
}