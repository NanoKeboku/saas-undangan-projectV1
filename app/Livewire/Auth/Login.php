<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component; // 1. WAJIB IMPORT INI

class Login extends Component
{
    public $email = 'admin@weddstu.test';

    public $password = '12345678';

    public function login()
    {
        $fake = config('fake-auth');

        // INTIP DISINI:
        // dd($this->email, $this->password, $fake);

        if (
            $this->email === $fake['email'] &&
            $this->password === $fake['password']
        ) {
            session(['is_logged_in' => true]);

            return redirect()->route('dashboard');
        }

        $this->addError('email', 'Email atau password salah');
    }

    #[Layout('layouts.auth')] // 2. TARUH DI ATAS RENDER (TANPA SEMICOLON)
    public function render()
    {
        return view('livewire.pages.auth.login');
        // 3. Hapus ->layout() di bawah sini
    }
}
