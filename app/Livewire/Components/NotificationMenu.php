<?php

namespace App\Livewire\Components;

use Livewire\Component;

class NotificationMenu extends Component
{
    public $isOpen = false;

    // Sample notifications - in real app, this would come from database
    public $notifications = [
        [
            'id' => 1,
            'type' => 'rsvp',
            'title' => 'Tamu Baru RSVP',
            'message' => 'Budi Santoso telah mengkonfirmasi kehadiran',
            'time' => '5 menit yang lalu',
            'read' => false,
            'icon' => 'check',
        ],
        [
            'id' => 2,
            'type' => 'ucapan',
            'title' => 'Ucapan Baru',
            'message' => 'Selamat pagi yang berbahagia! wish you all the best...',
            'time' => '1 jam yang lalu',
            'read' => false,
            'icon' => 'message',
        ],
        [
            'id' => 3,
            'type' => 'gift',
            'title' => 'E-Gift Baru',
            'message' => 'Anda menerima e-gift sebesar Rp500.000',
            'time' => '3 jam yang lalu',
            'read' => true,
            'icon' => 'gift',
        ],
        [
            'id' => 4,
            'type' => 'system',
            'title' => 'Undangan Siap',
            'message' => 'Undangan Anda sudah siap untuk dibagikan',
            'time' => '1 hari yang lalu',
            'read' => true,
            'icon' => 'check-circle',
        ],
    ];

    public function getUnreadCount()
    {
        return collect($this->notifications)->where('read', false)->count();
    }

    public function toggleDropdown()
    {
        $this->isOpen = ! $this->isOpen;
    }

    public function closeDropdown()
    {
        $this->isOpen = false;
    }

    public function markAsRead($id)
    {
        foreach ($this->notifications as &$notification) {
            if ($notification['id'] === $id) {
                $notification['read'] = true;
            }
        }
    }

    public function markAllAsRead()
    {
        foreach ($this->notifications as &$notification) {
            $notification['read'] = true;
        }
    }

    public function render()
    {
        return view('livewire.components.notification-menu');
    }
}
