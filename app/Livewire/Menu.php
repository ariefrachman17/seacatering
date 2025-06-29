<?php

namespace App\Livewire;

use Livewire\Component;

class Menu extends Component
{
    public $selectedMenu = null;
    public $showModal = false;

    protected $menuPlans = [
        'diet-plan' => [
            'id' => 'diet-plan',
            'name' => 'Diet Plan',
            'price' => 30000,
            'image' => 'img/diet.jpg',
            'short_description' => 'A comprehensive balanced diet program with controlled calories specifically designed for healthy and sustainable weight loss...',
            'description' => 'A comprehensive balanced diet program with controlled calories specifically designed for healthy and sustainable weight loss. Our nutritionists have carefully crafted each meal to ensure optimal nutrition while maintaining a caloric deficit.',
            'features' => ['Controlled calories 1200-1500 per day', 'Low fat and sugar menu options', 'Proper portions for caloric deficit', 'Complete nutrition guidelines', 'Consultation with certified nutritionist'],
            'menu_items' => ['Breakfast: Oatmeal with fresh seasonal fruits', 'Lunch: Grilled chicken salad with mixed vegetables', 'Dinner: Baked fish with quinoa and steamed broccoli'],
            'duration' => '30 days',
            'calories_per_day' => '1200-1500 calories',
            'suitable_for' => 'Individuals looking to lose weight healthily',
            'benefits' => ['Sustainable weight loss', 'Improved metabolism', 'Better energy levels', 'Reduced cravings'],
        ],
        'protein-plan' => [
            'id' => 'protein-plan',
            'name' => 'Protein Plan',
            'price' => 40000,
            'image' => 'img/protein.jpg',
            'short_description' => 'A high-protein program designed to build muscle mass and accelerate recovery after intensive training...',
            'description' => 'A high-protein program designed to build muscle mass and accelerate recovery after intensive training. Perfect for athletes and fitness enthusiasts who want to maximize their muscle-building potential.',
            'features' => ['High protein 1.8-2.2g per kg body weight', 'Lean meat selections', 'Quality protein supplements included', 'Protein timing optimization guide', 'Complementary workout program'],
            'menu_items' => ['Breakfast: Scrambled eggs with whole grain toast', 'Lunch: Grilled chicken breast with brown rice', 'Dinner: Grilled salmon with roasted vegetables'],
            'duration' => '30 days',
            'calories_per_day' => '1800-2200 calories',
            'suitable_for' => 'Athletes and individuals looking to build muscle',
            'benefits' => ['Increased muscle mass', 'Faster recovery', 'Enhanced strength', 'Better athletic performance'],
        ],
        'royal-plan' => [
            'id' => 'royal-plan',
            'name' => 'Royal Plan',
            'price' => 60000,
            'image' => 'img/royal.jpg',
            'short_description' => 'Our premium package featuring the most complete menu variations and highest quality ingredients...',
            'description' => 'Our premium package featuring the most complete menu variations and highest quality ingredients for a luxurious culinary experience. Prepared by professional chefs with international cuisine expertise.',
            'features' => ['50+ menu variations available', 'Premium imported ingredients', 'Professional experienced chefs', 'Exclusive catering service', 'Personal nutrition consultation'],
            'menu_items' => ['Breakfast: Avocado toast with smoked salmon and capers', 'Lunch: Wagyu beef steak with truffle sauce', 'Dinner: Lobster thermidor with grilled asparagus'],
            'duration' => '30 days',
            'calories_per_day' => '1500-2000 calories',
            'suitable_for' => 'Individuals seeking premium culinary experience',
            'benefits' => ['Gourmet dining experience', 'Diverse international flavors', 'Premium quality ingredients', 'Personalized service'],
        ],
    ];

    public function showDetails($menuId)
    {
        $this->selectedMenu = $this->menuPlans[$menuId] ?? null;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedMenu = null;
    }

    public function render()
    {
        return view('livewire.menu', [
            'menuPlans' => $this->menuPlans,
        ]);
    }
}
