<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email = 'admin@gmail.com';

    public $password = '123123123';

    public $remember = false;

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.pages.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function authenticate()
    {
        // $this->validate([
        //     'email' => ['required', 'string', 'email'],
        //     'password' => ['required', 'string'],
        // ]);

        // // Attempt to authenticate
        // if (! Auth::attempt([
        //     'email' => $this->email,
        //     'password' => $this->password,
        // ], $this->remember)) {
        //     $this->addError('email', trans('auth.failed'));

        //     return;
        // }

        // Regenerate session to prevent fixation
        // request()->session()->regenerate();

        // Redirect to dashboard after successful login
        return redirect()->intended(route('dashboard'));
    }

    /**
     * Handle Google OAuth login (placeholder)
     */
    public function handleGoogleLogin()
    {
        // TODO: Implement Google OAuth
    }
}
