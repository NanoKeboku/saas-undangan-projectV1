<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public $name = '';

    public $email = '';

    public $password = '';

    public $password_confirmation = '';

    public $terms = false;

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.pages.auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'terms' => ['required', 'accepted'],
        ]);

        // Create new user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Automatically login the user after registration
        Auth::login($user);

        // Regenerate session
        request()->session()->regenerate();

        // Redirect to dashboard
        return redirect()->intended(route('dashboard', absolute: false));
    }
}
