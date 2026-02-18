<?php

namespace App\Livewire\MyTheme;

use Livewire\Component;

class Studio extends Component
{
    /**
     * Current wizard step (1-6)
     */
    public int $step = 1;

    /**
     * Device preview mode (mobile/desktop)
     */
    public string $device = 'mobile';

    /**
     * Form data - menggunakan public properties untuk sinkronisasi Alpine
     */
    public string $bride_name = '';

    public string $groom_name = '';

    public string $event_date = '';

    public string $event_time = '';

    public string $venue = '';

    public string $city = '';

    public string $theme_color = '#8b5cf6';

    public string $font = 'Playfair Display';

    public array $gallery = [];

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
            $this->bride_name = $sessionData['bride_name'] ?? '';
            $this->groom_name = $sessionData['groom_name'] ?? '';
            $this->event_date = $sessionData['event_date'] ?? '';
            $this->event_time = $sessionData['event_time'] ?? '';
            $this->venue = $sessionData['venue'] ?? '';
            $this->city = $sessionData['city'] ?? '';
            $this->theme_color = $sessionData['theme_color'] ?? '#8b5cf6';
            $this->font = $sessionData['font'] ?? 'Playfair Display';
            $this->gallery = $sessionData['gallery'] ?? [];
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
            'bride_name' => $this->bride_name,
            'groom_name' => $this->groom_name,
            'event_date' => $this->event_date,
            'event_time' => $this->event_time,
            'venue' => $this->venue,
            'city' => $this->city,
            'theme_color' => $this->theme_color,
            'font' => $this->font,
            'gallery' => $this->gallery,
        ]);

        $this->dispatch('autosave-triggered');
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
     * Publish invitation
     */
    public function publishInvitation(): void
    {
        // Save to database here (not implemented)
        session()->flash('message', 'Undangan berhasil "dipublikasikan" secara lokal!');

        $this->redirect(route('my-theme.template'));
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
