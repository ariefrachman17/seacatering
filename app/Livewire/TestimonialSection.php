<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TestimonialSection extends Component
{
    public $rating = 0;
    public $message = '';

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'message' => 'required|string|max:500|min:10',
    ];

    protected $messages = [
        'rating.required' => 'Please select a rating.',
        'rating.min' => 'Rating must be at least 1 star.',
        'rating.max' => 'Rating cannot exceed 5 stars.',
        'message.required' => 'Please write your testimonial message.',
        'message.min' => 'Your message should be at least 10 characters long.',
        'message.max' => 'Your message cannot exceed 500 characters.',
    ];

    public function submit()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to submit a testimonial.');
            return redirect()->route('login');
        }

        $this->validate();

        // Check if user already has a testimonial
        $existingTestimonial = Testimonial::where('user_id', Auth::id())->first();
        
        if ($existingTestimonial) {
            // Update existing testimonial
            $existingTestimonial->update([
                'rating' => $this->rating,
                'message' => $this->message,
            ]);
            
            session()->flash('success', 'Your testimonial has been updated successfully!');
        } else {
            // Create new testimonial
            Testimonial::create([
                'user_id' => Auth::id(),
                'rating' => $this->rating,
                'message' => $this->message,
            ]);
            
            session()->flash('success', 'Thank you for your testimonial!');
        }

        // Reset form
        $this->reset(['rating', 'message']);
    }

    public function render()
    {
        $testimonials = Testimonial::with('user')
            ->latest()
            ->limit(10)
            ->get();

        return view('livewire.testimonial', [
            'testimonials' => $testimonials
        ]);
    }

    
}