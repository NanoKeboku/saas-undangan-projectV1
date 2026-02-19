<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileMenu extends Component
{
    public $isOpen = false;

    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function toggleDropdown()
    {
        $this->isOpen = ! $this->isOpen;
    }

    public function closeDropdown()
    {
        $this->isOpen = false;
    }

    public function getInitials($name)
    {
        $words = explode(' ', $name);
        $initials = '';
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }

        return substr($initials, 0, 2);
    }

    public function render()
    {
        return view('livewire.components.profile-menu');
    }
}
