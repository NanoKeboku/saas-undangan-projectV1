<?php

namespace App\Livewire\MyTheme;

use Illuminate\Support\Str;
use Livewire\Component;

class Studio extends Component
{
    public int $step = 1;
    public string $device = 'mobile';

    public string $bride_name = '';
    public string $groom_name = '';
    public string $event_date = '';
    public string $event_time = '';
    public string $venue = '';
    public string $city = '';
    public string $theme_color = '#8b5cf6';
    public string $font = 'Playfair Display';
    public array $gallery = [];

    // Slug untuk URL publik undangan
    public string $slug = '';
    public ?bool $isSlugAvailable = null; // null = belum dicek

    /**
     * Define wizard steps configuration
     */
    public array $steps = [
        ['number' => 1, 'title' => 'Pasangan', 'icon' => '💕'],
        ['number' => 2, 'title' => 'Acara', 'icon' => '📅'],
        ['number' => 3, 'title' => 'Galeri', 'icon' => '🖼️'],
        ['number' => 4, 'title' => 'Tema', 'icon' => '🎨'],
        ['number' => 5, 'title' => 'Preview', 'icon' => '👁️'],
        ['number' => 6, 'title' => 'Publikasi', 'icon' => '🚀'],
    ];

    /**
     * Mount - initialize data from session
     */
    public function mount(): void
    {
        $this->loadFromSession();
    }

    /**
     * Load form data from session
     */
    protected function loadFromSession(): void
    {
        $sessionData = session()->get('temp_invitation', []);

        if (! empty($sessionData)) {
            $this->bride_name  = $sessionData['bride_name']  ?? '';
            $this->groom_name  = $sessionData['groom_name']  ?? '';
            $this->event_date  = $sessionData['event_date']  ?? '';
            $this->event_time  = $sessionData['event_time']  ?? '';
            $this->venue       = $sessionData['venue']       ?? '';
            $this->city        = $sessionData['city']        ?? '';
            $this->theme_color = $sessionData['theme_color'] ?? '#8b5cf6';
            $this->font        = $sessionData['font']        ?? 'Playfair Display';
            $this->gallery     = $sessionData['gallery']     ?? [];
            $this->slug        = $sessionData['slug']        ?? '';
        }
    }

    /**
     * Auto-generate slug saat bride_name berubah (jika slug masih kosong)
     */
    public function updatedBrideName(): void
    {
        $this->autoGenerateSlug();
    }

    /**
     * Auto-generate slug saat groom_name berubah (jika slug masih kosong)
     */
    public function updatedGroomName(): void
    {
        $this->autoGenerateSlug();
    }

    /**
     * Validasi ketersediaan slug secara real-time saat user mengetik
     */
    public function updatedSlug(): void
    {
        $this->slug = Str::slug($this->slug);

        if (strlen($this->slug) < 3) {
            $this->isSlugAvailable = null;
            return;
        }

        $this->checkSlugAvailability();
        $this->saveToSession();
    }

    /**
     * Cek ketersediaan slug ke database.
     * Dipisah agar bisa dipanggil tanpa efek samping lifecycle hook.
     */
    protected function checkSlugAvailability(): void
    {
        // Uncomment setelah migration invitations dijalankan:
        // $this->isSlugAvailable = !\App\Models\Invitation::where('slug', $this->slug)->exists();

        // Simulasi sementara — hapus setelah DB siap
        $this->isSlugAvailable = true;
    }

    /**
     * Generate slug otomatis dari nama pasangan jika slug masih kosong.
     * Tidak memanggil lifecycle hook updatedSlug() secara langsung.
     */
    protected function autoGenerateSlug(): void
    {
        if (! empty($this->slug)) {
            return;
        }

        if (! empty($this->bride_name) && ! empty($this->groom_name)) {
            $this->slug = Str::slug($this->bride_name . '-' . $this->groom_name);

            if (strlen($this->slug) >= 3) {
                $this->checkSlugAvailability();
                $this->saveToSession();
            }
        }
    }

    /**
     * Navigate to next step
     */
    public function nextStep(): void
    {
        if ($this->step < 6 && $this->isCurrentStepValid()) {
            $this->step++;
            $this->saveToSession();
        }
    }

    /**
     * Navigate to previous step
     */
    public function prevStep(): void
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    /**
     * Jump to specific step (used by stepper)
     */
    public function jumpToStep(int $targetStep): void
    {
        // Allow jumping to current or previous steps
        if ($targetStep <= $this->step) {
            $this->step = $targetStep;

            return;
        }

        // Allow jumping to next step only if current is valid
        if ($targetStep === $this->step + 1 && $this->isCurrentStepValid()) {
            $this->step = $targetStep;
            $this->saveToSession();
        }
    }

    /**
     * Check if current step has valid data
     */
    public function isCurrentStepValid(): bool
    {
        return match ($this->step) {
            1 => ! empty($this->bride_name) && ! empty($this->groom_name),
            2 => ! empty($this->event_date) && ! empty($this->event_time) && ! empty($this->venue),
            3 => true, // Gallery optional
            4 => true, // Theme optional
            5, 6 => true,
            default => true,
        };
    }

    /**
     * Save current form data to session
     */
    public function saveToSession(): void
    {
        session()->put('temp_invitation', [
            'bride_name'  => $this->bride_name,
            'groom_name'  => $this->groom_name,
            'event_date'  => $this->event_date,
            'event_time'  => $this->event_time,
            'venue'       => $this->venue,
            'city'        => $this->city,
            'theme_color' => $this->theme_color,
            'font'        => $this->font,
            'gallery'     => $this->gallery,
            'slug'        => $this->slug,
        ]);

        $this->dispatch('autosave-triggered');
    }

    /**
     * Add gallery item from base64 data URL (client-side upload)
     */
    public function addGalleryItem(string $dataUrl, string $name): void
    {
        if (count($this->gallery) >= 8) return;

        $this->gallery[] = [
            'data_url' => $dataUrl,
            'name'     => $name,
        ];

        $this->saveToSession();
    }

    /**
     * Remove gallery item
     */
    public function removeGallery(int $index): void
    {
        if (isset($this->gallery[$index])) {
            unset($this->gallery[$index]);
            $this->gallery = array_values($this->gallery);
            $this->saveToSession();
        }
    }

    /**
     * Set warna tema — dipanggil dari blade via wire:click
     */
    public function setThemeColor(string $color): void
    {
        $this->theme_color = $color;
        $this->saveToSession();
    }

    /**
     * Publish invitation
     */
    public function publishInvitation(): void
    {
        session()->flash('message', 'Undangan berhasil dipublikasikan!');
        $this->redirectRoute('my-theme.template');
    }

    /**
     * Get progress percentage
     */
    public function getProgressProperty(): int
    {
        return (($this->step - 1) / 5) * 100;
    }

    /**
     * Render the view
     */
    public function render()
    {
        return view('livewire.pages.my-theme.studio.index');
    }
}
