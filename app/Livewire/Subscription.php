<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\AllergyNote;
use App\Models\DeliveryDay;
use App\Models\SubscriptionMeal;
use App\Models\Subscription as SubscriptionModel;
use Carbon\Carbon;

class Subscription extends Component
{
    public $package_id;
    public $meals = [];
    public $delivery_days = [];
    public $allergies = '';
    public $start_date = '';
    public $end_date = '';
    public $total_price = 0;

    public $userName;
    public $userPhone;

    public $packagePrices = [
        1 => 30000,
        2 => 40000,
        3 => 60000,
    ];

    protected $rules = [
        'package_id' => 'required|integer|in:1,2,3',
        'meals' => 'required|array|min:1',
        'meals.*' => 'in:breakfast,lunch,dinner',
        'delivery_days' => 'required|array|min:1',
        'delivery_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        'start_date' => 'required|date|after_or_equal:today',
        'allergies' => 'nullable|string|max:500',
    ];

    protected $messages = [
        'package_id.required' => 'Please select a subscription package.',
        'package_id.in' => 'The selected package is invalid.',
        'meals.required' => 'Please select at least one meal type.',
        'meals.min' => 'Please select at least one meal type.',
        'delivery_days.required' => 'Please select at least one delivery day.',
        'delivery_days.min' => 'Please select at least one delivery day.',
        'start_date.required' => 'Please select a subscription start date.',
        'start_date.after_or_equal' => 'Start date cannot be earlier than today.',
        'allergies.max' => 'Allergy notes cannot exceed 500 characters.',
    ];

    public function mount()
    {
        $user = Auth::user();

        if ($user) {
            $this->userName = $user->name;
            $this->userPhone = $user->phone_number;
        }

        // Set default start date to today
        $this->start_date = Carbon::today()->format('Y-m-d');
        $this->updatedStartDate();
    }

    public function updatedPackageId()
    {
        $this->calculatePrice();
    }

    public function updatedMeals()
    {
        $this->calculatePrice();
    }

    public function updatedDeliveryDays()
    {
        $this->calculatePrice();
    }

    public function updatedStartDate()
    {
        if ($this->start_date) {
            try {
                $startDate = Carbon::parse($this->start_date);
                $this->end_date = $startDate->copy()->addDays(30)->format('Y-m-d');
            } catch (\Exception $e) {
                $this->end_date = '';
            }
        }
    }

    public function calculatePrice()
    {
        if (!$this->package_id || !isset($this->packagePrices[$this->package_id])) {
            $this->total_price = 0;
            return;
        }

        $mealCount = count($this->meals);
        $dayCount = count($this->delivery_days);
        $basePrice = $this->packagePrices[$this->package_id];

        if ($mealCount == 0 || $dayCount == 0) {
            $this->total_price = 0;
            return;
        }

        $this->total_price = $basePrice * $mealCount * $dayCount * 4.3;
    }

    public function submit()
    {
        if (!Auth::check()) {
            session()->flash('error', 'You must log in first.');
            return redirect()->route('login');
        }

        $this->validate();
        $this->calculatePrice();

        if ($this->total_price <= 0) {
            session()->flash('error', 'Invalid total price. Please ensure your selections are complete.');
            return;
        }

        // Check for active subscription
        $activeSubscription = SubscriptionModel::where('user_id', Auth::id())
            ->where('status', 'active')
            ->where('end_date', '>=', Carbon::today())
            ->first();

        if ($activeSubscription) {
            session()->flash('error', 'You already have an active subscription.');
            return;
        }

        try {
            DB::beginTransaction();

            // Create subscription
            $subscription = SubscriptionModel::create([
                'user_id' => Auth::id(),
                'package_id' => (int) $this->package_id,
                'start_date' => Carbon::parse($this->start_date)->format('Y-m-d'),
                'end_date' => Carbon::parse($this->end_date)->format('Y-m-d'),
                'total_price' => (float) $this->total_price,
                'status' => 'active',
            ]);

            $subscriptionId = $subscription->subscription_id;

            // Save meals
            foreach ($this->meals as $meal) {
                SubscriptionMeal::create([
                    'subscription_id' => $subscriptionId,
                    'meal_type' => trim($meal),
                ]);
            }

            // Save delivery days
            foreach ($this->delivery_days as $day) {
                DeliveryDay::create([
                    'subscription_id' => $subscriptionId,
                    'day' => trim($day),
                ]);
            }

            // Save allergy note
            if (!empty($this->allergies)) {
                AllergyNote::create([
                    'subscription_id' => $subscriptionId,
                    'note' => trim($this->allergies),
                ]);
            }

            DB::commit();

            session()->flash('message', 'Subscription created successfully! ID: SUB-' . str_pad($subscriptionId, 6, '0', STR_PAD_LEFT));

            // Reset form
            $this->reset(['package_id', 'meals', 'delivery_days', 'allergies', 'total_price']);
            $this->start_date = Carbon::today()->format('Y-m-d');
            $this->updatedStartDate();

            return redirect()->route('subscription-management');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Subscription creation failed: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'error' => $e->getTraceAsString()
            ]);
            session()->flash('error', 'An error occurred while creating the subscription. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.subscription');
    }
}