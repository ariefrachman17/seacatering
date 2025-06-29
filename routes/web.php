<?php

use App\Livewire\Auth\Forgot;
use App\Livewire\Contact;
use App\Livewire\HomePage;
use App\Livewire\Menu;
use App\Livewire\Subscription;
use App\Livewire\SubscriptionManagement;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Resetpw;
use App\Livewire\Auth\Login;
use App\Livewire\AdminDashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', HomePage::class)->name('home');
Route::get('/menu', Menu::class)->name('menu');
Route::get('/subscription', Subscription::class)->name('subscription');
Route::get('/subscription-management', SubscriptionManagement::class)->name('subscription-management');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');

});



