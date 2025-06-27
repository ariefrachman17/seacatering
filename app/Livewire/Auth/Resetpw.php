<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class Resetpw extends Component
{
    public $email, $password, $confirm_password;

    public function resetPassword()
    {
        $validated = Validator::make(
            [
                'email' => $this->email,
                'password' => $this->password,
                'confirm_password' => $this->confirm_password,
            ],
            [
                'email' => 'required|email|exists:users,email',
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
                'email.exists' => 'This email is not registered.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters.',
                'password.regex' => 'Password must include uppercase, lowercase, number, and special character.',
                'confirm_password.same' => 'Password confirmation does not match.',
            ]
        )->validate();

        $user = User::where('email', $this->email)->first();
        $user->password = Hash::make($this->password);
        $user->save();

        session()->flash('success', 'Password reset successfully.');
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
            }
}
