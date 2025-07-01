<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Subscription;
use App\Models\AllergyNote;
use App\Models\DeliveryDay;
use App\Models\SubscriptionMeal;

class SubscriptionManagement extends Component
{
    public $subscriptions;
    public $selectedSubscription;
    public $showPauseModal = false;
    public $showCancelModal = false;
    
    // Pause subscription properties
    public $pauseStartDate;
    public $pauseEndDate;
    public $pauseReason;
    
    // Cancel subscription properties
    public $cancelReason;
    public $confirmCancel = false;

    public $packageNames = [
        1 => 'Diet Plan',
        2 => 'Protein Plan', 
        3 => 'Royal Plan'
    ];

    public function mount()
    {
        $this->loadSubscriptions();
    }

    public function loadSubscriptions()
    {
        $this->subscriptions = Subscription::where('user_id', Auth::id())
            ->with(['subscriptionMeals', 'deliveryDays', 'allergyNotes'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function viewDetails($subscriptionId)
    {
        $this->selectedSubscription = $this->subscriptions->where('subscription_id', $subscriptionId)->first();
    }

    public function openPauseModal($subscriptionId)
    {
        $this->selectedSubscription = $this->subscriptions->where('subscription_id', $subscriptionId)->first();
        $this->showPauseModal = true;
        $this->pauseStartDate = '';
        $this->pauseEndDate = '';
        $this->pauseReason = '';
    }

    public function pauseSubscription()
    {
        $this->validate([
            'pauseStartDate' => 'required|date|after_or_equal:today',
            'pauseEndDate' => 'required|date|after:pauseStartDate',
            'pauseReason' => 'required|string|max:500',
        ]);

        try {
            DB::beginTransaction();

            // Update subscription status to paused
            $this->selectedSubscription->update([
                'status' => 'inactive',
                'pause_start_date' => $this->pauseStartDate,
                'pause_end_date' => $this->pauseEndDate,
                'pause_reason' => $this->pauseReason,
            ]);

            DB::commit();

            $this->showPauseModal = false;
            $this->loadSubscriptions();
            session()->flash('message', 'Subscription berhasil di-pause!');

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function openCancelModal($subscriptionId)
    {
        $this->selectedSubscription = $this->subscriptions->where('subscription_id', $subscriptionId)->first();
        $this->showCancelModal = true;
        $this->cancelReason = '';
        $this->confirmCancel = false;
    }

    public function cancelSubscription()
    {
        $this->validate([
            'cancelReason' => 'required|string|max:500',
            'confirmCancel' => 'accepted',
        ]);

        try {
            DB::beginTransaction();

            // Update subscription status to cancelled
            $this->selectedSubscription->update([
                'status' => 'cancelled',
                'cancelled_at' => now(),
                'cancel_reason' => $this->cancelReason,
            ]);

            DB::commit();

            $this->showCancelModal = false;
            $this->loadSubscriptions();
            session()->flash('message', 'Subscription berhasil dibatalkan!');

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function resumeSubscription($subscriptionId)
    {
        try {
            $subscription = $this->subscriptions->where('subscription_id', $subscriptionId)->first();
            
            $subscription->update([
                'status' => 'active',
                'pause_start_date' => null,
                'pause_end_date' => null,
                'pause_reason' => null,
            ]);

            $this->loadSubscriptions();
            session()->flash('message', 'Subscription berhasil diaktifkan kembali!');

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function closeModal()
    {
        $this->showPauseModal = false;
        $this->showCancelModal = false;
        $this->selectedSubscription = null;
    }

    public function render()
    {
        return view('livewire.subscription-management');
    }
}