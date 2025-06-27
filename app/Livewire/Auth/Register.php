<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Register extends Component
{
    public $name, $email, $phone_number, $password, $confirm_password;

    public function register()
    {
        $validated = Validator::make(
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'password' => $this->password,
                'confirm_password' => $this->confirm_password,
            ],
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone_number' => 'required|string|min:10',
                'password' => [
                    'required',
                    'min:8',
                    'regex:/[A-Z]/',
                    'regex:/[a-z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*?&#]/',
                ],
                'confirm_password' => 'same:password',
            ],
            [
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters.',
                'password.regex' => 'Password must include uppercase, lowercase, number, and special character.',
                'confirm_password.same' => 'Password confirmation does not match.',
            ],
        )->validate();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
        ]);

        session()->flash('success', 'Account registered successfully.');
        return redirect('/login');
    }

    

    public function render()
    {
        return view('livewire.auth.register');
    }
}
